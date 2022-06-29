<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('leader/penilaian_m');
    }

    public function index()
    {
        $this->template->load('admin/template', 'admin/laporan/index');
    }

    public function cetak($id = null)
    {
        $post = $this->input->post(null, true);
        if (isset($post['cetak'])) {
            $data = [
                'kriteria' => $this->penilaian_m->get_kriteria(),
                'row' => $this->penilaian_m->get_nilai_byguru($post['id']),
            ];
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P'
            ]);

            $html = $this->load->view('admin/laporan/guru', $data, TRUE);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            $data = [
                'kriteria' => $this->penilaian_m->get_kriteria(),
                'row' => $this->penilaian_m->get_nilai(),
            ];
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'L'
            ]);

            $html = $this->load->view('admin/laporan/cetak', $data, TRUE);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('leader/penilaian_m');
        leader();
    }

    public function index()
    {
        $this->template->load('leader/template', 'leader/laporan/index');
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

            $html = $this->load->view('leader/laporan/guru', $data, TRUE);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else if ($id) {
            $data = [
                'kriteria' => $this->penilaian_m->get_kriteria(),
                'row' => $this->penilaian_m->get_nilai_byguru($id),
            ];
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4',
                'orientation' => 'P'
            ]);

            $html = $this->load->view('leader/laporan/guru', $data, TRUE);
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

            $html = $this->load->view('leader/laporan/cetak', $data, TRUE);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
    }
}

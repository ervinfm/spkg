<?php defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function index()
    {
        $post = $this->input->post(null, true);
        if (isset($post['cek'])) {
            $this->load->model('landing_m');
            if ($this->landing_m->get_guru($post['nbm'])->num_rows() > 0) {
                redirect('info/' . $post['nbm'] . '#hasil');
            } else {
                $this->session->set_flashdata('unknow', 'NBM Tidak terdaftar pada sistem!');
                redirect('');
            }
        } else {
            $this->load->view('landing/index');
        }
    }

    public function info($nbm)
    {
        $this->load->model('leader/penilaian_m');
        $this->load->model('landing_m');
        $temp  = $this->landing_m->get_guru($nbm)->row();
        $data = [
            'kriteria' => $this->penilaian_m->get_kriteria(),
            'guru' => $temp,
            'row' => $this->penilaian_m->get_nilai_byguru($temp->id_guru),
        ];
        $this->load->view('landing/index', $data);
    }
}

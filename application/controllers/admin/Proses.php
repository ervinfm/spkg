<?php defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('admin/guru_m');
        $this->load->model('leader/penilaian_m');
    }

    public function index()
    {
        $data = [
            'kriteria' => $this->penilaian_m->get_kriteria(),
            'row' => $this->penilaian_m->get_nilai(),
        ];
        $this->template->load('admin/template', 'admin/proses/index', $data);
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        leader();
    }

    public function index()
    {
        // $data['row'] = 'ok';
        $this->template->load('leader/template', 'leader/beranda');
    }
}

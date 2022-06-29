<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
    }

    public function index()
    {
        $this->template->load('admin/template', 'admin/beranda');
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('admin/users_m');
    }

    public function index()
    {
        $data['row'] = $this->users_m->get_user();
        $this->template->load('admin/template', 'admin/users/index', $data);
    }
}

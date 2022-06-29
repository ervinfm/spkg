<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('admin/kriteria_m');
    }

    public function index()
    {
        $data['row'] = $this->kriteria_m->get_kriteria();
        $this->template->load('admin/template', 'admin/kriteria/index', $data);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/kriteria/form');
    }

    public function update($id)
    {
        $data['row'] = $this->kriteria_m->get_kriteria($id)->row();
        $this->template->load('admin/template', 'admin/kriteria/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $this->kriteria_m->insert_kriteria($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Penambahan Data kriteria Berhasil!');
                redirect('admin/kriteria');
            } else {
                $this->session->set_flashdata('error', 'Penambahan Data kriteria Gagal!!, <br> Pastikan semua isian formulir sudah lengkap!');
                redirect('admin/kriteria/insert');
            }
        } else if (isset($post['update'])) {
            $this->kriteria_m->update_kriteria($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data kriteria Berhasil!');
                redirect('admin/kriteria');
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data kriteria Gagal!!, <br> Pastikan semua isian formulir sudah lengkap!');
                redirect('admin/kriteria/update/' . $post['id']);
            }
        } else {
            redirect('admin/atribut');
        }
    }

    function delete($id)
    {
        $this->kriteria_m->delete_kriteria($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Penghapusan Data kriteria Berhasil!');
            redirect('admin/kriteria');
        } else {
            $this->session->set_flashdata('error', 'Penghapusan Data kriteria Gagal!!');
            redirect('admin/kriteria');
        }
    }

    public function sub($id)
    {
        $data['row'] = $this->kriteria_m->get_kriteria($id)->row();
        $this->template->load('admin/template', 'admin/kriteria/sub', $data);
    }

    function proses_sub()
    {
        $post = $this->input->post(null, true);
        if (isset($post['add_sub'])) {
            $this->kriteria_m->insert_sub($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Penambahan Data sub-kriteria Berhasil!');
                redirect('admin/kriteria/sub/' . $post['id_kriteria']);
            } else {
                $this->session->set_flashdata('error', 'Penambahan Data sub-kriteria Gagal!!, <br> Pastikan semua isian formulir sudah lengkap!');
                redirect('admin/kriteria/sub/' . $post['id_kriteria']);
            }
        } else if (isset($post['update_sub'])) {
            $this->kriteria_m->update_sub($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Pembaharuan Data sub-kriteria Berhasil!');
                redirect('admin/kriteria/sub/' . $post['id_kriteria']);
            } else {
                $this->session->set_flashdata('error', 'Pembaharuan Data sub-kriteria Gagal!!, <br> Pastikan semua isian formulir sudah lengkap!');
                redirect('admin/kriteria/sub/' . $post['id_kriteria']);
            }
        } else {
            redirect('admin/kriteria/sub/' . $post['id_kriteria']);
        }
    }

    function delete_sub($id, $cat)
    {
        $this->kriteria_m->delete_sub($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Penghapusan Data sub-kriteria Berhasil!');
            redirect('admin/kriteria/sub/' . $cat);
        } else {
            $this->session->set_flashdata('error', 'Penghapusan Data sub-kriteria Gagal!!');
            redirect('admin/kriteria/sub/' . $cat);
        }
    }
}

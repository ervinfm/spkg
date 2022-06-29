<?php defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admin();
        $this->load->model('admin/guru_m');
    }

    public function index()
    {
        $data['row'] = $this->guru_m->get_guru();
        $this->template->load('admin/template', 'admin/guru/index', $data);
    }

    public function insert()
    {
        $this->template->load('admin/template', 'admin/guru/form');
    }

    public function update($id)
    {
        $data['row'] = $this->guru_m->get_guru($id)->row();
        $this->template->load('admin/template', 'admin/guru/form', $data);
    }

    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['insert'])) {
            $config['upload_path']    = './assets/images/guru';
            $config['allowed_types']  = 'jpg|jpeg|png|ico';
            $config['max_size']       = 20000;
            $config['file_name']       = 'guru-' . $post['g_nbm'];
            $this->load->library('upload', $config);
            $gambar = $this->upload->do_upload('image');
            if ($gambar == true) {
                $post['image'] = $this->upload->data('file_name');
            } else {
                $post['image'] = NULL;
            }
            $post['id_user'] = random_string('numeric', 35);
            $this->guru_m->insert_guru($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', 'Penambahan Data Guru Berhasil!,<br>Gunakan NBM untuk login akun guru!');
                redirect('admin/guru');
            } else {
                $this->session->set_flashdata('error', 'Penambahan Data Guru Gagal!!, <br> Pastikan semua isian formulir sudah lengkap!');
                redirect('admin/guru/insert');
            }
        } else if (isset($post['update'])) {
            $data = $this->guru_m->get_guru($post['id'])->row();

            $config['upload_path']    = './assets/images/guru';
            $config['allowed_types']  = 'jpg|png|jpeg|ico';
            $config['max_size']       = 20000;
            $config['file_name']       = 'guru-' . $post['g_nbm'];
            $this->load->library('upload', $config);
            $gambar = $this->upload->do_upload('image');
            if ($gambar == true) {
                if ($data->img_guru != null) {
                    $target_file = './assets/images/guru/' . $data->img_guru;
                    unlink($target_file);
                    $post['image'] = $this->upload->data('file_name');
                } else if ($data->img_guru == null) {
                    $post['image'] = $this->upload->data('file_name');
                }
                $this->guru_m->update_guru($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('succes', 'Data Guru Berhasil diperbaharui!');
                    redirect('admin/guru/');
                } else {
                    $this->session->set_flashdata('error', 'Data Guru Gagal diperbaharui!, <br> Sistem Error!');
                    redirect('admin/guru/update/' . $post['id']);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal Memuat Gambar, <br> Sistem Error!');
                redirect('admin/guru/update/' . $post['id']);
            }
        } else {
            redirect('admin/guru');
        }
    }

    function delete($id)
    {
        $data = $this->guru_m->get_guru($id)->row();
        if ($data->img_guru != null) {
            $target_file = './assets/images/guru/' . $data->img_guru;
            unlink($target_file);
        }
        $this->guru_m->delete_guru($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('succes', 'Data Guru Berhasil dihapus!');
            redirect('admin/guru');
        } else {
            $this->session->set_flashdata('error', 'Data Guru Gagal dihapus!, <br> Sistem Error!');
            redirect('admin/guru');
        }
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		already_login();
		$this->load->view('auth/template');
	}

	function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('auth_m');
			$cek_username = $this->auth_m->auth($post);
			if ($cek_username->num_rows() > 0) {
				$cek_pass = $this->auth_m->auth_pass($post);
				if ($cek_pass->num_rows() > 0) {
					if ($cek_pass->row()->status_user == 1) {
						$user = [
							'user_id' => $cek_pass->row()->id_user,
							'nama' => $cek_pass->row()->username_user,
							'level' => $cek_pass->row()->level_user,
							'_token' => random_string('md5'),
						];
						$this->session->set_userdata($user);
						// set_use_login();
						if ($cek_pass->row()->level_user == 1) {
							redirect('admin/beranda');
						} else if ($cek_pass->row()->level_user == 2) {
							redirect('leader/beranda');
						} else {
							redirect('auth');
						}
					} else {
						$this->session->set_flashdata('Username', $post['username']);
						$this->session->set_flashdata('Password', $post['password']);
						$this->session->set_flashdata('warning', 'Akun Anda Belum Aktif, Silahkan Periksa Email Anda dan lakukan Activate!');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('Username', $post['username']);
					$this->session->set_flashdata('Password', $post['password']);
					$this->session->set_flashdata('error', 'Password Salah, Silahkan Coba Kembali!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('Username', $post['username']);
				$this->session->set_flashdata('Password', $post['password']);
				$this->session->set_flashdata('error', 'Username Salah, Silahkan Coba Kembali!');
				redirect('auth');
			}
		} else {
			redirect('auth');
		}
	}

	function logout()
	{
		// set_use_logout();
		$this->session->sess_destroy();
		redirect('auth');
	}
}

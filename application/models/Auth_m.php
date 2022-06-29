<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    function auth($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('username_user', $post['username']);
        $query = $this->db->get();
        return $query;
    }

    function auth_pass($post)
    {
        $this->db->from('tbl_user');
        $this->db->where('username_user', $post['username']);
        $this->db->where('password_user', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    function get_user_byid($id)
    {
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query;
    }
}

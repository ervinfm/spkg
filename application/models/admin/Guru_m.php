<?php defined('BASEPATH') or exit('No direct script access allowed');

class Guru_m extends CI_Model
{

    function get_guru($id = null)
    {
        $this->db->from('tbl_guru');
        if ($id != null) {
            $this->db->where('id_guru', $id);
        } else {
            $this->db->order_by('nbm_guru', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert_guru($post)
    {
        $params = [
            'id_guru' => random_string('alnum', 30),
            'id_user' => $post['id_user'],
            'nbm_guru' => $post['g_nbm'],
            'nama_guru' => $post['g_nama'],
            'ttl_guru' => $post['g_ttl'],
            'gender_guru' => $post['g_gender'],
            'telp_guru' => $post['g_telp'],
            'alamat_guru' => $post['g_alamat'],
            'img_guru' => $post['image'],
        ];
        $this->db->insert('tbl_guru', $params);
    }

    function update_guru($post)
    {
        $params = [
            'nbm_guru' => $post['g_nbm'],
            'nama_guru' => $post['g_nama'],
            'ttl_guru' => $post['g_ttl'],
            'gender_guru' => $post['g_gender'],
            'telp_guru' => $post['g_telp'],
            'alamat_guru' => $post['g_alamat'],
            'img_guru' => $post['image'],
        ];
        $this->db->where('id_guru', $post['id']);
        $this->db->update('tbl_guru', $params);
    }

    function delete_guru($id)
    {
        $this->db->where('id_guru', $id);
        $this->db->delete('tbl_guru');
    }

    function insert_user($post)
    {
        $params = [
            'id_user' => $post['id_user'],
            'username_user' => $post['g_nbm'],
            'password_user' => sha1($post['g_nbm']),
            'level_user' => 3,
            'status_user' => 1,
        ];
        $this->db->insert('tbl_user', $params);
    }

    function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }
}

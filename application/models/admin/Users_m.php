<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users_m extends CI_Model
{

    function get_user($id = null)
    {
        $this->db->from('tbl_user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        } else {
            $this->db->order_by('level_user', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }
}

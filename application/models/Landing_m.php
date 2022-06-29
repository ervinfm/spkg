<?php defined('BASEPATH') or exit('No direct script access allowed');

class Landing_m extends CI_Model
{

    function get_guru($nbm)
    {
        $this->db->from('tbl_guru');
        $this->db->where('nbm_guru', $nbm);
        $query = $this->db->get();
        return $query;
    }
}

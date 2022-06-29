<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_m extends CI_Model
{

    function get_kriteria($id = null)
    {
        $this->db->from('tbl_kriteria');
        if ($id != null) {
            $this->db->where('id_kriteria', $id);
        } else {
            $this->db->order_by('atribut_kriteria', 'ASC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert_kriteria($post)
    {
        $params = [
            'data_kriteria' => $post['k_data'],
            'atribut_kriteria' => $post['k_atibut']
        ];
        $this->db->insert('tbl_kriteria', $params);
    }

    function update_kriteria($post)
    {
        $params = [
            'data_kriteria' => $post['k_data'],
            'atribut_kriteria' => $post['k_atibut']
        ];
        $this->db->where('id_kriteria', $post['id']);
        $this->db->update('tbl_kriteria', $params);
    }

    function delete_kriteria($id)
    {
        $this->db->where('id_kriteria', $id);
        $this->db->delete('tbl_kriteria');
    }

    function get_sub_kriteria($id = null)
    {
        $this->db->from('tbl_sub_kriteria');
        if ($id != null) {
            $this->db->where('id_kriteria', $id);
        } else {
            $this->db->order_by('created_sub_kriteria', 'DESC');
        }
        $query = $this->db->get();
        return $query;
    }

    function insert_sub($post)
    {
        $params = [
            'id_kriteria' => $post['id_kriteria'],
            'data_sub_kriteria' => $post['sub_data'],
            'level_sub_kriteria' => $post['sub_level'],
        ];
        $this->db->insert('tbl_sub_kriteria', $params);
    }

    function update_sub($post)
    {
        $params = [
            'data_sub_kriteria' => $post['sub_data'],
            'level_sub_kriteria' => $post['sub_level'],
        ];
        $this->db->where('id_sub_kriteria', $post['id']);
        $this->db->update('tbl_sub_kriteria', $params);
    }

    function delete_sub($id)
    {
        $this->db->where('id_sub_kriteria', $id);
        $this->db->delete('tbl_sub_kriteria');
    }
}

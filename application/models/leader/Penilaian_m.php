<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_m extends CI_Model
{

    function set_ass($post)
    {
        $params = [
            'id_penilaian' =>  $post['id'],
            'id_guru' => $post['id_guru'],
            'nilai_penilaian' => $post['val_all'],
            'hasil_penilaian' => $post['val_hasil']
        ];
        $this->db->insert('tbl_nilai', $params);
    }

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

    function get_nilai($id = null)
    {
        $this->db->from('tbl_nilai');
        if ($id != null) {
            $this->db->where('id_penilaian', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function get_nilai_byguru($id = null)
    {
        $this->db->from('tbl_nilai');
        if ($id != null) {
            $this->db->where('id_guru', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}

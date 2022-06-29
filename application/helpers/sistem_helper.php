<?php

function login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') == NULL) {
        $ci->session->set_flashdata('warning', 'Silahkan Login untuk mengakses sistem!');
        redirect('auth');
    }
}

function cek_level()
{
    $ci = &get_instance();
    if ($ci->session->userdata('level') == 1) {
        redirect('admin/beranda');
    } else if ($ci->session->userdata('level') == 2) {
        redirect('leader/beranda');
    } else {
        redirect('auth/logout');
    }
}

function already_login()
{
    $ci = &get_instance();
    if ($ci->session->userdata('user_id') != NULL) {
        $ci->session->set_flashdata('warning', 'Anda masih Login dalam sistem, <br>Silahkan Logout untuk keluar sistem!');
        cek_level();
    }
}

function admin()
{
    $ci = &get_instance();
    login();
    if ($ci->session->userdata('level') != 1) {
        redirect('auth');
    }
}

function leader()
{
    $ci = &get_instance();
    login();
    if ($ci->session->userdata('level') != 2) {
        redirect('auth');
    }
}

// For Sistem Admin

function get_guru_byid($id)
{
    $ci = &get_instance();
    $ci->db->from('tbl_guru');
    $ci->db->where('id_guru', $id);
    $query = $ci->db->get();
    return $query->row();
}

function get_guru_all()
{
    $ci = &get_instance();
    $ci->db->from('tbl_guru');
    $query = $ci->db->get();
    return $query;
}

function get_kriteria_atribut()
{
    $ci = &get_instance();
    $ci->db->from('tbl_kriteria');
    $ci->db->order_by('atribut_kriteria', 'ASC');
    $query = $ci->db->get();
    return $query;
}

function get_subkriteria_bykriteria($id_kriteria)
{
    $ci = &get_instance();
    $ci->db->from('tbl_sub_kriteria');
    $ci->db->where('id_kriteria', $id_kriteria);
    $query = $ci->db->get();
    return $query;
}

function get_penilaian_byguru($id_guru)
{
    $ci = &get_instance();
    $ci->db->from('tbl_nilai');
    $ci->db->where('id_guru', $id_guru);
    $query = $ci->db->get();
    return $query;
}

function set_detail_saw($post)
{
    $ci = &get_instance();
    $n_kriteria = get_kriteria_atribut()->num_rows();
    $val_origin = null;
    $val_normal = null;
    foreach (get_kriteria_atribut()->result() as $keys => $kri) {
        $val_origin .= ($post['n_sub' . $keys]) . ',';
        $val_normal .= ($post['n_sub' . $keys] / $n_kriteria) . ',';
    }

    $params = [
        'id_penilaian' => $post['id'],
        'nilai_unnormal' => $val_origin,
        'nilai_normal' => $val_normal
    ];
    $ci->db->insert('tbl_nilai_normal', $params);
}

function metode_saw($post)
{
    set_detail_saw($post);
    $n_kriteria = get_kriteria_atribut()->num_rows();
    $params['id_guru'] = $post['id_guru'];
    $temp = 0;
    $val_all = null;
    foreach (get_kriteria_atribut()->result() as $keys => $kri) {
        $val_all .= round((($post['n_sub' . $keys] / $n_kriteria) * $kri->bobot_kriteria), 2) . ',';
        $temp = $temp + (($post['n_sub' . $keys] / $n_kriteria) * $kri->bobot_kriteria);
    }
    $params['val_all'] = $val_all;
    $params['val_hasil'] = round($temp, 2);
    return $params;
}

function grade_nilai($nilai)
{
    if ($nilai <= 1 && $nilai >= 0.86) {
        $temp = [
            'grade' => 'A',
            'keterangan' => 'Amat Baik',
        ];
    } else if ($nilai <= 0.85 && $nilai >= 0.71) {
        $temp = [
            'grade' => 'B',
            'keterangan' => 'Baik',
        ];
    } else if ($nilai <= 0.70 && $nilai >= 0.56) {
        $temp = [
            'grade' => 'C',
            'keterangan' => 'Cukup',
        ];
    } else if ($nilai <= 0.55 && $nilai >= 0) {
        $temp = [
            'grade' => 'D',
            'keterangan' => 'Kurang',
        ];
    }
    return $temp;
}

function get_nilai_normal_byid($id_penilaian)
{
    $ci = &get_instance();
    $ci->db->from('tbl_nilai_normal');
    $ci->db->where('id_penilaian', $id_penilaian);
    $query = $ci->db->get();
    return $query->row();
}

function get_nilai_all()
{
    $ci = &get_instance();
    $ci->db->from('tbl_nilai');
    $query = $ci->db->get();
    return $query;
}

function get_rangking_byid($id_guru)
{
    $ci = &get_instance();
    $new = get_nilai_all()->result();
    $keys = array_column($new, 'hasil_penilaian');
    array_multisort($keys, SORT_ASC, $new);
    $n_data = count($new);
    foreach ($new as $key => $data) {
        if ($data->id_guru == $id_guru) {
            return 'Peringkat ' . ($n_data - $key);
        }
    }
}

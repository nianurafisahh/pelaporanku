<?php

function cek_jika_user()
{
    $check = get_instance();
    if ($check->session->userdata('level')) {
        redirect('auth/error403');
    }
    $user = $check->db->get_where('masyarakat', ['nik' => $check->session->userdata('nik')])->row_array();

    if ($user['aktif'] != 1) {
        redirect('auth/logout');
    } elseif (!$check->session->userdata('nik')) {
        redirect('auth');
    }
}

function cek_admin_all_level()
{
    $check = get_instance();
    $admin = $check->db->get_where('petugas', ['username' => $check->session->userdata('username')])->row();
    if ($check->session->userdata('nik')) {
        redirect('auth/error403');
    } elseif (!$check->session->userdata('level')) {
        redirect('auth');
    }
}

function cek_only_admin()
{
    $check = get_instance();
    $admin = $check->db->get_where('petugas', ['username' => $check->session->userdata('username')])->row();
    if ($check->session->userdata('nik')) {
        redirect('auth/error403');
    } elseif (!$check->session->userdata('level')) {
        redirect('auth');
    } elseif ($check->session->userdata('level') != 1) {
        redirect('auth/error403');
    }
}

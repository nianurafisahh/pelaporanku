<?php
class M_admin extends CI_Model
{
    // untuk mengedit nama admin
    public function edit_nama()
    {
        $this->db->set('nama', htmlspecialchars($this->input->post('nama')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('petugas')) {
            $this->session->set_flashdata('true', 'Nama berhasil di edit');
            redirect('admin/edit');
        } else {
            $this->session->set_flashdata('false', 'Nama gagal di edit');
            redirect('admin/edit');
        }
    }
    // untuk mengedit telp admin
    public function edit_telp()
    {
        $this->db->set('no_telp', htmlspecialchars($this->input->post('telp')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('petugas')) {
            $this->session->set_flashdata('true', 'No telp berhasil di edit');
            redirect('admin/edit');
        } else {
            $this->session->set_flashdata('false', 'No telp gagal di edit');
            redirect('admin/edit');
        }
    }
    // untuk mengedit password admin
    public function edit_password()
    {
        $oldppass = htmlspecialchars($this->input->post('pl'));
        $newpass = htmlspecialchars($this->input->post('pb'));
        $admin = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row();

        if ($oldppass != $newpass) {
            if ($admin->password == md5($oldppass)) {
                $pass = md5($newpass);
            } else {
                $this->session->set_flashdata('false', 'Password lama salah');
                redirect('admin/edit_password');
            }
        } else {
            $this->session->set_flashdata('false', 'Password baru tidak boleh sama dengan password lama');
            redirect('admin/edit_password');
        }

        $this->db->set('password', $pass);
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('petugas')) {
            $this->session->set_flashdata('true', 'Password berhasil di edit');
            redirect('admin/edit');
        } else {
            $this->session->set_flashdata('false', 'Password gagal di edit');
            redirect('admin/edit');
        }
    }
}

<?php
class M_user extends CI_Model
{

    public function getLaporanByNIK()
    {
        $nik = $this->session->userdata('nik');
        $query = "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE masyarakat.nik = $nik";
        return $this->db->query($query)->result();
    }

    public function getLaporanById($id)
    {
        return $this->db->get_where('pengaduan', ['md5(id_pengaduan)' => $id])->row();
    }

    public function getPengaduanJoinMasyarakat($id, $nik)
    {
        $pengaduan = $this->db->get_where('pengaduan', ['md5(id_pengaduan)' => $id])->row();
        $id_pengaduan = $pengaduan->id_pengaduan;

        $query = "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE pengaduan.id_pengaduan = $id_pengaduan AND masyarakat.nik = $nik";
        return $this->db->query($query)->row();
    }

    public function getTanggapanJoinAdmin($id)
    {
        $tanggapan = $this->db->get_where('pengaduan', ['md5(id_pengaduan)' => $id])->row();
        $id_pengaduan = $tanggapan->id_pengaduan;

        $query = "SELECT * FROM tanggapan INNER JOIN petugas ON tanggapan.id_admin = petugas.id_admin WHERE tanggapan.id_pengaduan = $id_pengaduan ORDER BY tanggapan.id_tanggapan DESC";
        return $this->db->query($query)->result();
    }


    public function add_laporan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $img = $_FILES['foto'];
        if ($img) {
            $config['upload_path']          = './asset/upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 500;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('false', 'Kesalahan saat upload foto, harap coba kembali');
                redirect('laporan/add_laporan');
            }
        }
        $data = [
            'id_pengaduan' => time(),
            'tgl_pengaduan' => date('Y-m-d'),
            'nama' => $this->session->userdata('username'),
            'nik' => $this->session->userdata('nik'),
            'isi_laporan' => htmlspecialchars($this->input->post('isi')),
            'foto' => $foto,
            'status' => 0
        ];

        if ($this->db->insert('pengaduan', $data)) {
            $this->session->set_flashdata('true', 'Laporan pengaduan berhasil di kirim');
            redirect('laporan');
        } else {
            $this->session->set_flashdata('false', 'Laporan pengaduan gagal di kirim');
            redirect('laporan');
        }
    }

    public function edit($id)
    {
        $pengaduan = $this->getLaporanById($id);

        $img = $_FILES['foto'];
        if ($img) {
            $config['upload_path']          = './asset/upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 500;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                unlink(FCPATH . 'asset/upload/' . $pengaduan->foto);
            } else {
                $foto = $pengaduan->foto;
            }
        }
        $this->db->set('isi_laporan', htmlspecialchars($this->input->post('isi')));
        $this->db->set('foto', $foto);
        $this->db->where('md5(id_pengaduan)', $id);
        if ($this->db->update('pengaduan')) {
            $this->session->set_flashdata('true', 'Laporan pengaduan berhasil di edit');
            redirect('laporan');
        } else {
            $this->session->set_flashdata('false', 'Laporan pengaduan gagal di edit');
            redirect('laporan');
        }
    }

    public function hapus($id)
    {
        $laporan = $this->db->get_where('pengaduan', ['md5(id_pengaduan)' => $id])->row();
        unlink(FCPATH . 'asset/upload/' . $laporan->foto);
        if ($this->db->delete('pengaduan', ['md5(id_pengaduan)' => $id])) {
            $this->db->delete('tanggapan', ['md5(id_pengaduan)' => $id]);
            $this->session->set_flashdata('true', 'Laporan pengaduan berhasil di hapus');
            redirect('laporan');
        } else {
            $this->session->set_flashdata('false', 'Laporan pengaduan gagal di hapus');
            redirect('laporan');
        }
    }

    public function edit_nama()
    {
        $this->db->set('nama', htmlspecialchars($this->input->post('nama')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('masyarakat')) {
            $this->session->set_flashdata('true', 'Nama berhasil di edit');
            redirect('user/edit');
        } else {
            $this->session->set_flashdata('false', 'Nama gagal di edit');
            redirect('user/edit');
        }
    }

    public function edit_telp()
    {
        $this->db->set('no_telp', htmlspecialchars($this->input->post('telp')));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('masyarakat')) {
            $this->session->set_flashdata('true', 'No telp berhasil di edit');
            redirect('user/edit');
        } else {
            $this->session->set_flashdata('false', 'No telp gagal di edit');
            redirect('user/edit');
        }
    }

    public function edit_password()
    {
        $oldpass = $this->input->post('pl');
        $newpass = $this->input->post('pb');
        $user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row();

        if ($newpass != $oldpass) {
            if ($user->password == md5($oldpass)) {
                $pass = md5($newpass);
            } else {
                $this->session->set_flashdata('false', 'Password lama salah');
                redirect('user/edit_password');
            }
        } else {
            $this->session->set_flashdata('false', 'Password baru tidak boleh sama dengan password lama');
            redirect('user/edit_password');
        }
        $this->db->set('password', $pass);
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('masyarakat')) {
            $this->session->set_flashdata('true', 'Password berhasil di edit');
            redirect('user/edit');
        } else {
            $this->session->set_flashdata('false', 'Password gagal di edit');
            redirect('user/edit');
        }
    }
}

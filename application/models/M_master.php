<?php

/**
 * 
 */
class M_master extends CI_Model
{
	// Ambil semua data masyarakat
	public function getAllMasyarakat()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get('masyarakat')->result();
	}

	// Ambil data petugas yang levelnya 2
	public function getOnlyPetugas()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get_where('petugas', ['level !=' => 1])->result();
	}

	// Ambil data admin yang levelnya 1
	public function getOnlyAdmin()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get_where('petugas', ['level !=' => 2])->result();
	}

	// Untuk menghapus data masyarakat
	public function del_masyarakat($nik)
	{
		$q = "SELECT * FROM pengaduan INNER JOIN tanggapan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan WHERE pengaduan.nik = $nik";
		$hasil_join = $this->db->query($q)->result();
		if ($this->db->delete('masyarakat', ['nik' => $nik])) {
			$this->db->delete('tanggapan', ['id_pengaduan' => $hasil_join->id_pengaduan]);
			$pengaduan = $this->db->get_where('pengaduan', ['nik' => $nik])->row();
			unlink(FCPATH . 'asset/upload/' . $pengaduan->foto);
			$this->db->delete('pengaduan', ['nik' => $nik]);
			$this->session->set_flashdata('true', 'Data masyarakat berhasil di hapus');
			redirect('master/masyarakat');
		} else {
			$this->session->set_flashdata('false', 'Data masyarakat gagal di hapus');
			redirect('master/masyarakat');
		}
	}

	// Untuk Menonaktifkan Akun Masyarakat
	public function nonaktif_masyarakat($nik)
	{
		$this->db->set('aktif', 0);
		$this->db->where('nik', $nik);
		if ($this->db->update('masyarakat')) {
			$this->session->set_flashdata('true', 'Akun masyarakat berhasil di nonaktifkan');
			redirect('master/masyarakat');
		} else {
			$this->session->set_flashdata('false', 'Akun masyarakat gagal di nonaktifkan');
			redirect('master/masyarakat');
		}
	}

	// Untuk Mengaktifkan akun masyarakat
	public function aktif_masyarakat($nik)
	{
		$this->db->set('aktif', 1);
		$this->db->where('nik', $nik);
		if ($this->db->update('masyarakat')) {
			$this->session->set_flashdata('true', 'Akun masyarakat berhasil di aktifkan');
			redirect('master/masyarakat');
		} else {
			$this->session->set_flashdata('false', 'Akun masyarakat gagal di aktifkan');
			redirect('master/masyarakat');
		}
	}

	// Untuk Menambahkan akun petugas
	public function add_petugas()
	{
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama')),
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => md5($this->input->post('password')),
			'no_telp' => htmlspecialchars($this->input->post('telp')),
			'level' => htmlspecialchars($this->input->post('level'))
		];

		if ($this->db->insert('petugas', $data)) {
			$this->session->set_flashdata('true', 'Akun petugas baru berhasil ditambahkan');
			redirect('master/petugas');
		} else {
			$this->session->set_flashdata('false', 'Akun petugas baru gagal ditambahkan');
			redirect('master/petugas');
		}
	}
	// Untuk Menambahkan akun Admin
	public function add_admin()
	{
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama')),
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => md5($this->input->post('password')),
			'no_telp' => htmlspecialchars($this->input->post('telp')),
			'level' => htmlspecialchars($this->input->post('level'))
		];

		if ($this->db->insert('petugas', $data)) {
			$this->session->set_flashdata('true', 'Akun admin baru berhasil ditambahkan');
			redirect('master/admin');
		} else {
			$this->session->set_flashdata('false', 'Akun admin baru gagal ditambahkan');
			redirect('master/admin');
		}
	}
	// Untuk Menambahkan akun Masyarakat
	public function add_masyarakat()
	{
		$data = [
			'nik' => htmlspecialchars($this->input->post('nik')),
			'nama' => htmlspecialchars($this->input->post('nama')),
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => md5($this->input->post('password')),
			'no_telp' => htmlspecialchars($this->input->post('telp')),
		];

		if ($this->db->insert('masyarakat', $data)) {
			$this->session->set_flashdata('true', 'Akun masyarakat baru berhasil ditambahkan');
			redirect('master/masyarakat');
		} else {
			$this->session->set_flashdata('false', 'Akun masyarakat baru gagal ditambahkan');
			redirect('master/masyarakat');
		}
	}

	// Untuk menghapus akun petugas
	public function del_petugas($id)
	{
		if ($this->db->delete('petugas', ['id_admin' => $id])) {
			$this->db->delete('tanggapan', ['id_admin' => $id]);
			$this->session->set_flashdata('true', 'Akun petugas berhasil di hapus');
			redirect('master/petugas');
		} else {
			$this->session->set_flashdata('false', 'Akun petugas gagal di hapus');
			redirect('master/petugas');
		}
	}
	// Untuk menghapus akun petugas
	public function del_admin($id)
	{
		if ($this->db->delete('petugas', ['id_admin' => $id])) {
			$this->db->delete('tanggapan', ['id_admin' => $id]);
			$this->session->set_flashdata('true', 'Akun admin berhasil di hapus');
			redirect('master/admin');
		} else {
			$this->session->set_flashdata('false', 'Akun admin gagal di hapus');
			redirect('master/admin');
		}
	}
}

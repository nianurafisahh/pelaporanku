<?php

/**
 * 
 */
class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_jika_user();
		$this->load->model('M_user');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['pengguna'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profil';
		$data['pengguna'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('nama', 'nama', 'required|trim|min_length[3]', [
			'required' => 'Nama harus di isi',
			'min_length' => 'Nama min 3 huruf'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_user->edit_nama();
		}
	}

	public function edit_telp()
	{
		$data['title'] = 'Edit No Telp';
		$data['pengguna'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('telp', 'telp', 'required|trim|numeric|min_length[11]|max_length[13]|is_unique[masyarakat.no_telp]', [
			'required' => 'No telp harus di isi',
			'numeric' => 'No telp harus angka',
			'min_length' => 'No telp min 11 angka',
			'max_length' => 'No telp max 13 angka',
			'is_unique' => 'No telp sudah terdaftar, harap gunakan no telp lain'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit_telp', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_user->edit_telp();
		}
	}

	public function edit_password()
	{
		$data['title'] = 'Edit Password';
		$data['pengguna'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('pl', 'pl', 'required|trim', ['required' => 'Password lama harus di isi']);
		$this->form_validation->set_rules('pb', 'pb', 'required|trim|min_length[5]|matches[kpb]', [
			'required' => 'Password baru harus di isi',
			'min_length' => 'Password baru min 5 karakter',
			'matches' => 'Password baru harus sama dengan konfirmasi password baru'
		]);
		$this->form_validation->set_rules('kpb', 'kpb', 'required|trim|matches[pb]', [
			'required' => 'Konfirmasi password baru harus di isi',
			'matches' => 'Konfirmasi password baru harus sama dengan password baru'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit_pass', $data);
			$this->load->view('templates/footer');
		} else {
			$this->M_user->edit_password();
		}
	}
}

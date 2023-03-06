<?php

/**
 * 
 */
class Auth extends CI_Controller
{
	public function index()
	{

		if ($this->session->userdata('level')) {
			redirect('admin');
		} elseif ($this->session->userdata('nik')) {
			redirect('user');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username harus di isi']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus di isi']);

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			$this->pv_login();
		}
	}

	private function pv_login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$admin = $this->db->get_where('petugas', ['username' => $username])->row_array();
		$masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

		// var_dump($masyarakat);die;
		if ($admin) {
			if ($password == $admin['password']) {
				$data = [
					'username' => $admin['username'],
					'level' => $admin['level']
				];
				$this->session->set_userdata($data);
				redirect('admin');
			} elseif ($masyarakat) {

				if ($password == $masyarakat['password']) {
					if ($masyarakat['aktif'] == 1) {
						$data = [
							'username' => $masyarakat['username'],
							'nama' => $masyarakat['nama'],
							'nik' => $masyarakat['nik']
						];
						$this->session->set_userdata($data);
						redirect('user');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						akun sudah tidak aktif
						</div>');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    password salah
                    </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				password salah
				</div>');
				redirect('auth');
			}
		} elseif ($masyarakat) {
			if ($password == $masyarakat['password']) {
				if ($masyarakat['aktif'] == 1) {
					$data = [
						'username' => $masyarakat['username'],
						'nik' => $masyarakat['nik']
					];
					$this->session->set_userdata($data);
					redirect('user');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    akun sudah tidak aktif
                    </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				password salah
				</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			username tidak terdaftar
			</div>');
			redirect('auth');
		}
	}

	public function register()
	{

		if ($this->session->userdata('level')) {
			redirect('admin');
		} elseif ($this->session->userdata('nik')) {
			redirect('user');
		}

		// validasi semua inputan yang ada di halaman register
		$this->form_validation->set_rules('nik', 'NIK','required|trim|min_length[16]|max_length[16]|numeric|is_unique[masyarakat.nik]', [
			'required' => 'NIK harus di isi',
			'min_length' => 'NIK harus 16 angka',
			'max_length' => 'NIK harus 16 angka',
			'is_unique' => 'NIK sudah terdaftar',
			'numeric' => 'NIK harus angka'
		]);

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]', [
			'required' => 'Nama harus di isi',
			'min_length' => 'Nama Min 3 Huruf'
		]);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[masyarakat.username]', [
			'required' => 'Username harus di isi',
			'min_length' => 'Username Min 5 karakter',
			'is_unique' => 'Username Sudah terdaftar'
		]);

		$this->form_validation->set_rules('telp', 'No Telp', 'required|trim|min_length[11]|is_unique[masyarakat.no_telp]|max_length[13]|numeric', [
			'required' => 'No telp harus di isi',
			'min_length' => 'No telp Min 11 angka',
			'max_length' => 'No telp Max 13 angka',
			'numeric' => 'No telp harus angka',
			'is_unique' => 'No telp sudah terdaftar'
		]);

		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|matches[repassword]', [
			'required' => 'Password harus di isi',
			'min_length' => 'Password min 5 karakter',
			'matches' => 'Password harus sama dengan Ulangi Password'
		]);

		$this->form_validation->set_rules('repassword', 'repassword', 'required|trim|matches[password]', [
			'required' => 'Ulangi Password harus di isi',
			'matches' => 'Ulangi Password harus sama dengan Password'
		]);

		// jalankan form validasi 
		if ($this->form_validation->run() == false) {
			// jika validasi gagal
			$this->load->view('auth/register');
		} else {
			// jika validasi berhasil
			$this->pv_register();
		}
	}

	private function pv_register()
	{
		$data = [
			'nik' => htmlspecialchars($this->input->post('nik')),
			'nama' => htmlspecialchars($this->input->post('nama')),
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => md5($this->input->post('password')),
			'no_telp' => htmlspecialchars($this->input->post('telp')),
			'aktif' => 1
		];

		if ($this->db->insert('masyarakat', $data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			akun baru berhasil dibuat, silahkan masuk
			</div>');
			redirect('auth');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			akun baru gagal dibuat, silahkan coba kembali
			</div>');
			redirect('auth/register');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function error403()
	{
		$this->load->view('error/403');
	}
}

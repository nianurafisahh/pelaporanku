<?php
class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_jika_user();
        $this->load->model('M_user');
    }

    // Halaman Utama Laporan Pengaduan Untuk User(Masyarakat)
    public function index()
    {
        $data['title'] = 'Laporan Pengaduan';
        $data['pengguna'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['laporan'] = $this->M_user->getLaporanByNIK();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    // Untuk menambahkan laporan pengaduan
    public function add_laporan()
    {
        $data['title'] = 'Tambah Laporan Pengaduan';
        $data['pengguna'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('isi', 'isi', 'required|trim|min_length[10]', [
            'required' => 'Isi laporan wajib di isi',
            'min_length' => 'Isi laporan min 10 karakter'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/add');
            $this->load->view('templates/footer');
        } else {
            $this->M_user->add_laporan();
        }
    }

    // Halaman detail pengaduan
    public function detail($id = null)
    {

        $pengaduan = $this->db->get_where('pengaduan', ['md5(id_pengaduan)' => $id])->row();
        $idp = md5($pengaduan->id_pengaduan);
        if ($this->uri->segment(3) == null) {
            redirect('laporan/error404');
        } else {
            if ($id != $idp) {
                redirect('laporan/error404');
            }
        }


        $data['title'] = 'Detail Laporan Pengaduan';
        $data['pengguna'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->M_user->getPengaduanJoinMasyarakat($id, $data['pengguna']['nik']);
        $data['tanggapan'] = $this->M_user->getTanggapanJoinAdmin($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/detail', $data);
        $this->load->view('templates/footer');
    }

    // Halaman error 404
    public function error404()
    {
        $this->load->view('error/404');
    }
}

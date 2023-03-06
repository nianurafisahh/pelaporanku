<?php
class Pengaduan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        cek_admin_all_level();
        $this->load->model('M_pengaduan');
    }

    public function index(){
        $data['title'] = 'Data Pengaduan';
		$data['pengguna'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->M_pengaduan->getAllPengaduan();
        
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengaduan/index', $data);
		$this->load->view('templates/footer');
    }

    public function detail($id = null){
        $pengaduan = $this->db->get_where('pengaduan',['md5(id_pengaduan)' => $id])->row();
        $idp = md5($pengaduan->id_pengaduan);
           if($this->uri->segment(3) == null){
               redirect('pengaduan/error404');
           }  else {
               if($id != $idp){
                   redirect('pengaduan/error404');
               }
           }
    
        $data['title'] = 'Detail Data Pengaduan';
		$data['pengguna'] = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->M_pengaduan->getPengaduanByIdJoinMasyarakat($id);
        $data['tanggapan'] = $this->M_pengaduan->getTanggapanByIdJoinAdmin($id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengaduan/detail', $data);
            $this->load->view('templates/footer');

    }

    public function add_tanggapan($id){
        $admin = $this->db->get_where('petugas',['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('tanggapan','tanggapan','required|trim');
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('false','Tanggapan wajib di isi');
            redirect('pengaduan/detail/' . md5($id));
        } else {
            $this->M_pengaduan->add_tanggapan($id, $admin['id_admin']);
        }
    }


    public function del_tanggapan($id_pengaduan, $id_tanggapan){
       return $this->M_pengaduan->del_tanggapan($id_pengaduan, $id_tanggapan);
    }

    public function terima_pengaduan($id_pengaduan){
        $this->db->set('status_diterima', 'diterima')
                ->where('id_pengaduan', $id_pengaduan)
                ->update('pengaduan');
        redirect('admin/index');
    }

    public function tolak_pengaduan($id_pengaduan){
        $this->db->set('status_diterima', 'ditolak')
                ->where('id_pengaduan', $id_pengaduan)
                ->update('pengaduan');
        redirect('admin/index');
    }

    public function del_pengaduan($id){
        return $this->M_pengaduan->del_pengaduan($id);
    }

    public function edit_status(){
        return $this->M_pengaduan->edit_status();
    }

    public function error404(){
        $this->load->view('error/404');
    }

}
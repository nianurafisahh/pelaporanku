<?php

class M_generate extends CI_Model{
    public function getPengaduanByTgl($tglAwal, $tglAkhir, $status){
        $query = "SELECT pengaduan.id_pengaduan, pengaduan.nik, pengaduan.isi_laporan, pengaduan.status, masyarakat.nama FROM pengaduan, masyarakat WHERE pengaduan.nik = masyarakat.nik  
        AND pengaduan.tgl_pengaduan BETWEEN '".$tglAwal."' AND '".$tglAkhir."' AND pengaduan.status ='".$status."' ORDER BY pengaduan.tgl_pengaduan AND pengaduan.status  
        ASC";
        

        
        $this->db->select('pengaduan.id_pengaduan, pengaduan.nik, pengaduan.isi_laporan, pengaduan.status, masyarakat.nama')
                ->join('masyarakat', 'masyarakat.nik=pengaduan.nik')
                ->where("pengaduan.tgl_pengaduan BETWEEN '".$tglAwal."' AND '".$tglAkhir."'")
                ->where("status_diterima", "diterima");

        if ($status != '') {
            $this->db->where('pengaduan.status', $status);
        }

                
        return $this->db->get('pengaduan')->result(); 
    }

    public function getMasyarakatAll(){
        return $this->db->get('masyarakat')->result();
    }

    public function getPetugasAll(){
        return $this->db->get_where('petugas',['level' => 2])->result();
    }

    public function getAdminAll(){
        return $this->db->get_where('petugas',['level' => 1])->result();
    }
}
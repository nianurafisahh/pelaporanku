<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
    public function index() 
    {
        $data['title'] = 'Pengaduan Masyarakat';
        $this->load->view('landing');
    }
}
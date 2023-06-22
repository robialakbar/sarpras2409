<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == false) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['barang'] = $this->db->count_all('barang_masuk');
        $data['ruangan'] = $this->db->count_all('ruangan');
        $data['peminjaman'] = $this->db->count_all('peminjaman');
        $this->load->view('layout/header');
        $this->load->view('index', $data);
        $this->load->view('layout/footer');
    }
}

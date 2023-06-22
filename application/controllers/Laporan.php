<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == false) {
            redirect('auth');
        }
    }
    public function barang_masuk()
    {
        $this->form_validation->set_rules('tgl1', 'Tgl1', 'required');
        $this->form_validation->set_rules('tgl2', 'Tgl2', 'required');
        $data['title'] = 'Laporan Barang Masuk';
        if ($this->form_validation->run() == FALSE) {
            $data['barang'] = null;
            $this->load->view('layout/header', $data);
            $this->load->view('laporan1', $data);
            $this->load->view('layout/footer_lap');
        } else {
            $tgl1 = htmlspecialchars($this->input->post('tgl1'));
            $tgl2 = htmlspecialchars($this->input->post('tgl2'));
            $data['barang'] = $this->M_proses->laporan_barang_masuk($tgl1, $tgl2);
            $this->load->view('layout/header', $data);
            $this->load->view('laporan1', $data);
            $this->load->view('layout/footer_lap');
        }
    }
    public function barang_keluar()
    {
        $this->form_validation->set_rules('tgl1', 'Tgl1', 'required');
        $this->form_validation->set_rules('tgl2', 'Tgl2', 'required');
        $data['title'] = 'Laporan Barang Keluar';
        if ($this->form_validation->run() == FALSE) {
            $data['barang'] = null;
            $this->load->view('layout/header', $data);
            $this->load->view('laporan2', $data);
            $this->load->view('layout/footer_lap');
        } else {
            $tgl1 = htmlspecialchars($this->input->post('tgl1'));
            $tgl2 = htmlspecialchars($this->input->post('tgl2'));
            $data['barang'] = $this->M_proses->laporan_barang_keluar($tgl1, $tgl2);
            $this->load->view('layout/header', $data);
            $this->load->view('laporan2', $data);
            $this->load->view('layout/footer_lap');
        }
    }
    public function perencanaan()
    {
        $this->form_validation->set_rules('tgl1', 'Tgl1', 'required');
        $this->form_validation->set_rules('tgl2', 'Tgl2', 'required');
        $data['title'] = 'Laporan Perencanaan';
        if ($this->form_validation->run() == FALSE) {
            $data['barang'] = null;
            $this->load->view('layout/header', $data);
            $this->load->view('laporan3', $data);
            $this->load->view('layout/footer_lap');
        } else {
            $tgl1 = htmlspecialchars($this->input->post('tgl1'));
            $tgl2 = htmlspecialchars($this->input->post('tgl2'));
            $data['barang'] = $this->M_proses->laporan_perencanaan($tgl1, $tgl2);
            $this->load->view('layout/header', $data);
            $this->load->view('laporan3', $data);
            $this->load->view('layout/footer_lap');
        }
    }
    public function pemeliharaan()
    {
        $this->form_validation->set_rules('tgl1', 'Tgl1', 'required');
        $this->form_validation->set_rules('tgl2', 'Tgl2', 'required');
        $data['title'] = 'Laporan Pemeliharaan';
        if ($this->form_validation->run() == FALSE) {
            $data['pemeliharaan'] = null;
            $this->load->view('layout/header', $data);
            $this->load->view('laporan4', $data);
            $this->load->view('layout/footer_lap');
        } else {
            $tgl1 = htmlspecialchars($this->input->post('tgl1'));
            $tgl2 = htmlspecialchars($this->input->post('tgl2'));
            $data['pemeliharaan'] = $this->M_proses->laporan_pemeliharaan($tgl1, $tgl2);
            $this->load->view('layout/header', $data);
            $this->load->view('laporan4', $data);
            $this->load->view('layout/footer_lap');
        }
    }
    public function peminjaman()
    {
        $this->form_validation->set_rules('tgl1', 'Tgl1', 'required');
        $this->form_validation->set_rules('tgl2', 'Tgl2', 'required');
        $data['title'] = 'Laporan Peminjaman';
        if ($this->form_validation->run() == FALSE) {
            $data['peminjaman'] = null;
            $this->load->view('layout/header', $data);
            $this->load->view('laporan5', $data);
            $this->load->view('layout/footer_lap');
        } else {
            $tgl1 = htmlspecialchars($this->input->post('tgl1'));
            $tgl2 = htmlspecialchars($this->input->post('tgl2'));
            $data['peminjaman'] = $this->M_proses->laporan_peminjaman($tgl1, $tgl2);
            $this->load->view('layout/header', $data);
            $this->load->view('laporan5', $data);
            $this->load->view('layout/footer_lap');
        }
    }
}

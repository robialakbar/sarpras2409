<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pemeliharaan extends CI_Controller
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
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('sarana', 'Sarana', 'required');
        $this->form_validation->set_rules('prasarana', 'Prasarana', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $data['pemeliharaan'] = $this->db->get('pemeliharaan')->result_array();
            $this->load->view('layout/header');
            $this->load->view('pemeliharaan', $data);
            $this->load->view('layout/footer');
        } else {
            $id_user = $this->session->userdata('user_id');
            $data = [
                'id_user' => $id_user,
                'kode' => htmlspecialchars($this->input->post('kode')),
                'total_sarana' => htmlspecialchars($this->input->post('sarana')),
                'total_prasarana' => htmlspecialchars($this->input->post('prasarana')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal')),
            ];
            $query = $this->db->insert('pemeliharaan', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('pemeliharaan');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('pemeliharaan');
            }
        }
    }
    public function update($id)
    {
        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('sarana', 'Sarana', 'required');
        $this->form_validation->set_rules('prasarana', 'Prasarana', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('pemeliharaan');
        } else {
            $data = [
                // 'id_user' => $id_user,
                // 'kode' => htmlspecialchars($this->input->post('kode')),
                'total_sarana' => htmlspecialchars($this->input->post('sarana')),
                'total_prasarana' => htmlspecialchars($this->input->post('prasarana')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal')),
            ];
            $this->db->where(['id_pemeliharaan' => $id]);
            $query = $this->db->update('pemeliharaan', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('pemeliharaan');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update!');
                redirect('pemeliharaan');
            }
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_pemeliharaan  ' => $id]);
        $query = $this->db->delete('pemeliharaan');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('pemeliharaan');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('pemeliharaan');
        }
    }
}

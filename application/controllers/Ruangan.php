<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Ruangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == false) {
            redirect('auth');
        }
        if ($this->session->userdata('role') == 'staff') {
            redirect('dashboard');
        }
    }
    public function index()
    {
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
        if ($this->form_validation->run() == false) {
            // $data['title'] = "ruangan";
            $data['ruangan'] = $this->db->get('ruangan')->result_array();
            $this->load->view('layout/header');
            $this->load->view('ruangan', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_ruangan' => htmlspecialchars($this->input->post('ruangan'))
            ];
            $query = $this->db->insert('ruangan', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('ruangan');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('ruangan');
            }
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('ruangan');
        } else {
            $data = [
                'nama_ruangan' => htmlspecialchars($this->input->post('ruangan'))
            ];
            $this->db->where(['id_ruangan' => $id]);
            $query = $this->db->update('ruangan', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('ruangan');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update!');
                redirect('ruangan');
            }
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_ruangan  ' => $id]);
        $query = $this->db->delete('ruangan');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('ruangan');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('ruangan');
        }
    }
}

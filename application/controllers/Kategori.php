<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kategori extends CI_Controller
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
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() == false) {
            // $data['title'] = "Kategori";
            $data['kategori'] = $this->db->get('kategori')->result_array();
            $this->load->view('layout/header');
            $this->load->view('kategori', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('kategori'))
            ];
            $query = $this->db->insert('kategori', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('kategori');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('kategori');
            }
        }
    }
    public function update($id)
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('kategori');
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('kategori'))
            ];
            $this->db->where(['id_kategori' => $id]);
            $query = $this->db->update('kategori', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('kategori');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update!');
                redirect('kategori');
            }
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_kategori  ' => $id]);
        $query = $this->db->delete('kategori');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('kategori');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('kategori');
        }
    }
}

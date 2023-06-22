<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Inventaris extends CI_Controller
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

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == false) {
            $data['barang'] = $this->db->get('barang_masuk')->result_array();
            $this->load->view('layout/header');
            $this->load->view('barangmasuk', $data);
            $this->load->view('layout/footer');
        } else {
            $kode = htmlspecialchars($this->input->post('kode'));
            $cek = $this->db->get_where('barang_masuk', ['kode' => $kode])->row_array();

            if ($cek > 0) {
                $this->session->set_flashdata('pesan', 'Kode telah digunakan, harap memasukkan kode lain');
                redirect('inventaris/barang_masuk');
            }
            $data = [
                'kode' => htmlspecialchars($this->input->post('kode')),
                'id_kategori' => htmlspecialchars($this->input->post('kategori')),
                'jenis_barang' => htmlspecialchars($this->input->post('jenis')),
                'merk' => htmlspecialchars($this->input->post('merk')),
                'jumlah_barang' => htmlspecialchars($this->input->post('jumlah')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal'))
            ];
            $query =  $this->db->insert('barang_masuk', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('inventaris/barang_masuk');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('inventaris/barang_masuk');
            }
        }
    }
    public function update_barang_masuk($id)
    {

        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('inventaris/barang_masuk');
        } else {

            $data = [
                // 'kode' => htmlspecialchars($this->input->post('kode')),
                'id_kategori' => htmlspecialchars($this->input->post('kategori')),
                'jenis_barang' => htmlspecialchars($this->input->post('jenis')),
                'merk' => htmlspecialchars($this->input->post('merk')),
                'jumlah_barang' => htmlspecialchars($this->input->post('jumlah')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal'))
            ];
            $this->db->where('id_barang_masuk', $id);
            $query =  $this->db->update('barang_masuk', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('inventaris/barang_masuk');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('inventaris/barang_masuk');
            }
        }
    }
    public function hapus_barang_masuk($id)
    {
        $this->db->where(['id_barang_masuk' => $id]);
        $query = $this->db->delete('barang_masuk');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('inventaris/barang_masuk');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('inventaris/barang_masuk');
        }
    }

    public function barang_keluar()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        // $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == false) {
            $data['barangkeluar'] = $this->db->get('barang_keluar')->result_array();
            $this->load->view('layout/header');
            $this->load->view('barangkeluar', $data);
            $this->load->view('layout/footer');
        } else {
            $kode = htmlspecialchars($this->input->post('kode'));
            $cek = $this->db->get_where('barang_keluar', ['kode' => $kode])->row_array();

            if ($cek > 0) {
                $this->session->set_flashdata('pesan', 'Kode telah digunakan, harap memasukkan kode lain');
                redirect('inventaris/barang_masuk');
            }
            $id = htmlspecialchars($this->input->post('barang'));
            $barang = $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id])->row_array();
            $data = [
                'kode' => htmlspecialchars($this->input->post('kode')),
                'id_kategori' => $barang['id_kategori'],
                'jenis_barang' => $barang['jenis_barang'],
                'jumlah_barang' => htmlspecialchars($this->input->post('jumlah')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal'))
            ];
            $query =  $this->db->insert('barang_keluar', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('inventaris/barang_keluar');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('inventaris/barang_keluar');
            }
        }
    }

    public function update_barang_keluar($id)
    {

        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('inventaris/barang_keluar');
        } else {

            $data = [
                'jumlah_barang' => htmlspecialchars($this->input->post('jumlah')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal'))
            ];
            $this->db->where('id_barang_keluar', $id);
            $query =  $this->db->update('barang_keluar', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('inventaris/barang_keluar');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('inventaris/barang_keluar');
            }
        }
    }
    public function hapus_barang_keluar($id)
    {
        $this->db->where(['id_barang_keluar' => $id]);
        $query = $this->db->delete('barang_keluar');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('inventaris/barang_keluar');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('inventaris/barang_keluar');
        }
    }
}

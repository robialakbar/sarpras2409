<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Peminjaman extends CI_Controller
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
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tanggal2', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $data['peminjaman'] = $this->db->get('peminjaman')->result_array();
            $this->load->view('layout/header');
            $this->load->view('datapeminjaman', $data);
            $this->load->view('layout/footer');
        } else {
            $id_user = $this->session->userdata('user_id');
            $data = [
                'kode' => htmlspecialchars($this->input->post('kode')),
                'nama_peminjam' => htmlspecialchars($this->input->post('nama')),
                'jenis_yang_dipinjam' => htmlspecialchars($this->input->post('barang')),
                'jumlah' => htmlspecialchars($this->input->post('jumlah')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal')),
                'tanggal_kembali' => htmlspecialchars($this->input->post('tanggal2')),
            ];
            $query = $this->db->insert('peminjaman', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('peminjaman');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('peminjaman');
            }
        }
    }
    public function update($id)
    {
        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tanggal2', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('peminjaman');
        } else {
            $data = [
                // 'kode' => htmlspecialchars($this->input->post('kode')),
                'nama_peminjam' => htmlspecialchars($this->input->post('nama')),
                'jenis_yang_dipinjam' => htmlspecialchars($this->input->post('barang')),
                'jumlah' => htmlspecialchars($this->input->post('jumlah')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal')),
                'tanggal_kembali' => htmlspecialchars($this->input->post('tanggal2')),
            ];
            $this->db->where(['id_peminjaman' => $id]);
            $query = $this->db->update('peminjaman', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('peminjaman');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update!');
                redirect('peminjaman');
            }
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_peminjaman  ' => $id]);
        $query = $this->db->delete('peminjaman');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('peminjaman');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('peminjaman');
        }
    }
    public function pengembalian()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('peminjaman', 'Peminjaman', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $data['pengembalian'] = $this->db->get('pengembalian')->result_array();
            $this->load->view('layout/header');
            $this->load->view('datapengembalian', $data);
            $this->load->view('layout/footer');
        } else {
            $idp = htmlspecialchars($this->input->post('peminjaman'));
            $dataa = $this->db->get_where('peminjaman', ['id_peminjaman' => $idp])->row_array();
            $data = [
                'kode' => htmlspecialchars($this->input->post('kode')),
                'nama_peminjam' => $dataa['nama_peminjam'],
                'jenis_yang_dipinjam' => $dataa['jenis_yang_dipinjam'],
                'jumlah' => htmlspecialchars($this->input->post('jumlah')),
                'kondisi' => htmlspecialchars($this->input->post('kondisi')),
                'status' => htmlspecialchars($this->input->post('status')),
                'tanggal_pengembalian' => htmlspecialchars($this->input->post('tanggal')),
            ];
            $query = $this->db->insert('pengembalian', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('peminjaman/pengembalian');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('peminjaman/pengembalian');
            }
        }
    }
    public function update_pengembalian($id)
    {

        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        // $this->form_validation->set_rules('peminjaman', 'Peminjaman', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('peminjaman/pengembalian');
        } else {
            $data = [
                // 'kode' => htmlspecialchars($this->input->post('kode')),
                // 'nama_peminjam' => $dataa['nama_peminjam'],
                // 'jenis_yang_dipinjam' => $dataa['jenis_yang_dipinjam'],
                'jumlah' => htmlspecialchars($this->input->post('jumlah')),
                'kondisi' => htmlspecialchars($this->input->post('kondisi')),
                'status' => htmlspecialchars($this->input->post('status')),
                'tanggal_pengembalian' => htmlspecialchars($this->input->post('tanggal')),
            ];
            $this->db->where(['id_pengembalian' => $id]);
            $query = $this->db->update('pengembalian', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('peminjaman/pengembalian');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update!');
                redirect('peminjaman/pengembalian');
            }
        }
    }
    public function hapus_pengembalian($id)
    {
        $this->db->where(['id_pengembalian  ' => $id]);
        $query = $this->db->delete('pengembalian');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('peminjaman/pengembalian');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('peminjaman/pengembalian');
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Perencanaan extends CI_Controller
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
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == false) {
            $data['perencanaan'] = $this->db->get('kelola_perencanaan')->result_array();
            $this->load->view('layout/header');
            $this->load->view('kelolaperencanaan', $data);
            $this->load->view('layout/footer');
        } else {
            $kode = htmlspecialchars($this->input->post('kode'));
            $cek = $this->db->get_where('kelola_perencanaan', ['kode' => $kode])->row_array();

            if ($cek > 0) {
                $this->session->set_flashdata('pesan', 'Kode telah digunakan, harap memasukkan kode lain');
                redirect('perencanaan');
            }
            $harga = htmlspecialchars($this->input->post('harga'));
            $jumlah = htmlspecialchars($this->input->post('jumlah'));
            $total = $harga * $jumlah;
            $data = [
                'kode' => htmlspecialchars($this->input->post('kode')),
                'id_kategori' => htmlspecialchars($this->input->post('kategori')),
                'jenis_barang' => htmlspecialchars($this->input->post('jenis')),
                'merk' => htmlspecialchars($this->input->post('merk')),
                'harga' => $harga,
                'jumlah_barang' => $jumlah,
                'total' => $total,
                'tanggal_perencanaan' => htmlspecialchars($this->input->post('tanggal')),
                'status' => 'menunggu'
            ];
            $query =  $this->db->insert('kelola_perencanaan', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('perencanaan');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('perencanaan');
            }
        }
    }
    public function update($id)
    {
        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('perencanaan');
        } else {

            $harga = htmlspecialchars($this->input->post('harga'));
            $jumlah = htmlspecialchars($this->input->post('jumlah'));
            $total = $harga * $jumlah;
            $data = [
                // 'kode' => htmlspecialchars($this->input->post('kode')),
                'id_kategori' => htmlspecialchars($this->input->post('kategori')),
                'jenis_barang' => htmlspecialchars($this->input->post('jenis')),
                'merk' => htmlspecialchars($this->input->post('merk')),
                'harga' => $harga,
                'jumlah_barang' => $jumlah,
                'total' => $total,
                'tanggal_perencanaan' => htmlspecialchars($this->input->post('tanggal')),
                // 'status' => 'menunggu'
            ];
            $this->db->where('id_kelola_perencanaan', $id);
            $query =  $this->db->update('kelola_perencanaan', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Update');
                redirect('perencanaan');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('perencanaan');
            }
        }
    }
    public function hapus($id)
    {
        $this->db->where(['id_kelola_perencanaan' => $id]);
        $query = $this->db->delete('kelola_perencanaan');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('perencanaan');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('perencanaan');
        }
    }
    public function acc($id)
    {
        $this->db->set('status', 'diterima');
        $this->db->where('id_kelola_perencanaan', $id);
        $this->db->update('kelola_perencanaan');
        $this->session->set_flashdata('flash', 'Di Update');
        redirect('perencanaan');
    }
    public function tolak($id)
    {
        $this->db->set('status', 'ditolak');
        $this->db->where('id_kelola_perencanaan', $id);
        $this->db->update('kelola_perencanaan');
        $this->session->set_flashdata('flash', 'Di Update');
        redirect('perencanaan');
    }
}

<?php
class M_proses extends CI_Model
{

    public function get_all_kategori()
    {
        $query = $this->db->get('kategori')->result_array();
        return $query;
    }
    public function get_where_kategori($id)
    {
        $query = $this->db->get_where('kategori', ['id_kategori !=' => $id])->result_array();
        return $query;
    }

    public function get_kategori($id)
    {
        $query = $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
        return $query;
    }

    public function get_all_barang()
    {
        $query = $this->db->get('barang_masuk')->result_array();
        return $query;
    }
    public function get_where_barang($id)
    {
        $query = $this->db->get_where('barang_masuk', ['id_barang_masuk !=' => $id])->result_array();
        return $query;
    }

    public function get_barang($id)
    {
        $query = $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id])->row_array();
        return $query;
    }
    public function get_user($id)
    {
        $query = $this->db->get_where('users', ['id_user' => $id])->row_array();
        return $query;
    }
    public function get_all_peminjaman()
    {
        $query = $this->db->get('peminjaman')->result_array();
        return $query;
    }
    public function laporan_barang_masuk($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->where('tanggal >=', $tgl1);
        $this->db->where('tanggal <=', $tgl2);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function laporan_barang_keluar($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->where('tanggal >=', $tgl1);
        $this->db->where('tanggal <=', $tgl2);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function laporan_perencanaan($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->from('kelola_perencanaan');
        $this->db->where('tanggal_perencanaan >=', $tgl1);
        $this->db->where('tanggal_perencanaan <=', $tgl2);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function laporan_pemeliharaan($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->from('pemeliharaan');
        $this->db->where('tanggal >=', $tgl1);
        $this->db->where('tanggal <=', $tgl2);
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function laporan_peminjaman($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->where('tanggal >=', $tgl1);
        $this->db->where('tanggal <=', $tgl2);
        $query = $this->db->get()->result_array();
        return $query;
    }
}

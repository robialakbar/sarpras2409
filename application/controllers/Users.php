<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Users extends CI_Controller
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
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', ['is_unique' => 'This username has already registered!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            // $data['title'] = 'SIPerba | Tambah User';
            $data['users'] = $this->db->get_where('users', ['role' => 'staff'])->result_array();
            $this->load->view('layout/header');
            $this->load->view('users', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
                'role' => htmlspecialchars($this->input->post('role')),
                'created' => date("Y-m-d")
            ];
            $query =  $this->db->insert('users', $data);
            if ($query) {
                $this->session->set_flashdata('flash', 'Di Tambahkan');
                redirect('users');
            } else {
                $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
                redirect('users');
            }
        }
    }
    public function updateuser($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $user = $this->db->get_where('users', ['id_user' => $id])->row_array();
        $new_username = htmlspecialchars($this->input->post('username'));
        if ($new_username == $user['username']) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', ['is_unique' => 'This username has already registered!']);
        }
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update1');
            redirect('users');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'username' => htmlspecialchars($this->input->post('username')),
                'role' => htmlspecialchars($this->input->post('role'))
            ];
            $where = [
                'id_user' => $id
            ];
            $this->db->where($where);
            $query =  $this->db->update('users', $data);
            if (!$query) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('users');
            } else {
                $this->session->set_flashdata('flash', 'Di Updatee');
                redirect('users');
            }
        }
    }
    public function hapus_user($id)
    {
        $this->db->where(['id_user' => $id]);
        $query = $this->db->delete('users');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            redirect('users');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            redirect('users');
        }
    }
}

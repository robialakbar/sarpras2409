<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Profile extends CI_Controller
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
        $data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('user_id')])->row_array();
        $this->load->view('layout/header');
        $this->load->view('profile', $data);
        $this->load->view('layout/footer');
    }
    public function update()
    {

        $id = $this->session->userdata('user_id');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $user = $this->db->get_where('users', ['id_user' => $id])->row_array();
        $new_username = htmlspecialchars($this->input->post('username'));
        if ($new_username == $user['username']) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', ['is_unique' => 'This username has already registered!']);
        }
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update!!');
            redirect('profile');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'username' => htmlspecialchars($this->input->post('username')),
            ];
            $where = [
                'id_user' => $id
            ];
            $this->db->where($where);
            $query =  $this->db->update('users', $data);
            if (!$query) {
                $this->session->set_flashdata('flash-gagal', 'Di Update');
                redirect('profile');
            } else {
                $this->session->set_flashdata('flash', 'Di Updatee');
                redirect('profile');
            }
        }
    }
    public function changepassword()
    {
        $data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('user_id')])->row_array();
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[6]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            redirect('profile');
        } else {
            $current_password = htmlspecialchars($this->input->post('current_password'));
            $new_password = htmlspecialchars($this->input->post('new_password'));
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger my-3 ">
					<div>
						<span>  Wrong current password!</span>
					</div>
				</div>');
                redirect('/profile');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger my-3 ">
					<div>
						<span>   New Password cannot be the same as current password!</span>
					</div>
				</div>');
                    redirect('/profile');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('id_user', $data['user']['id_user']);
                    $this->db->update('users');
                    $this->session->set_flashdata('flash', 'Di Update');
                    redirect('/profile');
                }
            }
        }
    }
}

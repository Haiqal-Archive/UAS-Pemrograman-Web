<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
    }

    public function index()
    {
        if ($this->session->userdata('is_login')) {
            return redirect('admin');
        }
        $data['title'] = 'Login';
        $this->load->view('login', $data);
    }

    public function cek()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('login');
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Login_model->login($email, $password);

        if ($user) {
            $session_data = array(
                'id'       => $user['id'],
                'nama'     => $user['nama'],
                'email'    => $user['username'],
                'role'     => isset($user['role']) ? $user['role'] : null,
                'is_login' => TRUE
            );
            $this->session->set_userdata($session_data);
            return redirect('admin');
        }

        $this->session->set_flashdata('error', 'Email atau password salah.');
        return redirect('login');
    }

    public function logout()
    {
        $this->session->sess_regenerate(TRUE);
        $this->session->sess_destroy();
        return redirect('login');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login($email, $pass)
    {
        $this->db->where('username', $email);
        $query = $this->db->get('users');
        $user = $query->row_array();

        if (!$user) {
            return FALSE;
        }

        if (isset($user['password']) && password_verify($pass, $user['password'])) {
            return $user;
        }

        return FALSE;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function cek_username($username)
    {
        $query = $this->db->get_where('tb_user', ['user_name' => $username]);
        return $query->num_rows();
    }

    public function get_password($username)
    {
        $data = $this->db->get_where('tb_user', ['user_name' => $username])->row_array();
        return $data['user_pass'];
    }

    public function userdata($username)
    {
        return $this->db->get_where('tb_user', ['user_name' => $username])->row_array();
    }
}

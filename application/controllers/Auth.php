<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Aplikasi';
            $this->load->view('login.php', $data);
        } else {
            $input = $this->input->post();

            $cek_username = $this->auth->cek_username($input['username']);
            if ($cek_username > 0) {
                $password = $this->auth->get_password($input['username']);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['username']);
                    if ($user_db['user_status'] != 1) {
                        // set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        $this->session->set_flashdata('message', "<div class='alert alert-danger'>Akun Anda <strong>belum aktif!</strong> Silahkan hubungi admin untuk mengaktifkan akun.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                        redirect('auth');
                    } else {
                        $userdata = [
                            'user_id'  => $user_db['user_id'],
                            'name' => $user_db['user_name'],
                            'level'  => $user_db['user_level'],
                            'timestamp' => time(),
                            'logged_in' => TRUE
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    // set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                // set_pesan('username belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Anda berhasil logout. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        redirect('auth');
    }
}

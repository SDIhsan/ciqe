<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        // if (!is_admin()) {
        //     redirect('dashboard');
        // }
        $this->load->model('Main_model', 'mm');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data['title'] = 'Users';
        $data['user'] = $this->mm->get('tb_user');
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php');
        $this->load->view('users/index.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    private function _validasi($mode)
    {
        if ($mode == 'add') {
            $this->form_validation->set_rules('name','Username', 'required');
            $this->form_validation->set_rules('pass','Password', 'required');
            $this->form_validation->set_rules('level','Level User', 'required');
        } else if ($mode == 'pass') {
            $this->form_validation->set_rules('pass','Password', 'required');
        } else if ($mode == 'edit') {
            $this->form_validation->set_rules('name','Username', 'required');
            $this->form_validation->set_rules('level','Level User', 'required');
        } else {
            $this->form_validation->set_rules('status','Status User', 'required');
        }
    }

    public function add() 
    {
        $this->_validasi('add');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $input = $this->input->post();
            $input_data = [
                'user_name' => $input['name'],
                'user_pass' => password_hash($input['pass'], PASSWORD_DEFAULT),
                'user_level' => $input['level'],
                'user_status' => 0
            ];
            $insert = $this->mm->insert('tb_user', $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
        }
        redirect('users');
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            redirect('users');
        } else {
            $input = $this->input->post();
            $input_data = [
                'user_name'      => $input['username'],
                'user_level'          => $input['level']
            ];

            if ($this->mm->update('tb_user', 'user_id', $id, $input_data)) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
            redirect('users');
        }
    }

    public function updatepassword($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('pass');

        if ($this->form_validation->run() == false) {
            redirect('users');
        } else {
            $input = $this->input->post();
            $input_data = [
                'user_pass'      => password_hash($input['pass'], PASSWORD_DEFAULT)
            ];

            if ($this->admin->update('tb_user', 'user_id', $id, $input_data)) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
            redirect('users');
        }
    }

    public function editstatus($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('status');

        if ($this->form_validation->run() == false) {
            redirect('users');
        } else {
            $input = $this->input->post();
            $input_data = [
                'user_status'      => $input['status'],
            ];

            if ($this->mm->update('tb_user', 'user_id', $id, $input_data)) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
            redirect('users');
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->mm->delete('tb_user', 'user_id', $id)) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil dihapus. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menghapus data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }
        redirect('users');
    }
}

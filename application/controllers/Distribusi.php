<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->model('Main_model', 'mm');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data['title'] = 'Distribusi';
        $data['distribusi'] = $this->mm->get('tb_distribusi');
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php');
        $this->load->view('distribusi/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('ket','Keterangan', 'required');
        $this->form_validation->set_rules('jumlah','Jumlah', 'required');
    }

    public function add() 
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $input = $this->input->post();
            $input_data = [
                'distribusi_ket' => $input['ket'],
                'distribusi_jumlah' => $input['jumlah']
            ];
            $insert = $this->mm->insert('tb_distribusi', $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
        }
        redirect('distribusi');
    }

    public function update($id) 
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $input = $this->input->post();
            $input_data = [
                'distribusi_ket' => $input['ket'],
                'distribusi_jumlah' => $input['jumlah']
            ];
            $insert = $this->mm->update('tb_distribusi', 'distribusi_id', $id, $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
        }
        redirect('distribusi');
    }

    public function delete($id)
    {
        $delete = $this->mm->delete('tb_distribusi', 'distribusi_id', $id);
        if ($delete) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil dihapus. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>SUCCESS!</strong> Data gagal dihapus. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }
        redirect('distribusi');
	}
}
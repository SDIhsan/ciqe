<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qurban extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->model('Main_model', 'mm');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $data['title'] = 'Qurban';
        $data['qurban'] = $this->mm->get('tb_qurban');
        
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php');
        $this->load->view('qurban/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('status','Status', 'required');
        $this->form_validation->set_rules('nama','Nama', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            redirect('qurban');
        } else {
            $input = $this->input->post();
            $jumlah = $this->mm->counts('tb_qurban', 'qurban_status', $input['status']);
            $tambah = $jumlah + 1;
            $input_data = [
                'qurban_status' => $input['status'],
                'qurban_nomor' =>  $tambah,
                'qurban_shohibul' => $input['nama']
            ];
            $insert = $this->mm->insert('tb_qurban', $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
            redirect('qurban');
        }
    }

    public function edit($id)
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            redirect('qurban');
        } else {
            $input = $this->input->post();
            $input_data = [
                'qurban_status' => $input['status'],
                'qurban_nomor' =>  $input['nomor'],
                'qurban_shohibul' => $input['nama']
            ];
            $insert = $this->mm->update('tb_qurban', 'qurban_id', $id, $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
            redirect('qurban');
        }
    }

    public function updatesembelih($id)
    {
        $this->form_validation->set_rules('sembelih','Status Penyembelihan', 'required');
        if ($this->form_validation->run() == false) {
            redirect('qurban');
        } else {
            $input = $this->input->post();
            date_default_timezone_set("Asia/Jakarta");
            if ($input['sembelih'] == 1) {
                $s = date('Y-m-d H:i:s');
            } else {
                $s = null;
            }

            if ($input['pengeletan'] == 1) {
                $p = date('Y-m-d H:i:s');
            } else {
                $p = null;
            }

            $input_data = [
                'qurban_sembelih' => $s
            ];
            $insert = $this->mm->update('tb_qurban', 'qurban_id', $id, $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil diupdate. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal mengupdate data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
            redirect('qurban');
        }
    }

    public function updatepengeletan($id)
    {
        $this->form_validation->set_rules('pengeletan','Status Pengeletan', 'required');
        if ($this->form_validation->run() == false) {
            redirect('qurban');
        } else {
            $input = $this->input->post();
            date_default_timezone_set("Asia/Jakarta");

            if ($input['pengeletan'] == 1) {
                $p = date('Y-m-d H:i:s');
            } else {
                $p = null;
            }

            $input_data = [
                'qurban_pengeletan' => $p
            ];
            $insert = $this->mm->update('tb_qurban', 'qurban_id', $id, $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil diupdate. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal mengupdate data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
            redirect('qurban');
        }
    }

    public function delete($id)
    {
        $delete = $this->mm->delete('tb_qurban', 'qurban_id', $id);
        if ($delete) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil dihapus. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>SUCCESS!</strong> Data gagal dihapus. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        }
        redirect('qurban');
	}
}
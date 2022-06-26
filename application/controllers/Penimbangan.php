<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penimbangan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // cek_login();
        $this->load->model('Main_model', 'mm');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $this->db->join('tb_qurban', 'tb_penimbangan.penimbangan_qurban = tb_qurban.qurban_id');
        $data['penimbangan'] = $this->mm->get('tb_penimbangan');
        $data['qurban'] = $this->mm->get('tb_qurban');
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php');
        $this->load->view('timbangan/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('shohibul','Shohibul', 'required');
        $this->form_validation->set_rules('jumlah','Jumlah', 'required');
    }

    public function add() 
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $input = $this->input->post();
            $jumlah = $this->mm->count_where('tb_penimbangan', 'penimbangan_qurban', $input['shohibul']);
            $ke = $jumlah + 1;
            $input_data = [
                'penimbangan_qurban' => $input['shohibul'],
                'penimbangan_ke' => $ke,
                'penimbangan_jumlah' => $input['jumlah']
            ];
            $insert = $this->mm->insert('tb_penimbangan', $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
        }
        redirect('penimbangan');
    }

    public function update($id) 
    {
        $this->form_validation->set_rules('ke','Ke', 'required');
        $this->form_validation->set_rules('jumlah','Jumlah', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
        } else {
            $input = $this->input->post();
            $input_data = [
                'penimbangan_ke' => $input['ke'],
                'penimbangan_jumlah' => $input['jumlah']
            ];
            $insert = $this->mm->update('tb_penimbangan', 'penimbangan_id', $id, $input_data);

            if ($insert) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> Data berhasil disimpan. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> Gagal menyimpan data. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
            }
        }
        redirect('penimbangan');
    }
}
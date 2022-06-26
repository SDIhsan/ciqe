<?php

function check_login()
{
    $ci = get_instance();
    if (!$ci->session->has_userdata('login_session')) {
        set_message('Silahkan login!');
        redirect('auth');
    }
}

function is_admin()
{
    $ci = get_instance();
    $level = $ci->session->userdata('login_session')['level'];

    $status = true;

    if ($level != 'Admin') {
        $status = false;
    }

    return $status;
}

function set_message($message, $tipe = true)
{
    $ci = get_instance();
    if ($tipe) {
        $ci->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> {$message} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    } else {
        $ci->session->set_flashdata('message', "<div class='alert alert-danger'><strong>ERROR!</strong> {$message} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    }
}

function userdata($field)
{
    $ci = get_instance();
    $ci->load->model('Main_model', 'mm');

    $userId = $ci->session->userdata('login_session')['user_id'];
    return $ci->mm->get('tb_user', ['user_id' => $userId])[$field];
}

function output_json($data)
{
    $ci = get_instance();
    $data = json_encode($data);
    $ci->output->set_content_type('application/json')->set_output($data);
}

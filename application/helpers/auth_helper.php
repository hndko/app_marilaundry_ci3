<?php

function auth_middleware()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('is_logged_in')) {
        redirect('auth/login');
    }
}

function current_user()
{
    $CI = &get_instance();
    $user_id = $CI->session->userdata('user_id');

    if (!$user_id) {
        return null;
    }

    static $user = null;
    if ($user === null) {
        $CI->load->model('User_model');
        // We can access DB directly or add get_by_id to model.
        // Using Direct DB for now as User_model might not have get_by_id yet.
        $user = $CI->db->get_where('users', ['id' => $user_id])->row();
    }

    return $user;
}

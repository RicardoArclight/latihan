<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id');
    if ($user_session) {
        redirect('admin');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('id');
    if (!$user_session) {
        redirect('login');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 'admin') {
        redirect('admin');
    }

    function format_file_size($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}

if (!function_exists('get_file_size')) {
    function get_file_size($file_path)
    {
        if (file_exists($file_path)) {
            $size = filesize($file_path);

            $units = array('B', 'KB', 'MB', 'GB', 'TB');
            $i = floor(log($size, 1024));

            return round($size / pow(1024, $i), 2) . ' ' . $units[$i];
        }

        return 'File not found';
    }
}

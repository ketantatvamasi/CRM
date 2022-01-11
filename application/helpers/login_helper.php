<?php

if (!function_exists('user_is_logged_in')) {
    function user_is_logged_in()
    {
        $CI = &get_instance();
        $is_logged_in = $CI->session->userdata('user_id');
        if (!isset($is_logged_in)) {
            redirect(base_url() . 'backend/login');
            die();
        }
        // else{
        //     redirect(base_url().'dashboard');  
        // }       
    }
}

if (!function_exists('user_is_session_login')) {
    function user_is_session_login()
    {
        $CI = &get_instance();
        $is_logged_in = $CI->session->userdata('user_id');
        if (isset($is_logged_in)) {
            redirect(base_url() . 'backend/dashboard');
        }
    }
}

// if (!function_exists('admin_is_logged_in')) {
//     function admin_is_logged_in()
//     {
//         $CI = &get_instance();
//         $is_logged_in = $CI->session->userdata('admin_id');
//         if (!isset($is_logged_in)) {
//             redirect(base_url() . 'admin/login');
//             die();
//         }   
//     }
// }

// if (!function_exists('admin_is_session_login')) {
//     function admin_is_session_login()
//     {
//         $CI = &get_instance();
//         $is_logged_in = $CI->session->userdata('admin_id');
//         if (isset($is_logged_in)) {
//             redirect(base_url() . 'admin/dashboard');
//         }
//     }
// }

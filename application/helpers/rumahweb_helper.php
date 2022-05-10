<?php
function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('token')) {
        redirect('login');
    }
}

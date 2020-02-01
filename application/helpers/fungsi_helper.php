<?php

function clear_cookies()
{
    $ci =& get_instance();
    $params = array(
        'userid' => null, 
        'level' => null,
        'id_ranting' =>null
    );
    $ci->session->set_userdata($params);
}

function check_not_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if($user_session == null){
        redirect('auth/login');
    }
}


function check_admin()
{
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->level != 1){
          redirect('dashboard');
    }
}

function waiting()
{
    $time = $_SESSION["time"];
    $time_check = $time + 5;
    if(time() > $time_check)
    {
        $_SESSION["username"] = False;
        redirect('');
    }
}

?>
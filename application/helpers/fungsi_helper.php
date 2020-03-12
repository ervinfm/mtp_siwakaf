<?php

function clear_cookies()
{
    $ci = &get_instance();
    $params = array(
        'userid' => null,
        'level' => null,
        'id_ranting' => null
    );
    $ci->session->set_userdata($params);
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session == null) {
        redirect('auth/login');
    }
}


function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function waiting()
{
    $time = $_SESSION["time"];
    $time_check = $time + 5;
    if (time() > $time_check) {
        $_SESSION["username"] = False;
        redirect('');
    }
}

function set_login()
{
    $ci = &get_instance();
    $ci->load->model('user_m');
    $id = $ci->session->userdata('userid');

    $ci->user_m->set_login($id);
}

function set_logout()
{
    $ci = &get_instance();
    $ci->load->model('user_m');
    $id = $ci->session->userdata('userid');

    $ci->user_m->set_logout($id);
}

function check_login()
{
    $ci = &get_instance();
    $ci->load->model('user_m');
    $sql = $ci->user_m->get($ci->session->userdata('userid'))->row();

    if ($sql->status == 1) {
        if ($sql->is_online == 0) {
            echo "<script>
                alert('Maaf, Anda Di Logout oleh sistem, silahkan login kembali');
                window.location = '" . site_url('auth/logout') . "';
            </script>";
        }
    } else {
        echo "<script>
                alert('Maaf, Akun Anda Dinonaktifkan oleh sistem, silahkan hubungi Admin');
                window.location = '" . site_url('auth/logout') . "';
            </script>";
    }
}

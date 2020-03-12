<?php defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_wakaf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_login();
    }

    public function index()
    {
        $this->db->from('tb_riwayat_wakaf');
        $sql = $this->db->get();
        $data['row'] = $sql;
        $this->template->load('template', 'wakaf/riwayat_wakaf', $data);
    }

    public function cetak()
    {
        $this->db->from('tb_riwayat_wakaf');
        $sql = $this->db->get();
        $data['row'] = $sql;
        $this->load->view('wakaf/cetak_riwayat', $data);
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_aset extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_login();
    }

    public function index()
    {
        $this->db->from('tb_riwayat_aset');
        $sql = $this->db->get();
        $data['row'] = $sql;
        $this->template->load('template', 'aset/riwayat_aset', $data);
    }

    public function cetak()
    {
        $this->db->from('tb_riwayat_aset');
        $sql = $this->db->get();
        $data['row'] = $sql;
        $this->load->view('aset/cetak_riwayat', $data);
    }
}

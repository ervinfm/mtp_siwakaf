<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_aset extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_login();
        $this->load->model('asset/rekap_aset_m');
        $this->load->model('ranting_m');
    }

    public function index()
    {
        if ($this->fungsi->user_login()->level == 1) {
            $ins = $this->ranting_m->get_ranting();
            $bar = $this->rekap_aset_m->get_barang();
            $tan = $this->rekap_aset_m->get_tanah();
            $n_bar = $this->rekap_aset_m->get_nilai_barang();
            $n_tan = $this->rekap_aset_m->get_nilai_tanah();
        } else {
            $id = $this->fungsi->user_login()->id_ranting;
            $ins = $this->ranting_m->get_ranting($id);
            $bar = $this->rekap_aset_m->get_barang($id);
            $tan = $this->rekap_aset_m->get_tanah($id);
            $n_bar = $this->rekap_aset_m->get_nilai_barang($id);
            $n_tan = $this->rekap_aset_m->get_nilai_tanah($id);
        }

        $data = array(
            'page' => 'list',
            'ranting' => $ins,
            'aset_barang' => $bar,
            'aset_tanah' => $tan,
            'n_barang' => $n_bar,
            'n_tanah' => $n_tan
        );
        $this->template->load('template', 'aset/rekap_aset', $data);
    }
}

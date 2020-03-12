<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_wakaf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_login();
        $this->load->model('wakaf/rekap_wakaf_m');
        $this->load->model('ranting_m');
    }

    public function index()
    {
        if ($this->fungsi->user_login()->level == 1) {
            $ins = $this->ranting_m->get_ranting();

            $bar = $this->rekap_wakaf_m->get_barang();
            $tan = $this->rekap_wakaf_m->get_tanah();
            $uang = $this->rekap_wakaf_m->get_uang();

            $n_bar = $this->rekap_wakaf_m->get_nilai_barang();
            $n_tan = $this->rekap_wakaf_m->get_nilai_tanah();
            $n_uang = $this->rekap_wakaf_m->get_nilai_uang();
        } else {
            $id = $this->fungsi->user_login()->id_ranting;
            $ins = $this->ranting_m->get_ranting($id);

            $bar = $this->rekap_wakaf_m->get_barang($id);
            $tan = $this->rekap_wakaf_m->get_tanah($id);
            $uang = $this->rekap_wakaf_m->get_uang($id);

            $n_bar = $this->rekap_wakaf_m->get_nilai_barang($id);
            $n_tan = $this->rekap_wakaf_m->get_nilai_tanah($id);
            $n_uang = $this->rekap_wakaf_m->get_nilai_uang($id);
        }

        $data = array(
            'page' => 'list',
            'ranting' => $ins,
            'wakaf_barang' => $bar,
            'wakaf_tanah' => $tan,
            'wakaf_uang' => $uang,
            'n_barang' => $n_bar,
            'n_tanah' => $n_tan,
            'n_uang' => $n_uang
        );
        $this->template->load('template', 'wakaf/rekap_wakaf', $data);
    }
}

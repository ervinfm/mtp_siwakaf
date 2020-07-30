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
        $this->db->join('tb_ranting', 'tb_riwayat_wakaf.id_ranting = tb_ranting.id_ranting');
        $this->db->where('tb_ranting.id_ranting', $this->session->userdata('id_ranting'));
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

    public function del()
    {
        if ($_POST['id'] != null) {
            foreach ($_POST['id'] as $id) {
                $this->db->where('id_riwayat_aset', $id);
                $this->db->delete('tb_riwayat_wakaf');
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data Riwayat Wakaf Berhasil dihapus ");
            } else {
                $this->session->set_flashdata('error', " Data Riwayat Wakaf Gagal di hapus ");
            }
        } else {
            $this->session->set_flashdata('error', " Tidak ada data Riwayat Wakaf yang dipilih ");
        }
        return redirect('wakaf/riwayat_wakaf');
    }
}

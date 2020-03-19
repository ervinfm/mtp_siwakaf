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
        $this->db->join('tb_ranting', 'tb_riwayat_aset.id_ranting = tb_ranting.id_ranting');
        $this->db->where('tb_ranting.id_ranting', $this->session->userdata('id_ranting'));
        $sql = $this->db->get();
        $data['row'] = $sql;
        $this->template->load('template', 'aset/riwayat_aset', $data);
    }

    public function cetak()
    {
        $this->db->from('tb_riwayat_aset');
        $this->db->join('tb_ranting', 'tb_riwayat_aset.id_ranting = tb_ranting.id_ranting');
        $this->db->where('tb_ranting.id_ranting', $this->session->userdata('id_ranting'));
        $sql = $this->db->get();
        if($sql->num_rows() > 0){
            $data['row'] = $sql;
            $this->load->view('aset/cetak_riwayat', $data);
        }else{
            $this->session->set_flashdata('error', " Tidak ada data yang dicetak ! ");
            redirect('asset/riwayat_aset');
        }
    }

    public function del()
    {
        if ($_POST['id'] != null) {
            foreach ($_POST['id'] as $id) {
                $this->db->where('id_riwayat_aset', $id);
                $this->db->delete('tb_riwayat_aset');
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('succes', " Data berhasil di hapus ");
            } else {
                $this->session->set_flashdata('error', " Data gagal di hapus ");
            }
        } else {
            $this->session->set_flashdata('error', " Tidak ada data yang dipilih ");
        }
        return redirect('asset/riwayat_aset');
    }
}

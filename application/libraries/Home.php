<?php

class Home
{

    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        $model = array('admin_m', 'ranting_m', 'wakaf/wakaf_barang_m', 'wakaf/wakaf_tanah_m', 'wakaf/wakaf_uang_m',                 'asset/aset_barang_m', 'asset/aset_tanah_m');
        $this->ci->load->model($model);
    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function getAD()
    {
        $data = $this->ci->admin_m->get()->num_rows();
        return $data;
    }

    function getRN()
    {
        $data = $this->ci->ranting_m->get_ranting()->num_rows();
        return $data;
    }

    function getWakaf_barang()
    {
        $data = $this->ci->wakaf_barang_m->get_view()->num_rows();
        return $data;
    }

    function getWakaf_tanah()
    {
        $data = $this->ci->wakaf_tanah_m->get_view()->num_rows();
        return $data;
    }

    function getWakaf_uang()
    {
        $data = $this->ci->wakaf_uang_m->get_view()->num_rows();
        return $data;
    }

    function getaset_barang()
    {
        $data = $this->ci->aset_barang_m->get_view()->num_rows();
        return $data;
    }

    function getaset_tanah()
    {
        $data = $this->ci->aset_tanah_m->get_view()->num_rows();
        return $data;
    }

    function getAset()
    {
        $id = $this->user_login()->id_ranting;
        $aset1 = $this->ci->aset_barang_m->get_view($id)->num_rows();
        $aset2 = $this->ci->aset_tanah_m->get_view($id)->num_rows();
        return $data = $aset1 + $aset2;
    }

    function getWakaf()
    {
        $id = $this->user_login()->id_ranting;
        $wakaf1 = $this->ci->wakaf_barang_m->get_view($id)->num_rows();
        $wakaf2 = $this->ci->wakaf_tanah_m->get_view($id)->num_rows();
        $wakaf3 = $this->ci->wakaf_uang_m->get_view($id)->num_rows();
        return $data = $wakaf1 + $wakaf2 + $wakaf3;
    }

    function get_count_aset()
    {
        $sql_barang = $this->ci->db->get('tb_aset_barang');
        $temp_barang = 0;
        foreach ($sql_barang->result() as $key => $barang) {
            $temp_barang += ($barang->harga_aset * $barang->jumlah_aset);
        }

        $sql_tanah = $this->ci->db->get('tb_aset_tanah');
        $temp_tanah = 0;
        foreach ($sql_tanah->result() as $key => $tanah) {
            $temp_tanah += $tanah->harga_tanah;
        }

        return $temp_barang + $temp_tanah;
    }

    function get_count_wakaf()
    {
        $sql_barang = $this->ci->db->get('tb_wakaf_barang');
        $temp_barang = 0;
        foreach ($sql_barang->result() as $key => $barang) {
            $temp_barang += ($barang->nilai_barang * $barang->jumlah_barang);
        }

        $sql_tanah = $this->ci->db->get('tb_wakaf_tanah');
        $temp_tanah = 0;
        foreach ($sql_tanah->result() as $key => $tanah) {
            $temp_tanah += $tanah->harga_tanah;
        }

        $sql_uang = $this->ci->db->get('tb_wakaf_uang');
        $temp_uang = 0;
        foreach ($sql_uang->result() as $key => $uang) {
            $temp_uang += $uang->nilai_wakaf;
        }

        return $temp_barang + $temp_tanah + $temp_uang;
    }

    // ==================== Area Chart ===========================

    function get_ranting()
    {
        $sql = $this->ci->ranting_m->get();
        return $sql;
    }

    function get_count_assets()
    {
        $this->ci->db->select('count(tb_aset_barang.id_aset_barang) as value');
        $this->ci->db->from('tb_aset_barang');
        $this->ci->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_aset_barang.id_ranting');
        $this->ci->db->group_by('tb_ranting.id_ranting');
        return $this->ci->db->get();
    }
}

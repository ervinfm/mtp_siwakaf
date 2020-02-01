<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_wakaf_m extends CI_Model { 

    public function get_barang($id = null)
    {
        $this->db->select('tb_wakaf_barang.id_ranting as id, count(tb_wakaf_barang.id_ranting) as jumlah_barang');
        $this->db->from('tb_ranting');
        $this->db->join('tb_wakaf_barang','tb_wakaf_barang.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }else{
            $this->db->group_by('tb_ranting.id_ranting');
        }
        $query = $this->db->get();
        return $query; 
    } 

    public function get_tanah($id = null)
    {
        $this->db->select('tb_wakaf_tanah.id_ranting as id, count(tb_wakaf_tanah.id_wakaf_tanah) as jumlah_tanah');
        $this->db->from('tb_ranting');
        $this->db->join('tb_wakaf_tanah','tb_wakaf_tanah.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }else{
            $this->db->group_by('tb_ranting.id_ranting');
        }
        $query = $this->db->get();
        return $query; 
    } 

    public function get_uang($id = null)
    {
        $this->db->select('tb_wakaf_uang.id_ranting as id, count(tb_wakaf_uang.id_wakaf_uang) as jumlah_uang');
        $this->db->from('tb_ranting');
        $this->db->join('tb_wakaf_uang','tb_wakaf_uang.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }else{
            $this->db->group_by('tb_ranting.id_ranting');
        }
        $query = $this->db->get();
        return $query; 
    } 

    public function get_nilai_barang($id = null)
    {
        $this->db->select('tb_wakaf_barang.id_ranting as id, nilai_barang as n_barang');
        $this->db->from('tb_ranting');
        $this->db->join('tb_wakaf_barang','tb_wakaf_barang.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }
        $query = $this->db->get();
        return $query; 
    } 

    public function get_nilai_tanah($id = null)
    {
        $this->db->select('tb_wakaf_tanah.id_ranting as id, tb_wakaf_tanah.harga_tanah as n_tanah');
        $this->db->from('tb_ranting');
        $this->db->join('tb_wakaf_tanah','tb_wakaf_tanah.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }
        $query = $this->db->get();
        return $query; 
    } 

    public function get_nilai_uang($id = null)
    {
        $this->db->select('tb_wakaf_uang.id_ranting as id, tb_wakaf_uang.nilai_wakaf as n_uang');
        $this->db->from('tb_ranting');
        $this->db->join('tb_wakaf_uang','tb_wakaf_uang.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }
        $query = $this->db->get();
        return $query; 
    } 

}

?>
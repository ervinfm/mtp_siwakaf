<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_aset_m extends CI_Model { 

    public function get_barang($id = null)
    {
        $this->db->select('tb_aset_barang.id_ranting as id, count(tb_aset_barang.id_ranting) as jumlah_barang');
        $this->db->from('tb_ranting');
        $this->db->join('tb_aset_barang','tb_aset_barang.id_ranting = tb_ranting.id_ranting');
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
        $this->db->select('tb_aset_tanah.id_ranting as id, count(tb_aset_tanah.id_aset_tanah) as jumlah_tanah');
        $this->db->from('tb_ranting');
        $this->db->join('tb_aset_tanah','tb_aset_tanah.id_ranting = tb_ranting.id_ranting');
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
        $this->db->select('tb_aset_barang.id_ranting as id, harga_aset as n_barang');
        $this->db->from('tb_ranting');
        $this->db->join('tb_aset_barang','tb_aset_barang.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }
        $query = $this->db->get();
        return $query; 
    } 

    public function get_nilai_tanah($id = null)
    {
        $this->db->select('tb_aset_tanah.id_ranting as id, tb_aset_tanah.harga_tanah as n_tanah');
        $this->db->from('tb_ranting');
        $this->db->join('tb_aset_tanah','tb_aset_tanah.id_ranting = tb_ranting.id_ranting');
        if($id !=null){
            $this->db->where('tb_ranting.id_ranting', $id); 
        }
        $query = $this->db->get();
        return $query; 
    } 

}

?>
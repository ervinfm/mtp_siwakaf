<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kehartabendaan_m extends CI_Model {
    
    public function get_aset_barang($post)
    {
        $this->db->from('tb_aset_barang');
        $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_aset_barang.id_ranting');
        if(@$post['filter_tgl']){
            $this->db->where('tb_aset_barang.tgl_masuk_aset >=', @$post['date_start']);
            $this->db->where('tb_aset_barang.tgl_masuk_aset <=', @$post['date_finish']);
        }
        $this->db->or_where_in('tb_aset_barang.id_ranting', $post['id']);
        
        $query = $this->db->get();
        return $query; 
    }

    public function get_aset_tanah($post)
    {
        $this->db->from('tb_aset_tanah');
        $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_aset_tanah.id_ranting');
        if(@$post['filter_tgl']){
            $this->db->where('tb_aset_tanah.tgl_masuk_tanah >=', @$post['date_start']);
            $this->db->where('tb_aset_tanah.tgl_masuk_tanah <=', @$post['date_finish']);
        }

        $this->db->or_where_in('tb_aset_tanah.id_ranting', $post['id']);
        $query = $this->db->get();
        return $query; 
    }


    public function get_ranting($id = null)
    {
     $this->db->from('tb_ranting');
     if($id !=null){
          $this->db->where('id_ranting', $id); 
     }
     $query = $this->db->get();
     return $query; 
    }

}
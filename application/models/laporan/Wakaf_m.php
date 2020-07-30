<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wakaf_m extends CI_Model {
    
    public function get_wakaf_barang($post)
    {
        $this->db->from('tb_wakaf_barang');
        $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_barang.id_ranting');
        if(@$post['filter_tgl']){
            $this->db->where('tb_wakaf_barang.tgl_wakaf >=', @$post['date_start']);
            $this->db->where('tb_wakaf_barang.tgl_wakaf <=', @$post['date_finish']);
        }

        $this->db->or_where_in('tb_wakaf_barang.id_ranting', $post['id']);
        
        $query = $this->db->get();
        return $query; 
    }

    public function get_wakaf_tanah($post)
    {
        $this->db->from('tb_wakaf_tanah');
        $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_tanah.id_ranting');
        if(@$post['filter_tgl']){
            $this->db->where('tb_wakaf_tanah.tgl_wakaf >=', @$post['date_start']);
            $this->db->where('tb_wakaf_tanah.tgl_wakaf <=', @$post['date_finish']);
        }

        $this->db->or_where_in('tb_wakaf_tanah.id_ranting', $post['id']);
        $query = $this->db->get();
        return $query; 
    }

    public function get_wakaf_uang($post)
    {
        $this->db->from('tb_wakaf_uang');
        $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_uang.id_ranting');
        if(@$post['filter_tgl']){
            $this->db->where('tb_wakaf_uang.tgl_wakaf >=', @$post['date_start']);
            $this->db->where('tb_wakaf_uang.tgl_wakaf <=', @$post['date_finish']);
        }

        if ($this->session->userdata('level') != 1) {
            $this->db->where('tb_wakaf_uang.id_ranting', $this->session->userdata('userid'));
        }else{
            $this->db->or_where_in('tb_wakaf_uang.id_ranting', $post['id']);
        }
        $this->db->or_where_in('tb_wakaf_uang.id_ranting', $post['id']);
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
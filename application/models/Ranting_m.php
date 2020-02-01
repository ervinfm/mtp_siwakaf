<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ranting_m extends CI_Model {
    
    public function get($id = null)
    {
         $this->db->from('tb_ranting');
         $this->db->join('tb_admin', 'tb_ranting.id_ranting = tb_admin.id_ranting');
         if($id !=null){
              $this->db->where('tb_ranting.id_ranting', $id); 
         }
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

    public function add($post)
    {   
          $this->load->helper('string');
          $kode = $this->fungsi->kode_random();
          $params = [
               'id_ranting' => "ranting-".random_string('sha1'),
               'kode_ranting' => $kode,
               'nama_ranting' => $post['nama'],
               'pimpinan' => $post['pimpinan'],
               'alamat_ranting' => $post['alamat'],
               'telp_ranting' =>$post['telp'] 
          ];
        $this->db->insert('tb_ranting',$params);
    }

    public function edit($post)
    {
          $params = [
               'nama_ranting' => $post['nama'],
               'pimpinan' => $post['pimpinan'],
               'alamat_ranting' => $post['alamat'],
               'telp_ranting' =>$post['telp']
        ];
        $this->db->where('id_ranting', $post['id']);
        $this->db->update('tb_ranting', $params);
    }

    public function del($id)
     {
          $this->db->where('id_ranting', $id);
          $query = $this->db->delete('tb_ranting');
          return $query;
     }

     public function get_kode($kode)
     {
          $this->db->from('tb_ranting');
          $this->db->where('kode_ranting',$kode);
          $query = $this->db->get();
          return $query; 
     }

}
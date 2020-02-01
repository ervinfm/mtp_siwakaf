<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
    
    public function get($id = null)
    {
         $this->db->from('tb_admin');
         $this->db->join('tb_ranting','tb_ranting.id_ranting = tb_admin.id_ranting');
         if($id != null){
              $this->db->where('tb_admin.id_admin', $id); 
         }
         $query = $this->db->get();
         return $query; 
    } 

    public function add($post)
    {   
          $this->load->helper('string');
          $params = [
               'id_admin' => "admin-".random_string('sha1'),
               'id_ranting' => $post['ranting'],
               'nama_admin' => $post['nama'],
               'username' => $post['nama'],
               'password' => sha1($post['nama']),
               'alamat' => $post['alamat'],
               'telp' => $post['telp'],
               'level' => $post['level'] == null ? 2 : $post['level'] ,
               'status' => '0'
          ];
        $this->db->insert('tb_admin',$params);
    }

    public function edit($post)
    {
          $params = [
               'id_ranting' => $post['ranting'],
               'nama_admin' => $post['nama'],
               'alamat' => $post['alamat'],
               'telp' => $post['telp'],
               'level' => $post['level'],
               'username' => $post['u_name']
               
          ];
          if ($post['u_pass'] != null) {
               $params['password'] = sha1($post['u_pass']);
          }
         
        $this->db->where('id_admin', $post['id']);
        $this->db->update('tb_admin', $params);
    }

    public function del($id)
     {
          $this->db->where('id_admin', $id);
          $query = $this->db->delete('tb_admin');
          return $query;
     }

     public function status($id,$stt)
     {
          $params = [
               'status' => $stt
          ];
          $this->db->where('id_admin', $id);
          $this->db->update('tb_admin', $params);
     }

     public function profil($post)
     {
          $params['nama_admin'] = $post['a_nama'];
          $params['alamat'] = $post['a_alamat'];
          $params['telp'] = $post['a_telp'];
          $params['username'] = $post['a_user'];
          if(!empty($post['a_pass'])){
                $params['password'] = sha1($post['a_pass']);
          }
         
          $this->db->where('id_admin', $post['id']);
          $this->db->update('tb_admin', $params);
     }

}
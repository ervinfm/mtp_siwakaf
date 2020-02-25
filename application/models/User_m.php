<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

     public function login($post)
     {
          $this->db->select('*');
          $this->db->from('tb_admin');
          $this->db->where('username', $post['username']);
          $this->db->where('password', sha1($post['password']));
          $query = $this->db->get();
          return $query;
     }

     public function is_online($id, $value)
     {
          $params['is_online'] = $value;
          $this->db->where('id_admin', $id);
          $this->db->update('tb_admin', $params);
     }

     public function get($id = null)
     {
          $this->db->select('*');
          $this->db->from('tb_admin');
          $this->db->join('tb_ranting', 'tb_ranting.id_ranting= tb_admin.id_ranting', 'inner');
          if ($id != null) {
               $this->db->where('tb_admin.id_admin', $id);
          }
          $query = $this->db->get();
          return $query;
     }

     public function add_register($post)
     {
          $this->load->helper('string');
          $params = [
               'id_admin' => "admin-" . random_string('sha1'),
               'username' => $post['username'],
               'password' => $post['password'],
               'id_ranting' => $post['id_ranting'],
               'nama_admin' => $post['nama_admin'],
               'level' => $post['level'],
               'alamat' => $post['alamat'],
               'telp' => $post['telp'],
               'status' => '0'
          ];
          $this->db->insert('tb_admin', $params);
     }


     public function set_login($id)
     {
          $params['id_admin'] = $id;
          $this->db->insert('tb_admin_login', $params);
     }

     public function set_logout($id)
     {
          $params = [
               'time_logout' => date('Y-m-d H:i:s')
          ];
          $this->db->where('id_admin', $id);
          $this->db->update('tb_admin_login', $params);
     }
}

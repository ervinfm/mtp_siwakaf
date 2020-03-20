<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wakaf_uang_m extends CI_Model {

    public function get_view($id = null)
    {
         $this->db->from('tb_wakaf_uang');
         $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_uang.id_ranting', 'inner');
         if($id !=null){
              $this->db->where('tb_ranting.id_ranting', $id); 
         }
         $this->db->order_by('tb_ranting.nama_ranting', 'ASC');
         $query = $this->db->get();
         return $query; 
    }

    public function get($id = null)
    {
         $this->db->from('tb_wakaf_uang');
         $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_uang.id_ranting');
         if($id !=null){
              $this->db->where('tb_wakaf_uang.id_wakaf_uang', $id); 
         }
         $query = $this->db->get();
         return $query; 
    }

    public function add($post)
    {
          $this->load->helper('string');
          $params = [
               'id_wakaf_uang' => "WU-".random_string('sha1'),
               'id_ranting' => $post['ranting_b'],
               'nama_wakif' => $post['wakif_w'],
               'nama_mauquf' => $post['mauquf_w'],
               'nilai_wakaf' => $post['nilai_w'],
               'tujuan_wakaf' => $post['tujuan_w'],
               'tgl_wakaf' => $post['tgl_w'],
               'keterangan' => $post['ket_w']
          ];
          if ($post['doc_w'] != null) {
               $params['doc_wakaf_uang'] = $post['doc_w'];
          }
     $this->db->insert('tb_wakaf_uang',$params);
    }

    public function edit($post)
    {
          $params = [
               'id_ranting' => $post['ranting_b'],
               'nama_wakif' => $post['wakif_w'],
               'nama_mauquf' => $post['mauquf_w'],
               'nilai_wakaf' => $post['nilai_w'],
               'tujuan_wakaf' => $post['tujuan_w'],
               'tgl_wakaf' => $post['tgl_w'],
               'doc_wakaf_uang' => $post['doc_w'],
               'keterangan' => $post['ket_w'],
               'updated_wakaf_uang' => date('Y-m-d')
          ];

          $this->db->where('id_wakaf_uang', $post['id']);
          $this->db->update('tb_wakaf_uang', $params);
    }

     public function del($id)
     {
          $this->db->where('id_wakaf_uang', $id);
          $query = $this->db->delete('tb_wakaf_uang');
          return $query;
     }

     public function set_riwayat($params)
     {
          $this->db->insert('tb_riwayat_wakaf', $params);
     }


    

}
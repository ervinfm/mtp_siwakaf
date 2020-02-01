<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wakaf_barang_m extends CI_Model {

    public function get_view($id = null)
    {
         $this->db->from('tb_wakaf_barang');
         $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_barang.id_ranting', 'inner');
         if($id !=null){
              $this->db->where('tb_ranting.id_ranting', $id); 
         }
         $this->db->order_by('tb_ranting.nama_ranting', 'ASC');
         $query = $this->db->get();
         return $query; 
    }

    public function get($id = null)
    {
         $this->db->from('tb_wakaf_barang');
         $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_barang.id_ranting');
         if($id !=null){
              $this->db->where('tb_wakaf_barang.id_wakaf_barang', $id); 
         }
         $query = $this->db->get();
         return $query; 
    }

    public function add($post)
    {
          $this->load->helper('string');
          $params = [
               'id_wakaf_barang' => "WB-".random_string('sha1'),
               'id_ranting' => $post['ranting_b'],
               'wakif' => $post['wakif_w'],
               'mauquf' => $post['mauquf_w'],
               'nama_barang' => $post['barang_w'],
               'jenis_barang' => $post['jenis_w'],
               'nilai_barang' => $post['nilai_w'],
               'jumlah_barang' => $post['jumlah_w'],
               'tgl_wakaf' => $post['tgl_w'],
               'doc_wakaf_barang' => $post['doc_w'],
               'keterangan' => $post['ket_w']
               
          ];
     $this->db->insert('tb_wakaf_barang',$params);
    }

    public function edit($post)
    {
          $params = [
               'id_ranting' => $post['ranting_b'],
               'wakif' => $post['wakif_w'],
               'mauquf' => $post['mauquf_w'],
               'nama_barang' => $post['barang_w'],
               'jenis_barang' => $post['jenis_w'],
               'nilai_barang' => $post['nilai_w'],
               'jumlah_barang' => $post['jumlah_w'],
               'tgl_wakaf' => $post['tgl_w'],
               'doc_wakaf_barang' => $post['doc_w'],
               'keterangan' => $post['ket_w'],
               'updated_wakaf_barang' => date('Y-m-d')
          ];

          $this->db->where('id_wakaf_barang', $post['id']);
          $this->db->update('tb_wakaf_barang', $params);
    }

    public function del($id)
     {
          $this->db->where('id_wakaf_barang', $id);
          $query = $this->db->delete('tb_wakaf_barang');
          return $query;
     }


    

}
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Aset_barang_m extends CI_Model
{

     public function get_view($id = null)
     {
          $this->db->from('tb_aset_barang');
          $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_aset_barang.id_ranting', 'inner');
          if ($id != null) {
               $this->db->where('tb_ranting.id_ranting', $id);
          }
          $this->db->order_by('tb_ranting.nama_ranting', 'ASC');
          $query = $this->db->get();
          return $query;
     }

     public function get($id = null)
     {
          $this->db->from('tb_aset_barang');
          $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_aset_barang.id_ranting');
          if ($id != null) {
               $this->db->where('tb_aset_barang.id_aset_barang', $id);
          }
          $query = $this->db->get();
          return $query;
     }

     public function add($post)
     {
          $this->load->helper('string');
          $params = [
               'id_aset_barang' => "AB-" . random_string('sha1'),
               'id_ranting' => $post['ranting_b'],
               'nama_aset' => $post['nama_b'],
               'jenis_aset' => $post['jenis_b'],
               'kondisi_aset' => $post['kondisi_b'],
               'harga_aset' => $post['harga_b'],
               'jumlah_aset' => $post['jumlah_b'],
               'keterangan' => $post['ket_b'],
               'gambar_aset' => $post['image'],
               'tgl_masuk_aset' => $post['tgl_b']
          ];
          $this->db->insert('tb_aset_barang', $params);
     }

     public function edit($post)
     {
          $params = [
               'id_ranting' => $post['ranting_b'],
               'nama_aset' => $post['nama_b'],
               'jenis_aset' => $post['jenis_b'],
               'kondisi_aset' => $post['kondisi_b'],
               'harga_aset' => $post['harga_b'],
               'jumlah_aset' => $post['jumlah_b'],
               'keterangan' => $post['ket_b'],
               'tgl_masuk_aset' => $post['tgl_b'],
               'gambar_aset' => $post['image'],
               'updated_aset_barang' => date('Y-m-d')
          ];

          $this->db->where('id_aset_barang', $post['id']);
          $this->db->update('tb_aset_barang', $params);
     }

     public function del($id)
     {
          $this->db->where('id_aset_barang', $id);
          $query = $this->db->delete('tb_aset_barang');
          return $query;
     }


     public function set_riwayat($params)
     {
          $this->db->insert('tb_riwayat_aset', $params);
     }
}

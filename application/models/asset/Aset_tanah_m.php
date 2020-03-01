<?php defined('BASEPATH') or exit('No direct script access allowed');

class Aset_tanah_m extends CI_Model
{

     public function get_view($id = null)
     {
          $this->db->from('tb_aset_tanah');
          $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_aset_tanah.id_ranting', 'inner');
          if ($id != null) {
               $this->db->where('tb_ranting.id_ranting', $id);
          }
          $this->db->order_by('tb_ranting.nama_ranting', 'ASC');
          $query = $this->db->get();
          return $query;
     }

     public function get($id = null)
     {
          $this->db->from('tb_aset_tanah');
          $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_aset_tanah.id_ranting');
          if ($id != null) {
               $this->db->where('tb_aset_tanah.id_aset_tanah', $id);
          }
          $query = $this->db->get();
          return $query;
     }

     public function add($post)
     {
          $this->load->helper('string');
          $params = [
               'id_aset_tanah' => "AT-" . random_string('sha1'),
               'id_ranting' => $post['ranting_b'],
               'lokasi_tanah' => $post['lokasi_t'],
               'aset_akta_tanah' => $post['akta_t'],
               'luas_tanah' => $post['luas_t'],
               'harga_tanah' => $post['harga_t'],
               'penggunaan_aset' => $post['peng_t'],
               'luas_bangunan' => $post['lbangun_t'],
               'tempat_arsip' => $post['tarsip_t'],
               'keterangan' => $post['ket_t'],
               'tgl_masuk_tanah' => $post['tgl_t'],
               'dokumentasi' => $post['doc_t']
          ];
          $this->db->insert('tb_aset_tanah', $params);
     }

     public function edit($post)
     {
          $params = [
               'id_ranting' => $post['ranting_b'],
               'lokasi_tanah' => $post['lokasi_t'],
               'aset_akta_tanah' => $post['akta_t'],
               'luas_tanah' => $post['luas_t'],
               'harga_tanah' => $post['harga_t'],
               'penggunaan_aset' => $post['peng_t'],
               'luas_bangunan' => $post['lbangun_t'],
               'tempat_arsip' => $post['tarsip_t'],
               'keterangan' => $post['ket_t'],
               'tgl_masuk_tanah' => $post['tgl_t'],
               'dokumentasi' => $post['doc_t'],
               'updated_aset_tanah' => date('Y-m-d')
          ];

          $this->db->where('id_aset_tanah', $post['id']);
          $this->db->update('tb_aset_tanah', $params);
     }

     public function del($id)
     {
          $this->db->where('id_aset_tanah', $id);
          $query = $this->db->delete('tb_aset_tanah');
          return $query;
     }

     public function set_riwayat($params)
     {
          $this->db->insert('tb_riwayat_aset', $params);
     }
}

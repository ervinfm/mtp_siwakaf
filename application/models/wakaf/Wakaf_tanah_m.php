<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wakaf_tanah_m extends CI_Model
{

     public function get_view($id = null)
     {
          $this->db->from('tb_wakaf_tanah');
          $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_tanah.id_ranting', 'inner');
          if ($id != null) {
               $this->db->where('tb_ranting.id_ranting', $id);
          }
          $this->db->order_by('tb_ranting.nama_ranting', 'ASC');
          $query = $this->db->get();
          return $query;
     }

     public function get($id = null)
     {
          $this->db->from('tb_wakaf_tanah');
          $this->db->join('tb_ranting', 'tb_ranting.id_ranting = tb_wakaf_tanah.id_ranting');
          if ($id != null) {
               $this->db->where('tb_wakaf_tanah.id_wakaf_tanah', $id);
          }
          $query = $this->db->get();
          return $query;
     }

     public function add($post)
     {
          $this->load->helper('string');
          $params = [
               'id_wakaf_tanah' => "WU-" . random_string('sha1'),
               'id_ranting' => $post['ranting_b'],
               'no_akta_wakaf' => $post['akta_t'],
               'nama_wakif' => $post['wakif_t'],
               'nama_mauquf' => $post['mauquf_t'],
               'luas_tanah' => $post['luas_t'],
               'status_tanah' => $post['status_t'],
               'luas_bangunan' => $post['lbangun_t'],
               'harga_tanah' => $post['harga_t'],
               'tgl_wakaf' => $post['tgl_t'],
               'penggunaan_tanah' => $post['guna_t'],
               'lokasi_tanah' => $post['lokasi_t'],
               'tempat_arsip' => $post['tempat_t'],
               'keterangan_tanah' => $post['ket_t']
          ];
          if ($post['doc_t'] != null) {
               $params['doc_wakaf_tanah'] = $post['doc_t'];
          }
          $this->db->insert('tb_wakaf_tanah', $params);
     }

     public function edit($post)
     {
          $params = [
               'id_ranting' => $post['ranting_b'],
               'no_akta_wakaf' => $post['akta_t'],
               'nama_wakif' => $post['wakif_t'],
               'nama_mauquf' => $post['mauquf_t'],
               'luas_tanah' => $post['luas_t'],
               'status_tanah' => $post['status_t'],
               'luas_bangunan' => $post['lbangun_t'],
               'harga_tanah' => $post['harga_t'],
               'tgl_wakaf' => $post['tgl_t'],
               'penggunaan_tanah' => $post['guna_t'],
               'lokasi_tanah' => $post['lokasi_t'],
               'tempat_arsip' => $post['tempat_t'],
               'keterangan_tanah' => $post['ket_t'],
               'updated_wakaf_tanah' => date('Y-m-d')
          ];
          if ($post['doc_t'] != null) {
               $params['doc_wakaf_tanah'] = $post['doc_t'];
          }
          $this->db->where('id_wakaf_tanah', $post['id']);
          $this->db->update('tb_wakaf_tanah', $params);
     }

     public function del($id)
     {
          $this->db->where('id_wakaf_tanah', $id);
          $query = $this->db->delete('tb_wakaf_tanah');
          return $query;
     }

     public function set_riwayat($params)
     {
          $this->db->insert('tb_riwayat_wakaf', $params);
     }
}

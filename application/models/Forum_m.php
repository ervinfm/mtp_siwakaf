<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forum_m extends CI_Model
{

    public function get()
    {
        $this->db->from('tb_forum');
        $this->db->join('tb_admin', 'tb_admin.id_admin = tb_forum.id_admin');
        $this->db->join('tb_ranting', 'tb_admin.id_ranting = tb_ranting.id_ranting');
        $this->db->order_by('created_forum', 'DESC');
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'id_admin' => $post['id'],
            'pesan_forum' => $post['pesan'],
        ];
        $this->db->insert('tb_forum', $params);
    }

    public function del($id)
    {
        $this->db->where('id_forum', $id);
        $this->db->delete('tb_forum');
    }

    public function reset()
    {
        $this->db->empty_table('tb_forum');
    }
}

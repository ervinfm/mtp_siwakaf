<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_login();
        $this->load->model('admin_m');
        $this->load->model('forum_m');
    }

    public function index()
    {
        $data = [
            'page' => 'Forum Administrator',
            'row' => $this->forum_m->get()
        ];
        $this->template->load('template', 'forum/index', $data);
    }

    public function add()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['send'])) {
            $this->forum_m->add($post);
            if ($this->db->affected_rows() > 0) {
                redirect('forum');
            } else {
                $this->session->set_flashdata('error', "Pesan " . $post['pesan'] . " Gagal Dikirim ");
                redirect('forum');
            }
        }
    }

    public function del($id)
    {
        $this->forum_m->del($id);
        if ($this->db->affected_rows() > 0) {
            redirect('forum');
        } else {
            redirect('forum');
        }
    }

    public function reset()
    {
        $this->forum_m->reset();
        redirect('forum');
    }
}

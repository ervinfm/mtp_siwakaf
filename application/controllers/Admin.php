<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('admin_m');
		$this->load->model('ranting_m');
	}

	public function index()
	{
		check_admin();

		$query = $this->admin_m->get();
		$data = array(
			'page' => 'list',
			'row' => $query
		);
		$this->template->load('template', 'admin/admin_list', $data);
	}

	public function add()
	{
		check_admin();

		$admin = new stdClass();
		$admin->id_admin = null;
		$admin->nama_admin = null;
		$admin->alamat = null;
		$admin->telp = null;
		$admin->id_ranting = null;

		$ranting = $this->ranting_m->get_ranting();
		$data = array(
			'page' => 'add',
			'ranting' => $ranting,
			'row' => $admin
		);
		$this->template->load('template', 'admin/admin_form', $data);
	}

	public function edit($id)
	{
		check_admin();
		$query = $this->admin_m->get($id);
		$ranting = $this->ranting_m->get();
		if ($query->num_rows() > 0) {
			$admin = $query->row();
			$data = array(
				'page' => 'edit',
				'ranting' => $ranting,
				'row' => $admin
			);
			$this->template->load('template', 'admin/admin_form', $data);
		} else {
			$this->session->set_flashdata('error', " Data tidak ditemukan");
			redirect('admin');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		check_admin();

		if (isset($_POST['add'])) {
			if ($post != null) {
				$this->admin_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data berhasil Ditambahkan");
					redirect('admin');
				} else {
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('admin/add');
				}
			} else {
				$this->session->set_flashdata('error', " Tidak Ada data yang ditambahkan");
				redirect('admin/add');
			}
		} else if (isset($_POST['edit'])) {
			if ($post != null) {
				$this->admin_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data berhasil di perbaharui ");
					redirect('admin');
				} else {
					$this->session->set_flashdata('error', " Data Gagal di perbaharui");
					redirect('admin/edit');
				}
			} else {
				$this->session->set_flashdata('error', " Tidak Ada data yang ditambahkan");
				redirect('admin');
			}
		} else if (isset($_POST['edit_admin'])) {
			$this->admin_m->edit_admin($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', "Data berhasil di perbaharui ");
				redirect('admin');
			} else {
				$this->session->set_flashdata('error', "Data Gagal di perbaharui");
				redirect('admin');
			}
		}
	}

	public function del()
	{
		check_admin();
		$post = $this->input->post(null, TRUE);
		$this->admin_m->del($post['id']);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data berhasil di hapus ");
		} else {
			$this->session->set_flashdata('error', " Data gagal di hapus ");
		}
		redirect('admin');
	}

	public function user($id)
	{
		check_admin();
		$query = $this->admin_m->get($id);
		$data = array(
			'page' => 'user_admin',
			'row' => $query->row()
		);

		$this->template->load('template', 'admin/user/user_data', $data);
	}

	public function status($id)
	{
		check_admin();
		$query = $this->admin_m->get($id);
		$row = $query->row();
		if ($row->status == 1) {
			$temp = '0';
		} else {
			$temp = '1';
		}
		$this->admin_m->status($id, $temp);
		redirect('admin');
	}

	public function profil()
	{
		$post = $this->input->post(null, TRUE);
		if ($post != null) {
			if ($post['a_pass'] == null) {
				$post['a_pass'] = null;
			}
			$this->admin_m->profil($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', " Data berhasil di Perbaharui ");
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', " Tidak Ada Data yang Diperbaharui ");
				redirect('dashboard');
			}
		} else {
			$this->session->set_flashdata('error', " Tidak Ada Data yang Diperbaharui ");
			redirect('dashboard');
		}
	}

	public function get_log_login($id)
	{
		$this->db->from('tb_admin_login');
		$this->db->join('tb_admin', 'tb_admin.id_admin = tb_admin_login.id_admin');
		$this->db->join('tb_ranting', 'tb_admin.id_ranting = tb_ranting.id_ranting');
		$this->db->where('tb_admin_login.id_admin', $id);
		$this->db->order_by('tb_admin_login.time_login', 'ASC');
		$sql = $this->db->get();

		if ($sql->num_rows() > 1000) {
			$this->db->empty_table('tb_admin_login');
		}
		$data['row'] = $sql;
		$this->template->load('template', 'admin/admin_log_login', $data);
	}
}

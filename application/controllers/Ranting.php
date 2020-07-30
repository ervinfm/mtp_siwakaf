<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ranting extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		check_login();
		$this->load->model('ranting_m');
		$this->load->model('user_m');
	}

	public function index()
	{
		$query = $this->ranting_m->get_ranting();
		$data = array(
			'page' => 'list',
			'row' => $query
		);
		$this->template->load('template', 'ranting/ranting_list', $data);
	}

	public function add()
	{
		$ranting = new stdClass();
		$ranting->id_ranting = null;
		$ranting->nama_ranting = null;
		$ranting->pimpinan = null;
		$ranting->alamat_ranting = null;
		$ranting->telp_ranting = null;
		$ranting->email_ranting = null;
		$data = array(
			'page' => 'add',
			'row' => $ranting
		);
		$this->template->load('template', 'ranting/ranting_form', $data);
	}

	public function edit($id)
	{
		$query = $this->ranting_m->get_ranting($id);
		if ($query->num_rows() > 0) {
			$ranting = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $ranting
			);
			$this->template->load('template', 'ranting/ranting_form', $data);
		} else {
			$this->session->set_flashdata('error', " Data Instansi yang dipilih tidak ditemukan");
			redirect('ranting');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['add'])) {
			$this->ranting_m->add($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', "Data Instansi yang baru Berhasil ditambahkan");
				redirect('ranting');
			} else {
				$this->session->set_flashdata('error', "Data Instansi yang baru Gagal ditambahkan");
				redirect('ranting/add');
			}
		} else if (isset($_POST['edit'])) {
			$this->ranting_m->edit($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', "Data Instansi yang dipilih Berhasil diperbaharui ");
				redirect('ranting');
			} else {
				$this->session->set_flashdata('error', "Data Instansi yang dipilih Gagal diperbaharui");
				redirect('ranting/edit');
			}
		} else if (isset($_POST['edit_admin'])) {
			$this->ranting_m->edit_admin($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', "Data Admin Instansi yang dipilih Berhasil diperbaharui ");
				redirect('ranting');
			} else {
				$this->session->set_flashdata('error', "Data Admin Instansi yang dipilih Gagal diperbaharui");
				redirect('ranting');
			}
		}
	}

	public function del()
	{
		$post = $this->input->post(null, TRUE);
		$this->ranting_m->del($post['id']);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', "Data Instansi yang dipilih Berhasil dihapus ");
		} else {
			$this->session->set_flashdata('error', "Data Instansi yang dipilih Gagal dihapus ");
		}
		redirect('ranting');
	}

	public function info($id)
	{
		$query = $this->ranting_m->admin($id);
		$data = array(
			'ranting' => $query
		);
		$this->template->load('template', 'ranting/ranting_detail', $data);
	}

	public function edit_admin($id)
	{
		$query = $this->ranting_m->admin($id);
		if ($query->num_rows() > 0) {
			$admin = $query->row();
			$data = array(
				'page' => 'edit_admin',
				'row' => $admin
			);
			$this->template->load('template', 'ranting/ranting_admin_form', $data);
		} else {
			$this->session->set_flashdata('error', " Data Admin Instansi yang dipilih tidak ditemukan");
			redirect('ranting');
		}
	}
}

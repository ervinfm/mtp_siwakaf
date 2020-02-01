<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_barang extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('asset/aset_barang_m');
		$this->load->model('ranting_m');
	}

	public function index()
	{	
		if($this->fungsi->user_login()->level == 1){
			$query = $this->aset_barang_m->get_view();
		}else {
			$id = $this->fungsi->user_login()->id_ranting;
			$query = $this->aset_barang_m->get_view($id);
		}
		
		$data = array(
			'page' => 'list',
			'row' => $query
		);
		$this->template->load('template','aset/aset_barang/aset_barang_data', $data);
	}

	public function add_aset()
	{
		$query = $this->ranting_m->get_ranting();

		$data = new stdClass();
		$data->id_aset_barang = null;
		$data->id_ranting = null;
		$data->nama_aset = null;
		$data->jenis_aset = null;
		$data->harga_aset = null;
		$data->kondisi_aset = null;
		$data->jumlah_aset = null;
		$data->keterangan = null;
		$data->tgl_masuk_aset = null;
		$data->gambar_aset = null;

		$temp = array(
			'page' => 'add',
			'ranting' => $query,
			'row' => $data
		);$data;

		$this->template->load('template','aset/aset_barang/aset_barang_form',$temp);
	}

	public function edit_aset($id)
	{
		$sql = $this->aset_barang_m->get($id);
		$query = $this->ranting_m->get_ranting();

		$data = array(
			'page' => 'edit',
			'lock' => 'readonly',
			'ranting' => $query,
			'row' => $sql->row()
		);

		if($sql->num_rows() < 1){
			$this->session->set_flashdata('warning', " Data tidak ditemukan");
			redirect('asset/aset_barang');
		}

		$this->template->load('template','aset/aset_barang/aset_barang_form',$data);
	}

	public function proses()
	{	
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if($post['ranting_b'] == null){
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/aset_barang/';
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['max_size']       = 2048;
			$config['file_name']       = 'aset_barang-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){
				$post['image'] = $this->upload->data('file_name');
				$this->aset_barang_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data berhasil Ditambahkan");
					redirect('asset/aset_barang');
				}else{
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('asset/aset_barang/add_aset');
				}
			}else{
				$this->aset_barang_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('warning', " Data berhasil Ditambahkan Namun Gambar Dokumentasi tidak di masukkan");
					redirect('asset/aset_barang');
				}else{
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('asset/aset_barang/add_aset');
				}
			}

		}else if(isset($_POST['edit'])){
			if($post['ranting_b'] == null){
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/aset_barang/';
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['max_size']       = 2048;
			$config['file_name']       = 'aset_barang-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);
			$gambar = $this->upload->do_upload('image');
			if($gambar == true){
				$aset = $this->aset_barang_m->get($_POST['id'])->row();
				if($aset->gambar_aset != null){
					$target_file = './uploads/aset_barang/'.$aset->gambar_aset;
					unlink($target_file); 
					$post['image'] = $this->upload->data('file_name');
				}else if($aset->gambar_aset == null){
					$post['image'] = $this->upload->data('file_name');
				}
			}else{
				$aset = $this->aset_barang_m->get($_POST['id'])->row();
				$post['image'] = $aset->gambar_aset;
			}
			$this->aset_barang_m->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', " Data berhasil Diperbaharui");
				redirect('asset/aset_barang');
			}else{
				$this->session->set_flashdata('error', " Data Gagal Diperbaharui");
				redirect('asset/aset_barang/edit_aset');
			}
		}else{
			$this->session->set_flashdata('warning', " System Error");
			redirect('asset/aset_barang');
		}
	}
 
	public function del($id)
	{	
		$aset = $this->aset_barang_m->get($id)->row();
		if($aset->gambar_aset != null){
			$target_file = './uploads/aset_barang/'.$aset->gambar_aset;
			unlink($target_file); 
			
		}
		$this->aset_barang_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data berhasil di hapus ");
		}else{
			$this->session->set_flashdata('error', " Data gagal di hapus ");
		}
		redirect('asset/aset_barang');

	}


	
}

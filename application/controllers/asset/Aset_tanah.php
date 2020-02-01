<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_tanah extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('asset/aset_tanah_m');
		$this->load->model('ranting_m');
    }

    public function index()
	{	
		if($this->fungsi->user_login()->level == 1){
			$query = $this->aset_tanah_m->get_view();
		}else {
			$id = $this->fungsi->user_login()->id_ranting;
			$query = $this->aset_tanah_m->get_view($id);
		}
		
		$data = array(
			'page' => 'list',
			'row' => $query
		);
		$this->template->load('template','aset/aset_tanah/aset_tanah_data', $data);
	}

	public function edit_tanah($id)
	{
		$sql = $this->aset_tanah_m->get($id);
		$query = $this->ranting_m->get_ranting();

		$data = array(
			'page' => 'edit',
			'lock' => 'readonly',
			'ranting' => $query,
			'row' => $sql->row()
		);

		if($sql->num_rows() < 1){
			$this->session->set_flashdata('warning', " Data tidak ditemukan");
			redirect('asset/aset_tanah');
		}

		$this->template->load('template','aset/aset_tanah/aset_tanah_form',$data);
	}
	
	public function add_tanah()
	{
		$query = $this->ranting_m->get_ranting();

		$data = new stdClass();
		$data->id_aset_tanah = null;
		$data->id_ranting = null;
		$data->lokasi_tanah = null;
		$data->aset_akta_tanah = null;
		$data->luas_tanah = null;
		$data->harga_tanah = null;
		$data->penggunaan_aset = null;
		$data->luas_bangunan = null;
		$data->tempat_arsip = null;
		$data->keterangan = null;
		$data->tgl_masuk_tanah = null;

		$temp = array(
			'page' => 'add',
			'ranting' => $query,
			'row' => $data
		);$data;

		$this->template->load('template','aset/aset_tanah/aset_tanah_form',$temp);
	}
	
	public function proses()
	{	
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if($post['ranting_b'] == null){
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/aset_tanah/';
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['max_size']       = 2048;
			$config['file_name']       = 'aset_tanah-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);

			if($this->upload->do_upload('doc_t')){
				$post['doc_t'] = $this->upload->data('file_name');
				$this->aset_tanah_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data berhasil Ditambahkan");
					redirect('asset/aset_tanah');
				}else{
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('asset/aset_tanah/add_tanah');
				}
			}else{
				$this->aset_tanah_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('warning', " Data berhasil Ditambahkan Namun Gambar Dokumentasi tidak di masukkan");
					redirect('asset/aset_tanah');
				}else{
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('asset/aset_tanah/add_tanah');
				}
			}

		}else if(isset($_POST['edit'])){
			if($post['ranting_b'] == null){
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/aset_tanah/';
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['max_size']       = 2048;
			$config['file_name']       = 'aset_tanah-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);
			$gambar = $this->upload->do_upload('doc_t');
			if($gambar == true){
				$aset = $this->aset_tanah_m->get($_POST['id'])->row();
				if($aset->dokumentasi != null){
					$target_file = './uploads/aset_tanah/'.$aset->dokumentasi;
					unlink($target_file); 
					$post['doc_t'] = $this->upload->data('file_name');
				}else if($aset->dokumentasi == null){
					$post['doc_t'] = $this->upload->data('file_name');
				}
			}else{
				$aset = $this->aset_tanah_m->get($_POST['id'])->row();
				$post['doc_t'] = $aset->dokumentasi;
			}
			$this->aset_tanah_m->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', " Data berhasil Diperbaharui");
				redirect('asset/aset_tanah');
			}else{
				$this->session->set_flashdata('error', " Data Gagal Diperbaharui");
				redirect('asset/aset_tanah/edit_aset');
			}
		}else{
			$this->session->set_flashdata('warning', " System Error");
			redirect('asset/aset_tanah');
		}
	}
 
	public function del($id)
	{	
		$aset = $this->aset_tanah_m->get($id)->row();
		if($aset->dokumentai != null){
			$target_file = './uploads/aset_tanah/'.$aset->dokumentai;
			unlink($target_file); 
			
		}
		$this->aset_tanah_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data berhasil di hapus ");
		}else{
			$this->session->set_flashdata('error', " Data gagal di hapus ");
		}
		redirect('asset/aset_tanah');

	}
}
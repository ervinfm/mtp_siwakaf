<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Wakaf_tanah extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('wakaf/wakaf_tanah_m');
		$this->load->model('ranting_m'); 
	}

	public function index()
	{	
		if($this->fungsi->user_login()->level == 1){
			$query = $this->wakaf_tanah_m->get_view();
		}else {
			$id = $this->fungsi->user_login()->id_ranting;
			$query = $this->wakaf_tanah_m->get_view($id);
		}
		
		$data = array(
			'page' => 'data',
			'row' => $query
		);
		$this->template->load('template','wakaf/wakaf_tanah/wakaf_tanah_data', $data);
	}

	public function add()
	{
		$query = $this->ranting_m->get_ranting();

		$data = new stdClass();
		$data->id_wakaf_tanah = null;
		$data->id_ranting = null;
		$data->no_akta_wakaf = null;
		$data->nama_wakif = null;
		$data->nama_mauquf = null;
        $data->lokasi_tanah = null;
		$data->luas_tanah = null;
		$data->status_tanah = null;
		$data->harga_tanah = null;
		$data->penggunaan_tanah = null;
		$data->luas_bangunan = null;
		$data->tempat_arsip = null;
		$data->tgl_wakaf = null;
		$data->doc_wakaf_tanah = null;
		$data->keterangan_tanah = null;

		$temp = array(
			'page' => 'add',
			'ranting' => $query,
			'row' => $data
		);$data;

		$this->template->load('template','wakaf/wakaf_tanah/wakaf_tanah_form',$temp);
	}

	public function edit($id)
	{
		$sql = $this->wakaf_tanah_m->get($id);
		$query = $this->ranting_m->get_ranting();

		$data = array(
			'page' => 'edit',
			'lock' => 'readonly',
			'ranting' => $query,
			'row' => $sql->row()
		);

		if($sql->num_rows() < 1){
			$this->session->set_flashdata('warning', " Data tidak ditemukan");
			redirect('wakaf/wakaf_tanah');
		}

		$this->template->load('template','wakaf/wakaf_tanah/wakaf_tanah_form',$data);
	}

	public function proses()
	{	
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if($post['ranting_b'] == null){
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/wakaf_tanah/';
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['max_size']       = 2048;
			$config['file_name']       = 'wakaf_tanah-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);
			if($this->upload->do_upload('doc_t')){
				$post['doc_t'] = $this->upload->data('file_name');
				$this->wakaf_tanah_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data berhasil Ditambahkan");
					redirect('wakaf/wakaf_tanah');
				}else{
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('wakaf/wakaf_tanah/add_tanah');
				}
			}else{
				$this->wakaf_tanah_m->add($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('warning', " Data berhasil Ditambahkan Namun Gambar Dokumentasi tidak di masukkan");
					redirect('wakaf/wakaf_tanah');
				}else{
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('wakaf/wakaf_tanah/add_tanah');
				}
			}

		}else if(isset($_POST['edit'])){
			if($post['ranting_b'] == null){
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}
			$config['upload_path']    = './uploads/wakaf_tanah/';
			$config['allowed_types']  = 'gif|jpg|png|jpeg';
			$config['max_size']       = 2048;
			$config['file_name']       = 'wakaf_tanah-'.date('ymd').'-'.substr(md5(rand()),0,10);
			$this->load->library('upload', $config);
			$gambar = $this->upload->do_upload('doc_t');
			if($gambar == true){
				$wakaf = $this->wakaf_tanah_m->get($_POST['id'])->row();
				if($wakaf->doc_wakaf_tanah != null){
					$target_file = './uploads/wakaf_tanah/'.$wakaf->doc_wakaf_tanah;
					unlink($target_file); 
					$post['doc_t'] = $this->upload->data('file_name');
				}else if($wakaf->doc_wakaf_tanah == null){
					$post['doc_t'] = $this->upload->data('file_name');
				}
			}else{
				$wakaf = $this->wakaf_tanah_m->get($_POST['id'])->row();
				$post['doc_t'] = $wakaf->doc_wakaf_tanah;
			}
			$this->wakaf_tanah_m->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', " Data berhasil Diperbaharui");
				redirect('wakaf/wakaf_tanah');
			}else{
				$this->session->set_flashdata('error', " Data Gagal Diperbaharui");
				redirect('wakaf/wakaf_tanah/edit_tanah');
			}
		}else{
			$this->session->set_flashdata('warning', " System Error");
			redirect('wakaf/wakaf_tanah');
		}
	}

	public function del($id)
	{	
		$wakaf = $this->wakaf_tanah_m->get($id)->row();
		if($wakaf->doc_wakaf_tanah != null){
			$target_file = './uploads/wakaf_tanah/'.$wakaf->doc_wakaf_tanah;
			unlink($target_file); 
		}
		$this->wakaf_tanah_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data berhasil di hapus ");
		}else{
			$this->session->set_flashdata('error', " Data gagal di hapus ");
		}
		redirect('wakaf/wakaf_tanah');

	}

	


	
}

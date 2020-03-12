<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wakaf_barang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_login();
		$this->load->model('wakaf/wakaf_barang_m');
		$this->load->model('ranting_m');
	}

	public function index()
	{
		if ($this->fungsi->user_login()->level == 1) {
			$query = $this->wakaf_barang_m->get_view();
		} else {
			$id = $this->fungsi->user_login()->id_ranting;
			$query = $this->wakaf_barang_m->get_view($id);
		}

		$data = array(
			'page' => 'data',
			'row' => $query
		);
		$this->template->load('template', 'wakaf/wakaf_barang/wakaf_barang_data', $data);
	}

	public function add()
	{
		$query = $this->ranting_m->get_ranting();

		$data = new stdClass();
		$data->id_wakaf_barang = null;
		$data->id_ranting = null;
		$data->wakif = null;
		$data->mauquf = null;
		$data->nama_barang = null;
		$data->jenis_barang = null;
		$data->nilai_barang = null;
		$data->jumlah_barang = null;
		$data->tgl_wakaf = null;
		$data->doc_wakaf_barang = null;
		$data->keterangan = null;

		$temp = array(
			'page' => 'add',
			'ranting' => $query,
			'row' => $data
		);
		$data;

		$this->template->load('template', 'wakaf/wakaf_barang/wakaf_barang_form', $temp);
	}

	public function edit($id)
	{
		$sql = $this->wakaf_barang_m->get($id);
		$query = $this->ranting_m->get_ranting();

		$data = array(
			'page' => 'edit',
			'lock' => 'readonly',
			'ranting' => $query,
			'row' => $sql->row()
		);

		if ($sql->num_rows() < 1) {
			$this->session->set_flashdata('warning', " Data tidak ditemukan");
			redirect('wakaf/wakaf_barang');
		}

		$this->template->load('template', 'wakaf/wakaf_barang/wakaf_barang_form', $data);
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if ($post['ranting_b'] == null) {
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/wakaf_barang/';
			$config['allowed_types']  = 'jpg|png|jpeg|pdf|doc|docx|xlsx';
			$config['max_size']       = 10000;
			$config['file_name']       = 'wakaf_barang-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('doc_w')) {
				$post['doc_w'] = $this->upload->data('file_name');
				$this->wakaf_barang_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data berhasil Ditambahkan");
					redirect('wakaf/wakaf_barang');
				} else {
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('wakaf/wakaf_barang/add_aset');
				}
			} else {
				$this->wakaf_barang_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('warning', " Data berhasil Ditambahkan Namun Gambar Dokumentasi tidak di masukkan");
					redirect('wakaf/wakaf_barang');
				} else {
					$this->session->set_flashdata('error', " Data Gagal Ditambahkan");
					redirect('wakaf/wakaf_barang/add_aset');
				}
			}
		} else if (isset($_POST['edit'])) {
			if ($post['ranting_b'] == null) {
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/wakaf_barang/';
			$config['allowed_types']  = 'jpg|png|jpeg|pdf|doc|docx|xlsx';
			$config['max_size']       = 10000;
			$config['file_name']       = 'wakaf_barang-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);
			$gambar = $this->upload->do_upload('doc_w');
			if ($gambar == true) {
				$wakaf = $this->wakaf_barang_m->get($_POST['id'])->row();
				if ($wakaf->doc_wakaf_barang != null) {
					$target_file = './uploads/wakaf_barang/' . $wakaf->doc_wakaf_barang;
					unlink($target_file);
					$post['doc_w'] = $this->upload->data('file_name');
				} else if ($wakaf->doc_wakaf_barang == null) {
					$post['doc_w'] = $this->upload->data('file_name');
				}
			} else {
				$wakaf = $this->wakaf_barang_m->get($_POST['id'])->row();
				$post['doc_w'] = $wakaf->doc_wakaf_barang;
			}
			$this->wakaf_barang_m->edit($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', " Data berhasil Diperbaharui");
				redirect('wakaf/wakaf_barang');
			} else {
				$this->session->set_flashdata('error', " Data Gagal Diperbaharui");
				redirect('wakaf/wakaf_barang/edit_aset');
			}
		} else {
			$this->session->set_flashdata('warning', " System Error");
			redirect('wakaf/wakaf_barang');
		}
	}

	public function del($id)
	{
		$wakaf = $this->wakaf_barang_m->get($id)->row();
		if ($wakaf->doc_wakaf_barang != null) {
			$target_file = './uploads/wakaf_barang/' . $wakaf->doc_wakaf_barang;
			unlink($target_file);
		}
		$this->wakaf_barang_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data berhasil di hapus ");
		} else {
			$this->session->set_flashdata('error', " Data gagal di hapus ");
		}
		redirect('wakaf/wakaf_barang');
	}

	function generate_qrCode()
	{
		$post = $this->input->post(null, TRUE);

		$id = $post['id'];
		$name = $post['nama'];
		$instansi = $post['instansi'];
		$value = $id . ' - ' . $name . ' - ' . $instansi;

		$qrCode = new Endroid\QrCode\QrCode($value);

		header('Content-Type: ' . $qrCode->getContentType());
		$qrCode->writeFile('uploads/wakaf_barang/qrCode/' . $id . '.png');
		redirect('wakaf/wakaf_barang');
	}

	public function riwayat($id)
	{
		$aset = $this->wakaf_barang_m->get($id)->row();

		$params = [
			'id_riwayat_aset' => 'wakaf-' . substr(md5(rand()), 0, 10),
			'instansi' => $aset->nama_ranting,
			'nama_aset' => $aset->nama_barang,
			'harga_aset' => $aset->nilai_barang,
			'jumlah_aset' => $aset->jumlah_barang . ' Unit',
			'wakif' => $aset->wakif,
			'mauquf' => $aset->mauquf,
			'tgl_masuk_aset' => $aset->created_wakaf_barang,
			'jenis_aset' => 'Barang'
		];

		$this->wakaf_barang_m->set_riwayat($params);
		if ($this->db->affected_rows() > 0) {
			if ($aset->doc_wakaf_barang != null) {
				$target_file = './uploads/wakaf_barang/' . $aset->doc_wakaf_barang;
				unlink($target_file);
			}
			$this->wakaf_barang_m->del($id);
			$this->session->set_flashdata('succes', " Data berhasil di Riwayatkan ");
		} else {
			$this->session->set_flashdata('error', " Data gagal di Riwayatkan ");
		}
		redirect('wakaf/wakaf_barang');
	}
}

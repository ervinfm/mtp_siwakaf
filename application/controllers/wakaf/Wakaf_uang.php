<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wakaf_uang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_login();
		$this->load->model('wakaf/wakaf_uang_m');
		$this->load->model('ranting_m');
	}

	public function index()
	{
		if ($this->fungsi->user_login()->level == 1) {
			$query = $this->wakaf_uang_m->get_view();
		} else {
			$id = $this->fungsi->user_login()->id_ranting;
			$query = $this->wakaf_uang_m->get_view($id);
		}

		$data = array(
			'page' => 'data',
			'row' => $query
		);
		$this->template->load('template', 'wakaf/wakaf_uang/wakaf_uang_data', $data);
	}

	public function add()
	{
		$query = $this->ranting_m->get_ranting();

		$data = new stdClass();
		$data->id_wakaf_uang = null;
		$data->id_ranting = null;
		$data->nama_wakif = null;
		$data->nama_mauquf = null;
		$data->nilai_wakaf = null;
		$data->tujuan_wakaf = null;
		$data->tgl_wakaf = null;
		$data->doc_wakaf_uang = null;
		$data->keterangan = null;

		$temp = array(
			'page' => 'add',
			'ranting' => $query,
			'row' => $data
		);
		$data;

		$this->template->load('template', 'wakaf/wakaf_uang/wakaf_uang_form', $temp);
	}

	public function edit($id)
	{
		$sql = $this->wakaf_uang_m->get($id);
		$query = $this->ranting_m->get_ranting();

		$data = array(
			'page' => 'edit',
			'lock' => 'readonly',
			'ranting' => $query,
			'row' => $sql->row()
		);

		if ($sql->num_rows() < 1) {
			$this->session->set_flashdata('warning', " Data Wakaf Uang yang dipilih tidak ditemukan");
			redirect('wakaf/wakaf_uang');
		}

		$this->template->load('template', 'wakaf/wakaf_uang/wakaf_uang_form', $data);
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if ($post['ranting_b'] == null) {
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}

			$config['upload_path']    = './uploads/wakaf_uang/';
			$config['allowed_types']  = 'jpg|png|jpeg|pdf|doc|docx|xlsx';
			$config['max_size']       = 10000;
			$config['file_name']       = 'wakaf_uang-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('doc_w')) {
				$post['doc_w'] = $this->upload->data('file_name');
				$this->wakaf_uang_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('succes', " Data Wakaf Uang baru Berhasil ditambahkan");
					redirect('wakaf/wakaf_uang');
				} else {
					$this->session->set_flashdata('error', " Data Wakaf Uang baru Gagal ditambahkan");
					redirect('wakaf/wakaf_uang/add_uang');
				}
			} else {
				$this->wakaf_uang_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('warning', " Data Wakaf Uang baru Berhasil ditambahkan namun Berita Acara tidak ada");
					redirect('wakaf/wakaf_uang');
				} else {
					$this->session->set_flashdata('error', " Data Wakaf Uang baru Gagal Ditambahkan");
					redirect('wakaf/wakaf_uang/add_uang');
				}
			}
		} else if (isset($_POST['edit'])) {
			if ($post['ranting_b'] == null) {
				$post['ranting_b'] = $this->fungsi->user_login()->id_ranting;
			}
			$config['upload_path']    = './uploads/wakaf_uang/';
			$config['allowed_types']  = 'jpg|png|jpeg|pdf|doc|docx|xlsx';
			$config['max_size']       = 10000;
			$config['file_name']       = 'wakaf_uang-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);
			$gambar = $this->upload->do_upload('doc_w');
			if ($gambar == true) {
				$wakaf = $this->wakaf_uang_m->get($_POST['id'])->row();
				if ($wakaf->doc_wakaf_uang != null) {
					$target_file = './uploads/wakaf_uang/' . $wakaf->doc_wakaf_uang;
					unlink($target_file);
					$post['doc_w'] = $this->upload->data('file_name');
				} else if ($wakaf->doc_wakaf_uang == null) {
					$post['doc_w'] = $this->upload->data('file_name');
				}
			} else {
				$wakaf = $this->wakaf_uang_m->get($_POST['id'])->row();
				$post['doc_w'] = $wakaf->doc_wakaf_uang;
			}
			$this->wakaf_uang_m->edit($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', " Data Wakaf Uang yang dipilih Berhasil diperbaharui");
				redirect('wakaf/wakaf_uang');
			} else {
				$this->session->set_flashdata('error', " Data Wakaf Uang yang dipilih Gagal diperbaharui");
				redirect('wakaf/wakaf_uang/edit_uang');
			}
		} else {
			$this->session->set_flashdata('warning', " System Error");
			redirect('wakaf/wakaf_uang');
		}
	}

	public function del($id)
	{
		$wakaf = $this->wakaf_uang_m->get($id)->row();
		if ($wakaf->doc_wakaf_uang != null) {
			$target_file = './uploads/wakaf_uang/' . $wakaf->doc_wakaf_uang;
			unlink($target_file);
		}
		$this->wakaf_uang_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('succes', " Data Wakaf Uang yang dipilih Berhasil dihapus ");
		} else {
			$this->session->set_flashdata('error', " Data Wakaf Uang yang dipilih Gagal dihapus ");
		}
		redirect('wakaf/wakaf_uang');
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
		$qrCode->writeFile('uploads/wakaf_uang/qrCode/' . $id . '.png');
		redirect('wakaf/wakaf_uang');
	}

	public function riwayat($id)
	{
		$aset = $this->wakaf_uang_m->get($id)->row();

		$params = [
			'id_riwayat_aset' => 'wakaf-' . substr(md5(rand()), 0, 10),
			'instansi' => $aset->nama_ranting,
			'nama_aset' => 'Wakaf Uang ' . $aset->tujuan_wakaf,
			'harga_aset' => $aset->nilai_wakaf,
			'jumlah_aset' => '-',
			'wakif' => $aset->nama_wakif,
			'mauquf' => $aset->nama_mauquf,
			'tgl_masuk_aset' => $aset->tgl_wakaf,
			'jenis_aset' => 'Uang'
		];

		$this->wakaf_uang_m->set_riwayat($params);

		if ($this->db->affected_rows() > 0) {
			if ($aset->doc_wakaf_uang != null) {
				$target_file = './uploads/wakaf_uang/' . $aset->doc_wakaf_tuang;
				unlink($target_file);
			}
			$this->wakaf_uang_m->del($id);
			$this->session->set_flashdata('succes', " Data Wakaf Uang yang dipilih Berhasil diriwayatkan ");
		} else {
			$this->session->set_flashdata('error', " Data Wakaf Uang yang dipilih Gagal diriwayatkan ");
		}
		redirect('wakaf/wakaf_uang');
	}
}

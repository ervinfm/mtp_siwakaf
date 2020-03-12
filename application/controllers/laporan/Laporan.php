<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_login();
		$loader = array(
			'ranting_m', 'asset/aset_barang_m', 'asset/aset_tanah_m', 'wakaf/wakaf_barang_m',
			'wakaf/wakaf_tanah_m', 'wakaf/wakaf_uang_m'
		);
		$this->load->model($loader);
	}

	public function index()
	{
		$sql = $this->ranting_m->get_ranting();
		if (@$_GET['cat'] == 1) {
			$category = 'Kehartabendaan Barang';
			$link = 'laporan_aset_barang';
		} else if (@$_GET['cat'] == 2) {
			$category = 'Kehartabendaan Tanah';
			$link = 'laporan_aset_tanah';
		} else if (@$_GET['cat'] == 3) {
			$category = 'Wakaf Barang';
			$link = 'laporan_wakaf_barang';
		} else if (@$_GET['cat'] == 4) {
			$category = 'Wakaf Uang';
			$link = 'laporan_wakaf_uang';
		} else if (@$_GET['cat'] == 5) {
			$category = 'Wakaf Tanah';
			$link = 'laporan_wakaf_tanah';
		} else {
			$category = ' (Tidak ada yang Dipilih)';
		}
		$data = array(
			'page' => @$category,
			'link' => $link,
			'row' => $sql
		);

		$this->template->load('template', 'laporan/laporan_1/laporan_page', $data);
	}

	public function laporan_aset_barang()
	{
		$id = @$_GET['id'];
		$type = @$_GET['cat'];

		if ($id != null) {
			$aset = $this->aset_barang_m->get_view($id);
			$ranting = $this->ranting_m->get_ranting($id);
		} else {
			$aset = $this->aset_barang_m->get_view();
			$ranting = $this->ranting_m->get_ranting();
		}

		if ($type == 'view') {
			$print = 'active';
		} else {
			$print = 'deactive';
		}

		$data = array(
			'page' => 'Laporan Data Kehartabendaan Barang',
			'promise_print' => $print,
			'instansi'  => $ranting,
			'row' => $aset
		);
		$this->load->view('laporan/laporan_1/laporan_aset_barang', $data);
	}

	public function laporan_aset_tanah()
	{
		$id = @$_GET['id'];
		$type = @$_GET['cat'];

		if ($id != null) {
			$aset = $this->aset_tanah_m->get_view($id);
			$ranting = $this->ranting_m->get_ranting($id);
		} else {
			$aset = $this->aset_tanah_m->get_view();
			$ranting = $this->ranting_m->get_ranting();
		}

		if ($type == 'view') {
			$print = 'active';
		} else {
			$print = 'deactive';
		}

		$data = array(
			'page' => 'Laporan Data Kehartabendaan Tanah',
			'promise_print' => $print,
			'instansi'  => $ranting,
			'row' => $aset
		);
		$this->load->view('laporan/laporan_1/laporan_aset_tanah', $data);
	}

	public function laporan_wakaf_barang()
	{
		$id = @$_GET['id'];
		$type = @$_GET['cat'];

		if ($id != null) {
			$aset = $this->wakaf_barang_m->get_view($id);
			$ranting = $this->ranting_m->get_ranting($id);
		} else {
			$aset = $this->wakaf_barang_m->get_view();
			$ranting = $this->ranting_m->get_ranting();
		}

		if ($type == 'view') {
			$print = 'active';
		} else {
			$print = 'deactive';
		}

		$data = array(
			'page' => 'Laporan Data Wakaf Barang',
			'promise_print' => $print,
			'instansi'  => $ranting,
			'row' => $aset
		);
		$this->load->view('laporan/laporan_1/laporan_wakaf_barang', $data);
	}

	public function laporan_wakaf_uang()
	{
		$id = @$_GET['id'];
		$type = @$_GET['cat'];

		if ($id != null) {
			$aset = $this->wakaf_uang_m->get_view($id);
			$ranting = $this->ranting_m->get_ranting($id);
		} else {
			$aset = $this->wakaf_uang_m->get_view();
			$ranting = $this->ranting_m->get_ranting();
		}

		if ($type == 'view') {
			$print = 'active';
		} else {
			$print = 'deactive';
		}

		$data = array(
			'page' => 'Laporan Data Wakaf Uang',
			'promise_print' => $print,
			'instansi'  => $ranting,
			'row' => $aset
		);
		$this->load->view('laporan/laporan_1/laporan_wakaf_uang', $data);
	}

	public function laporan_wakaf_tanah()
	{
		$id = @$_GET['id'];
		$type = @$_GET['cat'];

		if ($id != null) {
			$aset = $this->wakaf_tanah_m->get_view($id);
			$ranting = $this->ranting_m->get_ranting($id);
		} else {
			$aset = $this->wakaf_tanah_m->get_view();
			$ranting = $this->ranting_m->get_ranting();
		}

		if ($type == 'view') {
			$print = 'active';
		} else {
			$print = 'deactive';
		}

		$data = array(
			'page' => 'Laporan Data Wakaf Tanah',
			'promise_print' => $print,
			'instansi'  => $ranting,
			'row' => $aset
		);
		$this->load->view('laporan/laporan_1/laporan_wakaf_tanah', $data);
	}
}

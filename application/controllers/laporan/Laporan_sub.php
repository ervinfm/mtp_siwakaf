<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_sub extends CI_Controller
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

	public function laporan_aset()
	{
		$id = $this->fungsi->user_login()->id_ranting;

		if ($id != null) {
			$aset = $this->aset_barang_m->get_view($id);
			$aset2 = $this->aset_tanah_m->get_view($id);
			$ranting = $this->ranting_m->get_ranting($id);
		}

		$data = array(
			'page' => 'Laporan Data Kehartabendaan',
			'instansi'  => $ranting,
			'row1' => $aset,
			'row2' => $aset2
		);
		$this->load->view('laporan/laporan_2/laporan_kehartabendaan', $data);
	}

	public function laporan_wakaf()
	{
		$id = $this->fungsi->user_login()->id_ranting;

		if ($id != null) {
			$aset = $this->wakaf_barang_m->get_view($id);
			$aset2 = $this->wakaf_tanah_m->get_view($id);
			$aset3 = $this->wakaf_uang_m->get_view($id);
			$ranting = $this->ranting_m->get_ranting($id);
		}

		$data = array(
			'page' => 'Laporan Data Wakaf',
			'instansi'  => $ranting,
			'row1' => $aset,
			'row2' => $aset2,
			'row3' => $aset3
		);
		$this->load->view('laporan/laporan_2/laporan_wakaf', $data);
	}
}

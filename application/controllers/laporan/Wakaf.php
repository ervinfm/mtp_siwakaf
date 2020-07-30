<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wakaf extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_login();
		$loader = array(
			'ranting_m', 'laporan/wakaf_m'
		);
		$this->load->model($loader);
		$this->load->library('pdf');
	}

	public function index()
	{
		$sql = $this->ranting_m->get_ranting();

		$category = 'Laporan Pengelolaan Wakaf';
		$cat = 'wakaf';
		$data = array(
			'page' => $category,
			'ranting' => $sql,
			'cat' => $cat
		);

		$this->template->load('template', 'laporan/index', $data);
    }
    
    public function preview()
	{
		$post = $this->input->post(null, TRUE);
		if($post['jenis'] == 'wakaf'){
			if($post['id'] == null && $post['cat'] == null){
				$this->session->set_flashdata('id','Instansi Harus dipilih ... !');
				$this->session->set_flashdata('cat','Jenis Laporan Harus dipilih ... !');
				redirect('laporan/wakaf');
			}else if($post['id'] == null){
				$this->session->set_flashdata('id','Instansi Harus dipilih ... !');
				redirect('laporan/wakaf');
			}else if( $post['cat'] == null){
				$this->session->set_flashdata('cat','Jenis Laporan Harus dipilih ... !');
				redirect('laporan/wakaf');
			}else{
				foreach ($post['cat'] as $key => $jenis_aset) {
					if($post['cat'][$key] == 'wb'){
						$data['row_wb'] = $this->wakaf_m->get_wakaf_barang($post);
					}else if($post['cat'][$key] == 'wt') {
						$data['row_wt'] = $this->wakaf_m->get_wakaf_tanah($post);
					}else if($post['cat'][$key] == 'wu'){
						$data['row_wu'] = $this->wakaf_m->get_wakaf_uang($post);
					}
				} 

				$this->load->view('laporan/wakaf', $data);
			}
		}else{
			redirect('laporan/wakaf');
		}
	}

}
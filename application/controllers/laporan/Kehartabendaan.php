<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kehartabendaan extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_login();
		$loader = array(
			'laporan/kehartabendaan_m','ranting_m'
		);
		$this->load->model($loader);
		$this->load->library('pdf');
	}

	public function index()
	{
		$sql = $this->ranting_m->get_ranting();

		$category = 'Laporan Kehartabendaan';
		$cat = 'aset';
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
		if ($post['jenis'] == 'aset') {
			if($post['id'] == null && $post['cat'] == null){
				$this->session->set_flashdata('id','Instansi Harus dipilih ... !');
				$this->session->set_flashdata('cat','Jenis Laporan Harus dipilih ... !');
				redirect('laporan/kehartabendaan');
			}else if($post['id'] == null){
				$this->session->set_flashdata('id','Instansi Harus dipilih ... !');
				redirect('laporan/kehartabendaan');
			}else if( $post['cat'] == null){
				$this->session->set_flashdata('cat','Jenis Laporan Harus dipilih ... !');
				redirect('laporan/kehartabendaan');
			}else{

				foreach ($post['cat'] as $key => $jenis_aset) {
					if($post['cat'][$key] == 'ab'){
						$data['row_ab'] = $this->kehartabendaan_m->get_aset_barang($post);
					}else if($post['cat'][$key] == 'at') {
						$data['row_at'] = $this->kehartabendaan_m->get_aset_tanah($post);
					}
				} 

				$this->load->view('laporan/kehartabendaan', $data);
			}
		}else{
			redirect('laporan/kehartabendaan');
		}
	}

	function create_pdf()
	{
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DAFTAR ',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(100,6,'Nama Barang',1,0,'C');
        $pdf->Cell(35,6,'Harga',1,0,'C');
        $pdf->Cell(15,6,'Stok',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $barang = $this->db->get('barang')->result();
        $no=0;
        foreach ($barang as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(100,6,$data->nama_barang,1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->harga, 0, ".", "."),1,0);
            $pdf->Cell(15,6,$data->stok,1,1);
            $no++;
        }
        $pdf->Output();
	}

}

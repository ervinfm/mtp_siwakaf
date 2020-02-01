<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_aset extends CI_Controller {
	
	function __construct(){
		parent::__construct();
        check_not_login();
        $this->load->model('asset/rekap_aset_m');
        $this->load->model('ranting_m');
    } 

    public function index()
	{	
        if($this->fungsi->user_login()->level == 1){
            $ins = $this->ranting_m->get_ranting();
            $bar = $this->rekap_aset_m->get_barang();
            $tan = $this->rekap_aset_m->get_tanah();
            $n_bar = $this->rekap_aset_m->get_nilai_barang();
            $n_tan = $this->rekap_aset_m->get_nilai_tanah();
		}else {
            $id = $this->fungsi->user_login()->id_ranting;
            $ins = $this->ranting_m->get_ranting($id);
            $bar = $this->rekap_aset_m->get_barang($id);
            $tan = $this->rekap_aset_m->get_tanah($id);
            $n_bar = $this->rekap_aset_m->get_nilai_barang($id);
            $n_tan = $this->rekap_aset_m->get_nilai_tanah($id);
		}
        
		$data = array(
            'page' => 'list',
            'ranting' => $ins,
            'aset_barang' => $bar,
            'aset_tanah' => $tan,
            'n_barang' => $n_bar,
            'n_tanah' => $n_tan
		);
		$this->template->load('template','aset/rekap_aset', $data);
    }

    function pdf(){
		$pro = $this->profil_m->get();
		$profil = $pro->row();
		$sekolah = $profil->nama_sekolah;

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,$sekolah,0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DAFTAR SELURUH SISWA',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(32,6,'NISN',1,0);
        $pdf->Cell(45,6,'Nama Siswa',1,0);
        $pdf->Cell(27,6,'Tanggal Lahir',1,0);
		$pdf->Cell(22,6,'gender',1,0);
		$pdf->Cell(36,6,'Alamat',1,0);
		$pdf->Cell(23,6,'Kelas',1,0);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(10,7,'',0,1);
		$siswa = $this->siswa_m->get()->result();
		$no = 0;
        foreach ($siswa as $row){
			$no++;
            $pdf->Cell(32,6,$row->nisn,1,0);
			$pdf->Cell(45,6,$row->nama_siswa,1,0);
			$pdf->Cell(27,6,$row->tgl_lahir,1,0);
			$pdf->Cell(22,6,$row->gender == 'L' ? 'Pria' : 'Wanita',1,0);
			$pdf->Cell(36,6,$row->alamat,1,0);
			$pdf->Cell(23,6,$row->nama_kelas,1,0);
			$pdf->Cell(10,7,'',0,1);
		}
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(190,7,'Jumlah Siswa : '.$no,0,1);
		
		$tgl = $this->fungsi->tgl();
        $pdf->Output(null,"Data Siswa, Salinan Tanggal - ".$tgl." ".$sekolah.".pdf");
    }
    
}
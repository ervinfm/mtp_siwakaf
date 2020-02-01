<html lang="en">
<head>
    <title><?=$page?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?=site_url()?>assets/css/bootstrap.css"/>
</head>
<body >
    <div class="col-lg-12">
        <table border="0" align="center" style="width: 800px; border: none; margin-top: 20px;">
            <tr >
                <td style="width: 140px">
                    <img src="<?=site_url()?>assets/images/muh.png" style="width: 80px; height: 80px; margin-left : 30px">
                </td>
                <td colspan="2" style="width:800px">
                    <center style="margin-top: 2px">
                        <h3><?=$page?></h3>
                        <h3><?=$this->fungsi->user_login()->nama_ranting?></h3>
                        <h4><?=$this->fungsi->user_login()->alamat_ranting?></h4>
                        </div>
                    </center><br/>
                </td>
            </tr>            
        </table>
        <center>    
            <div style="border-style:inset; width: 60%; border-bottom-width:0px"></div>
        </center>
        <!-- Isi Laporan -->
        <center>
            <div class="col-lg-8" style="margin-top: 20px">
                <h4>Wakaf Barang</h4>
                <table class="table table-bordered" style="margin-bottom: 50px">
                        <thead>
                            <tr>
                                <td width="3%">No</td>
                                <td>Nama Barang</td>
                                <td>Nama Wakif</td>
                                <td>Nama Mauquf</td>
                                <td>Jenis Barang</td>
                                <td>Harga Barang</td>
                                <td>Jumlah Barang</td>
                                <td>Tanggal Wakaf</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach ($row1->result() as $key => $data1) { ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$data1->nama_barang?></td>
                                        <td><?=$data1->wakif?></td>
                                        <td><?=$data1->mauquf ?></td>
                                        <td><?=$data1->jenis_barang ?></td>
                                        <td><?=$this->money->rupiah($data1->nilai_barang)?></td>
                                        <td><?=$data1->jumlah_barang?></td>
                                        <td><?=$this->fungsi->tgl_indo($data1->tgl_wakaf)?></td>
                                    </tr>
                            <?php  } ?>
                        </tbody>
                </table>
                <h4 style="margin-top : 50px">Wakaf Tanah</h4>
                <table class="table table-bordered" style="margin-bottom: 50px">
                        <thead>
                            <tr>
                                <td width="3%">No</td>
                                <td>Nama Wakif</td>
                                <td>Lokasi Tanah</td>
                                <td>Luas Tanah</td>
                                <td>Status Tanah</td>
                                <td>Penggunaan Tanah</td>
                                <td>Luas Bangunan</td>
                                <td>Lokasi Sertifikat</td>
                                <td>Nilai Tanah</td>
                                <td>Tanggal Wakaf</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach ($row2->result() as $key => $data2) { ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$data2->nama_wakif?></td>
                                        <td><?=$data2->lokasi_tanah?></td>
                                        <td><?=$data2->luas_tanah ?></td>
                                        <td><?=$data2->status_tanah?></td>
                                        <td><?=$data2->penggunaan_tanah?></td>
                                        <td><?=$data2->luas_bangunan?></td>
                                        <td><?=$data2->tempat_arsip?></td>
                                        <td><?=$this->money->rupiah($data2->harga_tanah)?></td>
                                        <td><?=$this->fungsi->tgl_indo($data2->tgl_wakaf)?></td>
                                    </tr>
                            <?php  } ?>
                        </tbody>
                </table>
                <h4 style="margin-top : 50px">Wakaf Uang</h4>
                <table class="table table-bordered" style="margin-bottom: 50px">
                        <thead>
                            <tr>
                                <td width="3%">No</td>
                                <td>Nama Wakif</td>
                                <td>Nama Mauquf</td>
                                <td>Tujuan Wakaf</td>
                                <td>Nilai Wakaf</td>
                                <td>Tanggal Wakaf</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach ($row3->result() as $key => $data3) { ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$data3->nama_wakif?></td>
                                        <td><?=$data3->nama_mauquf?></td>
                                        <td><?=$data3->tujuan_wakaf ?></td>
                                        <td><?=$this->money->rupiah($data3->nilai_wakaf)?></td>
                                        <td><?=$this->fungsi->tgl_indo($data3->tgl_wakaf)?></td>
                                    </tr>
                            <?php  } ?>
                        </tbody>
                </table>
            </div>
        </center>
        <!-- Akhir Isi Laporan -->
        <table align="center" style="width:800px; border:none;margin-top:15px;margin-bottom:20px;">
            <tr>
                <td align="right"><?=$this->fungsi->user_login()->nama_ranting?>, <?=date('d M Y')?></td>
            </tr>
            <tr>
                <td align="right" style="padding-right: 50px">
                    <p>Kepala Instansi</p>
                    <div style="padding-top : 80px">
                    </div>
                </td>
            </tr>    
            <tr>
                <td align="right" style="padding-right : 10px">( <?=$this->fungsi->user_login()->pimpinan?> )</td>
            </tr>
        </table>

      
    </div>
</body>
</html>
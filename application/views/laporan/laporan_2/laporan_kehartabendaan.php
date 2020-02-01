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
                <h4>Kehartabendaan Barang</h4>
                <table class="table table-bordered" style="margin-bottom: 50px">
                        <thead>
                            <tr>
                                <td width="3%">No</td>
                                <td>Nama Barang</td>
                                <td>Jenis Barang</td>
                                <td>Kondisi Barang</td>
                                <td>Harga Barang</td>
                                <td>Jumlah Barang</td>
                                <td>Tanggal Masuk</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach ($row1->result() as $key => $data1) { ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$data1->nama_aset?></td>
                                        <td><?=$data1->jenis_aset?></td>
                                        <td><?=$data1->kondisi_aset == 'A' ? 'Baik' : ($data1->kondisi_aset == 'B' ? 'Rusak Ringan' : 'Rusak Berat') ?></td>
                                        <td><?=$data1->harga_aset?></td>
                                        <td><?=$data1->jumlah_aset?></td>
                                        <td><?=$this->fungsi->tgl_indo($data1->tgl_masuk_aset)?></td>
                                    </tr>
                            <?php  } ?>
                        </tbody>
                </table>
                <h4 style="margin-top : 50px">Kehartabendaan Tanah</h4>
                <table class="table table-bordered" style="margin-bottom: 50px">
                        <thead>
                            <tr>
                                <td width="3%">No</td>
                                <td>No Akta Tanah</td>
                                <td>Luas Tanah </td>
                                <td>Lokasi Tanah</td>
                                <td>Nilai Tanah</td>
                                <td>Penggunaan Aset</td>
                                <td>Luas Bangunan</td>
                                <td>Tempat Arsip</td>
                                <td>Tanggal Masuk</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1; 
                                foreach ($row2->result() as $key => $data2) { ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$data2->aset_akta_tanah?></td>
                                        <td><?=$data2->luas_tanah." M <sup>2</sup>"?></td>
                                        <td><?=$data2->lokasi_tanah?></td>
                                        <td><?=$this->money->rupiah($data2->harga_tanah)?></td>
                                        <td><?=$data2->penggunaan_aset?></td>
                                        <td><?=$data2->luas_bangunan == null ? '-' : $data2->luas_bangunan ?></td>
                                        <td><?=$data2->tempat_arsip?></td>
                                        <td><?=$this->fungsi->tgl_indo($data2->tgl_masuk_tanah)?></td>
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
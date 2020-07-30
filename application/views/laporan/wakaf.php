<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pengelolahan Hartabenda dan Wakaf</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ?>assets/images/muh.png">
    <!-- Bootstrap CSS ============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/bootstrap.min.css">
    <!-- Notika icon CSS ============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/notika-custom-icon.css">
    <!-- wave CSS ============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/wave/button.css">
    <!-- main CSS ============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/main.css">
    <!-- style CSS ============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/style.css">
</head>
<body >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table border="0" align="center" style="width: 800px; border: none; margin-top: 20px;">
                    <tr >
                        <td style="width: 20px;"></td>
                        <td style="width: 80px">
                            <img src="<?=site_url()?>assets/images/muh.png" style="width: 80px; height: 80px; margin-left : 30px">
                        </td>
                        <td colspan="2" style="width:800px">
                            <center style="margin-top: 2px">
                                <h3> <?=strtoupper($this->fungsi->user_login()->nama_ranting)?></h3>
                                <h4> MAJELIS WAKAF DAN KEHARTABENDAAN </h4>
                                <i style="font-size:small"><?=$this->fungsi->user_login()->alamat_ranting?></i>
                                </div>
                            </center><br/>
                        </td>
                    </tr>            
                </table>
                <center>    
                    <div style="border-style:inset; width: 60%; border-bottom-width:0px; margin-bottom:30px"></div>
                </center>
                <!-- Isi Laporan -->
                <span><center><h3> LAPORAN PERWAKAFAN </h3></center></span>
                <div style="margin-top: 40px; margin-left: 150px; margin-right: 200px">
                    <?php if(@$row_wb){ ?>
                        <table class="table" border="1" width="100%">
                        <span><h5><b>A. Daftar Wakaf Barang</b></h5></span>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Wakif</th>
                                    <th>Nama Mauquf</th>
                                    <th>Harga </th>
                                    <th>Jumlah </th>
                                    <th>Tanggal Wakaf</th>
                                    <th>Instansi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($row_wb->result() as $key => $barang) { ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$barang->nama_barang?></td>
                                            <td><?=strtoupper($barang->wakif)?></td>
                                            <td><?=strtoupper($barang->mauquf)?></td>
                                            <td><?=$this->money->rupiah($barang->nilai_barang)?></td>
                                            <td><?=$barang->jumlah_barang.' Unit'?></td>
                                            <td><?=$this->fungsi->tgl($barang->tgl_wakaf)?></td>
                                            <td><?=$barang->nama_ranting?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php }
                        if(@$row_wt){ ?>
                        <table class="table" border="1" width="100%">
                            <span><h5><b><?=@$row_wt == TRUE ? 'B' : 'A'?>. Daftar Wakaf Tanah</b></h5></span>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Luas Tanah</th>
                                    <th>Nama Wakif</th>
                                    <th>Nama Mauquf</th>
                                    <th>Lokasi </th>
                                    <th>Nilai </th>
                                    <th>Tanggal Wakaf</th>
                                    <th>Instansi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($row_wt->result() as $key => $barang) { ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$barang->luas_tanah.'M <sup>2</sup>'?></td>
                                            <td><?=strtoupper($barang->nama_wakif)?></td>
                                            <td><?=strtoupper($barang->nama_mauquf)?></td>
                                            <td><?=$barang->lokasi_tanah?></td>
                                            <td><?=$this->money->rupiah($barang->harga_tanah)?></td>
                                            <td><?=$this->fungsi->tgl($barang->tgl_wakaf)?></td>
                                            <td><?=$barang->nama_ranting?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php }
                        if(@$row_wu) { ?>
                            <table class="table" border="1" width="100%">
                            <span><h5><b>
                                <?php 
                                    if(@$row_wb == TRUE && @$row_wt == TRUE){
                                        echo "C";
                                    }else if(@$row_wb == FALSE && @$row_wt == TRUE){
                                        echo "B";
                                    }else{
                                        echo "A";
                                    }
                                    ?>. Daftar Wakaf Tanah
                            </b></h5></span>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nilai Wakaf</th>
                                    <th>Nama Wakif</th>
                                    <th>Nama Mauquf</th>
                                    <th>Tujuan Wakaf </th>
                                    <th>Tanggal Wakaf</th>
                                    <th>Instansi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($row_wu->result() as $key => $barang) { ?>
                                        <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$this->money->rupiah($barang->nilai_wakaf)?></td>
                                            <td><?=strtoupper($barang->nama_wakif)?></td>
                                            <td><?=strtoupper($barang->nama_mauquf)?></td>
                                            <td><?=$barang->tujuan_wakaf?></td>
                                            <td><?=$this->fungsi->tgl($barang->tgl_wakaf)?></td>
                                            <td><?=$barang->nama_ranting?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                <?php } ?>
                </div>
                <!-- Akhir Isi Laporan -->
                <center>
                    <table align="center" border="0" style="width:600px;margin-top:35px;margin-bottom:20px;">
                        <tr class="text-center">
                            <td colspan="3" style="padding-bottom: 30px;">
                                <b> <?=strtoupper($this->fungsi->user_login()->nama_ranting)?> </b>
                                <p> Yogyakarta, <?=$this->fungsi->tgl(date('Y-m-d'))?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="width: 35%;">
                                <p>Ketua</p>
                                <div style="padding-top : 100px"></div>
                            </td>
                            <td style="width: 30%;"></td>
                            <td class="text-center" style="width: 35%;">
                                <p>Majelis Wakaf</p>
                                <div style="padding-top : 100px"></div>
                            </td>
                        </tr>    
                        <tr>
                            <td><center><hr style="width: 70%; height:5px; color:black"></center>NBM.</td>
                            <td></td>
                            <td><center><hr style="width: 70%; height:5px; color:black"></center>NBM.</td>

                        </tr>
                    </table>
                </center>

            
            </div>
        </div>
    </div>
</body>
</html>
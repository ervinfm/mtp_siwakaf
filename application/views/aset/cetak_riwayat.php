<html lang="en">

<head>
    <title> Cetak Riwayat Kehartabendaan</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/bootstrap.css" />
</head>

<body onload="window.print()">
    <div class="col-lg-12">
        <table border="0" align="center" style="width: 800px; border: none; margin-top: 20px;">
            <tr>
                <td style="width: 140px">
                    <img src="<?= site_url() ?>assets/images/muh.png" style="width: 80px; height: 80px; margin-left : 30px">
                </td>
                <td colspan="2" style="width:800px">
                    <center style="margin-top: 2px">
                        <h3>Cetak Riwayat Kehartabendaan</h3>
                        <h3><?= $this->fungsi->user_login()->nama_ranting ?></h3>
                        <h4><?= $this->fungsi->user_login()->alamat_ranting ?></h4>
    </div>
    </center><br />
    </td>
    </tr>
    </table>
    <center>
        <div style="border-style:inset; width: 60%; border-bottom-width:0px"></div>
    </center>
    <!-- Isi Laporan -->
    <div style="margin-top: 20px; margin-left: 200px; margin-right: 200px">
        <table class="table table-bordered" style="margin-bottom: 50px" width="">
            <thead>
                <tr>
                    <td width="3%">No</td>
                    <td>Nama Instansi</td>
                    <td>Nama Aset</td>
                    <td>Harga Aset</td>
                    <td>Jumlah / Luas</td>
                    <td>Tanggal Masuk</td>
                    <td>Tanggal Periwayatan</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->instansi ?></td>
                        <td><?= $data->nama_aset ?></td>
                        <td><?= $data->harga_aset ?></td>
                        <td><?= $data->jumlah_aset ?></td>
                        <td><?= $this->fungsi->tgl_indo($data->tgl_masuk_aset) ?></td>
                        <td><?= $this->fungsi->tgl_indo($data->tgl_riwayat) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
    </div>
    <!-- Akhir Isi Laporan -->
    <table align="center" style="width:800px; border:none;margin-top:15px;margin-bottom:20px;">
        <tr>
            <td align="right"><?= $this->fungsi->user_login()->nama_ranting ?>, <?= date('d M Y') ?></td>
        </tr>
        <tr>
            <td align="right" style="padding-right: 50px">
                <p>Kepala Instansi</p>
                <div style="padding-top : 80px">
                </div>
            </td>
        </tr>
        <tr>
            <td align="right" style="padding-right : 10px">( <?= $this->fungsi->user_login()->pimpinan ?> )</td>
        </tr>
    </table>


</body>

</html>
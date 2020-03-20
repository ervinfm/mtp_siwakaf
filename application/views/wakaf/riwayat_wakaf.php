<?php $this->view('messages'); ?>
<form action="<?=site_url('wakaf/riwayat_wakaf/del')?>" method="POST">
<div class="row">
    <div class="col-lg-12">
        <div class="basic-tb-hd" style="padding-bottom : 20px">
            <h2>Riwayat Perwakafan <?=$this->session->userdata('ranting')?></h2>
            <button type="submit" class="btn btn-danger danger-icon-notika waves-effect btn-sm pull-right" style="margin-left: 10px"><i class="fa fa-trash"></i> Hapus</button>
            <a href="<?= site_url('wakaf/riwayat_wakaf/cetak') ?>" target="_blank" class="btn btn-gray gray-icon-notika waves-effect btn-sm pull-right"><i class="fa fa-print"></i> Cetak</a>
        </div>
    </div>
</div>
<div class="box-body table-responsive no-padding">
    <table id="data-table-basic" class="table table-striped">
        <thead>
            <tr>
                <th>Pilih</th>
                <th>Instansi</th>
                <th>Wakif</th>
                <th>Mauquf</th>
                <th>Nama Aset</th>
                <th>Harga Aset</th>
                <th>Jumlah/Luas Aset</th>
                <th>Tanggal Masuk Aset</th>
                <th>Tanggal Periwayatan</th>
                <th>Jenis Aset</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach ($row->result() as $key => $data) { ?>
                <tr>
                    <td><input type="checkbox" name="id[]" value="<?= $data->id_riwayat_aset ?>"></td>
                    <td><?= $data->nama_ranting ?></td>
                    <td><?= $data->wakif ?></td>
                    <td><?= $data->mauquf ?></td>
                    <td><?= $data->nama_aset ?></td>
                    <td><?= $this->money->rupiah($data->harga_aset) ?></td>
                    <td><?= $data->jumlah_aset ?></td>
                    <td><?= $this->fungsi->tgl_indo($data->tgl_masuk_aset) ?></td>
                    <td><?= $this->fungsi->tgl_indo($data->tgl_riwayat) ?></td>
                    <td>
                        <?php if ($data->jenis_aset == 'Barang') {
                            echo '<button class="btn notika-btn-lime btn-reco-mg btn-button-mg waves-effect btn-sm" style="color: white">' . $data->jenis_aset . '</button>';
                        } else if ($data->jenis_aset == 'Tanah') {
                            echo '<button class="btn notika-btn-deeppurple btn-reco-mg btn-button-mg waves-effect" style="color: white">' . $data->jenis_aset . '</button>';
                        } else {
                            echo '<button class="btn notika-btn-deeporange btn-reco-mg btn-button-mg waves-effect" style="color: white">' . $data->jenis_aset . '</button>';
                        } ?>
                    </td>
                </tr>
            <?php
            } ?>
        </tbody>
        <tfoot>
            <td colspan="3"></td>
        </tfoot>
    </table>
</div>
</form>
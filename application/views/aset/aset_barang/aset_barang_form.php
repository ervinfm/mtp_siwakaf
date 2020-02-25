<?php $this->view('messages'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="basic-tb-hd col-lg-12">
            <div class="col-lg-6">
                <h2><?= $page == 'add' ? 'Tambah' : 'Update' ?> Data Kehartabendaan Barang</h2>
                <p>Form untuk <?= $page == 'add' ? 'Menambahkan' : 'Memperbaharui' ?> data Kehartabendaan</p>
            </div>
            <div class="col-lg-6 mg-t-30">
                <a href="<?= site_url('asset/aset_barang') ?>" class="btn btn-danger danger-icon-notika waves-effect pull-right"><i class="notika-icon notika-left-arrow"></i> Kembali</a>
            </div>
            <div class="row">
                <div class="col-lg-12" style="padding-top : 25px">
                    <?= form_open_multipart('asset/aset_barang/proses') ?>
                    <input type="hidden" name="id" value="<?= $row->id_aset_barang ?>">
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="ranting_b">Instansi *</label>
                                <?php $disable = 'disabled="disabled"'; ?>
                                <select name="ranting_b" id="ranting_b" class="form-control" <?= $this->fungsi->user_login()->level != 1 ? $disable : null ?>>
                                    <?php
                                    if ($this->fungsi->user_login()->level == 1) {
                                        foreach ($ranting->result() as $key => $data) { ?>
                                            <option value="<?= $data->id_ranting ?>" <?= $row->id_ranting == $data->id_ranting ? 'selected' : null ?>><?= $data->nama_ranting ?></option>
                                    <?php   }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama_b">Nama Barang *</label>
                            <input type="text" name="nama_b" id="nama_b" class="form-control" value="<?= $row->nama_aset ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jenis_b">Jenis Barang *</label>
                            <input type="text" name="jenis_b" id="jenis_b" class="form-control" value="<?= $row->jenis_aset ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="kondisi_b">Kondisi Barang *</label>
                            <select name="kondisi_b" id="kondisi_b" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="A" <?= $row->kondisi_aset == 'A' ? 'selected' : null ?>>Baik</option>
                                <option value="B" <?= $row->kondisi_aset == 'B' ? 'selected' : null ?>>Rusak Ringan</option>
                                <option value="C" <?= $row->kondisi_aset == 'C' ? 'selected' : null ?>>Rusak Berat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="harga_b">Harga Barang *</label>
                            <input type="number" name="harga_b" id="harga_b" value="<?= $row->harga_aset ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tgl_b">Tanggal Masuk Barang *</label>
                            <input type="date" name="tgl_b" id="tgl_b" class="form-control" value="<?= $row->tgl_masuk_aset ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="jumlah_b">Jumlah Barang *</label>
                            <input type="number" name="jumlah_b" id="jumlah_b" value="<?= $row->jumlah_aset ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="ket_b">Keterangan Lebih Lanjut *</label>
                            <textarea name="ket_b" class="form-control" id="ket_b" rows="1" required><?= $row->keterangan ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="brg">Berita Acara <small> (Ekstensi: jpeg, jpg, pdf, docx, xlsx | File Maksimal 10 MB)</small></label>
                            <input type="file" name="image" id="brg" class="form-control" value="<?= $row->gambar_aset ?>">
                        </div>
                    </div>
                    <div class="col-lg-12 pull-right">
                        <button type="reset" class="btn btn-deeporange deeporange-icon-notika waves-effect pull-right mg-t-30" style="margin-left : 10px">
                            <i class="notika-icon notika-close"></i> Reset
                        </button>
                        <button type="submit" name="<?= $page ?>" class="btn btn-teal teal-icon-notika waves-effect pull-right mg-t-30">
                            <i class="fa fa-pencil"></i> <?= $page == 'add' ? ' Tambah' : ' Update' ?>
                        </button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
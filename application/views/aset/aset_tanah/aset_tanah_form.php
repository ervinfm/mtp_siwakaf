<?php $this->view('messages'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="basic-tb-hd col-lg-12">
            <div class="col-lg-6">
                <h2><?= $page == 'add' ? 'Tambah' : 'Update' ?> Data Kehartabendaan Tanah</h2>
                <p>Form untuk <?= $page == 'add' ? 'Menambahkan' : 'Memperbaharui' ?> data Kehartabendaan</p>
            </div>
            <div class="col-lg-6 mg-t-30">
                <a href="<?= site_url('asset/aset_tanah') ?>" class="btn btn-danger danger-icon-notika waves-effect pull-right"><i class="notika-icon notika-left-arrow"></i> Kembali</a>
            </div>
            <div class="row">
                <div class="col-lg-12" style="padding-top : 25px">
                    <?= form_open_multipart('asset/aset_tanah/proses') ?>
                    <input type="hidden" name="id" value="<?= $row->id_aset_tanah ?>">
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
                            <label for="akta_t">No Akta Tanah *</label>
                            <input type="text" name="akta_t" id="akta_t" class="form-control" value="<?= $row->aset_akta_tanah ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="lokasi_t">Lokasi Tanah *</label>
                            <input type="text" name="lokasi_t" id="lokasi_t" class="form-control" value="<?= $row->lokasi_tanah ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="luas_t">Luas Tanah *</label>
                            <input type="number" name="luas_t" id="luas_t" class="form-control" value="<?= $row->luas_tanah ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="harga_t">Harga Tanah *</label>
                            <input type="number" name="harga_t" id="harga_t" class="form-control" value="<?= $row->harga_tanah ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="peng_t">Penggunaan Tanah *</label>
                            <textarea name="peng_t" id="peng_t" class="form-control" rows="4" required> <?= $row->penggunaan_aset ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tarsip_t">Tempat Penyimpanan Arsip *</label>
                            <textarea name="tarsip_t" id="tarsip_t" class="form-control" rows="4" required> <?= $row->tempat_arsip ?> </textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tgl_t">Tanggal Masuk Tanah *</label>
                            <input type="date" name="tgl_t" id="tgl_t" class="form-control" value="<?= $row->tgl_masuk_tanah ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="doc_t">Berita Acara <small> (Ekstensi: jpeg, jpg, pdf, docx, xlsx | File Maksimal 10 MB)</small></label>
                            <input type="file" name="doc_t" id="doc_t" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="lbangun_t">Luas Bangunan </label><small> (Masukkan jika ada)</small>
                            <input type="number" name="lbangun_t" id="lbangun_t" class="form-control" value="<?= $row->luas_bangunan ?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket_t">Keterangan *</label>
                            <textarea name="ket_t" id="ket_t" class="form-control" rows="4" required> <?= $row->keterangan ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 pull-right">
                        <button type="reset" class="btn btn-deeporange deeporange-icon-notika waves-effect pull-right mg-t-30" style="margin-left : 10px">
                            <i class="notika-icon notika-close"></i> Reset
                        </button>
                        <button type="submit" name="<?= $page ?>" class="btn btn-teal teal-icon-notika waves-effect pull-right mg-t-30">
                            <i class="notika-icon notika-down-arrow"></i> <?= $page == 'add' ? ' Tambah' : ' Update' ?>
                        </button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
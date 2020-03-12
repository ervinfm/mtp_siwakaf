<?php $this->view('messages'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="basic-tb-hd col-lg-12">
            <div class="col-lg-6">
                <h2><?= $page == 'add' ? 'Tambah' : 'Update' ?> Data Wakaf Tanah</h2>
                <p>Form untuk <?= $page == 'add' ? 'Menambahkan' : 'Memperbaharui' ?> Data Wakaf</p>
            </div>
            <div class="col-lg-6 mg-t-30">
                <a href="<?= site_url('wakaf/wakaf_tanah') ?>" class="btn btn-danger danger-icon-notika waves-effect pull-right"><i class="notika-icon notika-left-arrow"></i> Kembali</a>
            </div>
            <div class="row">
                <div class="col-lg-12" style="padding-top : 25px">
                    <?= form_open_multipart('wakaf/wakaf_tanah/proses') ?>
                    <input type="hidden" name="id" value="<?= $row->id_wakaf_tanah ?>">
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="ranting_b">Instansi *</label>
                                <?php $disable = 'disabled="disabled"'; ?>
                                <select name="ranting_b" id="ranting_b" class="form-control" <?= $this->fungsi->user_login()->level != 1 ? $disable : null ?>>
                                    <?php
                                    if ($this->fungsi->user_login()->level == 1) {
                                        foreach ($ranting->result() as $key => $data) { ?>
                                            <option value="<?= $data->id_ranting ?>" <?= $data->id_ranting == $row->id_ranting ? 'selected' : null ?>><?= $data->nama_ranting ?></option>
                                    <?php   }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="akta_t">Nomor Akta Tanah *</label>
                            <input type="number" name="akta_t" id="akta_t" class="form-control" value="<?= $row->no_akta_wakaf ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="wakif_t">Nama Wakif *</label>
                            <input type="text" name="wakif_t" id="wakif_t" class="form-control" value="<?= $row->nama_wakif ?>" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="mauquf_t">Nama Mauquf *</label>
                            <input type="text" name="mauquf_t" id="mauquf_t" class="form-control" value="<?= $row->nama_mauquf ?>" required>
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
                            <label for="status_t">Status Tanah *</label>
                            <input type="text" name="status_t" id="status_t" class="form-control" value="<?= $row->status_tanah ?>" required>
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
                            <label for="lbangun_t">Luas Bangunan </label><small> (Masukkan jika ada)</small>
                            <input type="number" name="lbangun_t" id="lbangun_t" class="form-control" value="<?= $row->luas_bangunan ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tgl_t">Tanggal Wakaf *</label>
                            <input type="date" name="tgl_t" id="tgl_t" class="form-control" value="<?= $row->tgl_wakaf ?>" <?= $page == 'add' ? 'required' : null ?>>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="brg">Berita Acara <small> (Ekstensi: jpeg, jpg, pdf, docx, xlsx | File Maksimal 10 MB)</small></label>
                            <input type="file" name="doc_t" id="doc_t" class="form-control" value="<?= $row->doc_wakaf_tanah ?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="guna_t">Tujuan Penggunaan Tanah *</label>
                            <textarea name="guna_t" id="guna_t" class="form-control" rows="3" required><?= $row->penggunaan_tanah ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="lokasi_t">Lokasi Tanah *</label>
                            <textarea name="lokasi_t" id="lokasi_t" class="form-control" rows="3" required><?= $row->lokasi_tanah ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="tempat_t">Tempat Penyimpanan Arsip *</label>
                            <textarea name="tempat_t" id="tempat_t" class="form-control" rows="3" required><?= $row->tempat_arsip ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="ket_t">Keterangan *</label>
                            <textarea name="ket_t" id="ket_t" class="form-control" rows="3" required><?= $row->keterangan_tanah ?></textarea>
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
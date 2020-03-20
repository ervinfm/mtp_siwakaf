<?php $this->view('messages'); ?>            
    <div class="row">
        <div class="col-lg-12">
            <div class="basic-tb-hd col-lg-12" >
                <div class="col-lg-6">
                    <h2><?=$page == 'add' ? 'Tambah' : 'Update'?> Data Wakaf Uang</h2>
                    <p>Form untuk <?=$page == 'add' ? 'Menambahkan' : 'Memperbaharui'?> Data Wakaf</p>
                </div>
                <div class="col-lg-6 mg-t-30" >
                    <a href="<?=site_url('wakaf/wakaf_uang')?>" class="btn btn-danger danger-icon-notika waves-effect pull-right"><i class="notika-icon notika-left-arrow"></i> Kembali</a>
                </div>
            <div class="row" >
                <div class="col-lg-12" style="padding-top : 25px">
                    <?=form_open_multipart('wakaf/wakaf_uang/proses')?>
                        <input type="hidden" name="id" value="<?=$row->id_wakaf_uang?>">
                        <?php if($this->fungsi->user_login()->level == 1){ ?>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="ranting_b">Instansi *</label>
                                    <?php $disable = 'disabled="disabled"';?>
                                    <select name="ranting_b" id="ranting_b" class="form-control"<?=$this->fungsi->user_login()->level != 1 ? $disable : null ?> >
                                        <?php 
                                            if($this->fungsi->user_login()->level == 1){
                                                foreach ($ranting->result() as $key => $data){?>
                                                    <option value="<?=$data->id_ranting?>" <?=$data->id_ranting == $row->id_ranting ? 'selected' : null?> ><?=$data->nama_ranting?></option>
                                        <?php   }
                                            }?>
                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="wakif_w">Nama Wakif *</label>
                                <input type="text" name="wakif_w" id="wakif_w" class="form-control" value="<?=$row->nama_wakif?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="mauquf_w">Nama Mauquf *</label>
                                <input type="text" name="mauquf_w" id="mauquf_w" class="form-control" value="<?=$row->nama_mauquf?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nilai_w">Nilai Wakaf *</label>
                                <input type="number" name="nilai_w" id="nilai_w" class="form-control" value="<?=$row->nilai_wakaf?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tgl_w">Tanggal Wakaf *</label>
                                <input type="date" name="tgl_w" id="tgl_w" class="form-control" value="<?=$row->tgl_wakaf?>" <?=$page == 'add' ? 'required' : null ?>>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                            <label for="brg">Berita Acara <small> (Ekstensi: jpeg, jpg, pdf, docx, xlsx | File Maksimal 10 MB)</small></label>
                                <input type="file" name="doc_w" id="doc_w" class="form-control" value="<?=$row->doc_wakaf_uang?>" >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tujuan_w">Tujuan Wakaf *</label>
                                <textarea name="tujuan_w" id="tujuan_w" class="form-control" rows="5" required><?=$row->tujuan_wakaf?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="ket_w">Keterangan Wakaf *</label>
                                <textarea name="ket_w" id="ket_w" class="form-control" rows="5" required><?=$row->keterangan?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 pull-right">
                            <button type="reset" class="btn btn-deeporange deeporange-icon-notika waves-effect pull-right mg-t-30" style="margin-left : 10px" >
                                <i class="notika-icon notika-close"></i> Reset
                            </button>
                            <button type="submit" name="<?=$page?>" class="btn btn-teal teal-icon-notika waves-effect pull-right mg-t-30" >
                                <i class="notika-icon notika-down-arrow"></i> <?=$page == 'add' ? ' Tambah' : ' Update'?>
                            </button>           
                        </div>          
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>

            
           
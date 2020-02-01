<?php $this->view('messages'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="basic-tb-hd" style="padding-bottom : 20px">
            <h2><?=ucfirst($page)?> Admin</h2>
            <h6><?=$page == 'add' ? 'Tambah' : 'Perbaharui'?> data mengenai admin </h6>
            <a href="<?=site_url('admin')?>" class="btn btn-warning btn-sm pull-right"><i class="fa fa-reply"></i> Kembali</a>
        </div>
    </div>
        <form action="<?=site_url('admin/process')?>" method="post">
            <?=$page == 'add' ? '<div class="col-lg-3"></div>' : null ?>
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?=$row->id_admin?>">
                    <label>Nama admin *</label>
                    <input type="text" name="nama" value="<?=$row->nama_admin?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat admin *</label>
                    <input type="text" name="alamat" value="<?=$row->alamat?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telepon admin *</label>
                    <input type="number" name="telp" value="<?=$row->telp?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ranting *</label>
                    <select name="ranting" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php
                            foreach ($ranting->result() as $key => $data) { ?>
                                <option value="<?=$data->id_ranting?>" <?=$data->id_ranting == $row->id_ranting ? 'selected' : null ?>> 
                                        <?=$data->nama_ranting?> 
                                </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
                <?php 
                    if($page == 'edit'){  ?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Username *</label>
                                <input type="text" name="u_name" value="<?=$row->username?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password *</label><small>(Kosongkan Jika Tidak Diperbaharui) </small>
                                <input type="password" name="u_pass" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Level *</label>
                                <select name="level" class="form-control">
                                    <option value="1" <?=$row->level == 1 ? 'selected' : null ?> >Cabang</option>
                                    <option value="2" <?=$row->level == 2 ? 'selected' : null ?> >Ranting</option>
                                </select>
                            </div>
                        </div>
                <?php } ?>
                <div class="col-lg-12">
                    <div class="form-group pull-right" style="padding-top : 10px">
                        <button type="submit" name="<?=$page?>" class="btn btn-success">
                            <i class="fa fa-paper-plane"></i> <?=ucfirst($page)?>
                        </button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
        </form>
    </div>    
</div>
               
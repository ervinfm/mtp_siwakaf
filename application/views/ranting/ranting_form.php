<?php $this->view('messages'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="basic-tb-hd" style="padding-bottom : 20px">
            <h2><?=ucfirst($page)?> Ranting</h2>
            <h6><?=$page == 'add' ? 'Tambah' : 'Perbaharui'?> data mengenai Ranting </h6>
            <a href="<?=site_url('ranting')?>" class="btn btn-warning btn-sm pull-right"><i class="fa fa-reply"></i> Kembali</a>
        </div>
    </div>
        <form action="<?=site_url('ranting/process')?>" method="post">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?=$row->id_ranting?>">
                    <label>Nama Ranting *</label>
                    <input type="text" name="nama" value="<?=$row->nama_ranting?>" class="form-control">
                </div>
                <div class="form-group"> 
                    <label>Pimpinan Ranting *</label>
                    <input type="text" name="pimpinan" value="<?=$row->pimpinan?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Ranting *</label>
                    <input type="text" name="alamat" value="<?=$row->alamat_ranting?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telepon Ranting *</label>
                    <input type="number" name="telp" value="<?=$row->telp_ranting?>" class="form-control">
                </div>
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
               
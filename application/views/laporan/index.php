<?php 
    $this->view('messages'); 
    $jenis = $cat == 'aset' ? 'kehartabendaan' : 'wakaf' ;
?> 
    <form action="<?=site_url('laporan/'.$jenis.'/preview')?>" method="POST">
        <div class="row">
            <div class="col-lg-12">
                <div class="basic-tb-hd" style="padding-bottom : 20px">
                    <h2 style="font-size: 20px"><?=$page?></h2>
                </div>
                
                <div class="col-lg-12">
                    <h5><b>A. Pilih Instansi</b> <sup style="color: red">*</sup> <span style="color:red; font-size: 12px"><i><?=$this->session->flashdata('id');?></i></span></h5>  
                    <div class="row" style=" margin: 10px; margin-top: 20px">
                        <?php if($this->session->userdata('level') == 1){ ?>
                            <div class="col-lg-12" style="margin-bottom: 5px; padding-top: 10px">
                                <input type="checkbox" name="id[]" onclick="check_ranting(this)" > <b style="font-size: 13px;"> Pilih Semua </b>    
                            </div>
                            <?php foreach ($ranting->result() as $key => $data) { ?>
                                <div class="col-lg-6" style="margin-bottom: 5px">
                                    <input type="checkbox" name="id[]" value="<?=$data->id_ranting?>"> <b> <?=$data->nama_ranting?> </b>
                                </div>
                            <?php } ?>
                        <?php }else{ ?>
                            <input type="checkbox" name="id[]" value="<?=$this->session->userdata('id_ranting')?>"> <b> <?=$this->session->userdata('ranting')?> </b>
                        <?php } ?>
                    </div>
                </div>
                    <hr />
                <div class="col-lg-6" style="margin-top: 20px">
                    <h5><b>B. Pilih Jenis Laporan</b> <sup style="color: red">*</sup> <span style="color:red; font-size: 12px"><i><?=$this->session->flashdata('cat');?></i></span></h5>  
                    <div class="row" style=" margin: 10px; margin-top: 20px">
                        <div class="col-lg-12" style="margin-bottom: 5px; padding-top: 10px">
                            <input type="checkbox"  onchange="check_cat(this)" name="cat[]"> <b style="font-size: 13px;"> Pilih Semua </b>    
                        </div>
                        <?php if ($cat == 'aset') { ?>
                            <div class="col-lg-4" style="margin-bottom: 5px">
                                <input type="checkbox" name="cat[]" value="ab"> <b>Aset Barang</b>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 5px">
                                <input type="checkbox" name="cat[]" value="at"> <b>Aset Tanah</b>
                            </div>
                        <?php }else if($cat == 'wakaf'){ ?>
                            <div class="col-lg-4" style="margin-bottom: 5px">
                                <input type="checkbox" name="cat[]" value="wb"> <b>Wakaf Barang</b>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 5px">
                                <input type="checkbox" name="cat[]" value="wt"> <b>Wakaf Tanah</b>
                            </div>
                            <div class="col-lg-4" style="margin-bottom: 5px">
                                <input type="checkbox" name="cat[]" value="wu"> <b>Wakaf Uang</b>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-6" style="margin-top: 20px">
                    <h5><b>C. Pilih Rentang Tanggal</b></h5>
                        <div class="col-lg-12" style="padding-top: 15px; padding-bottom: 5px">
                            <input type="checkbox" id="filter" name="filter_tgl" value="1"> <b style="font-size: 13px;"> Filter Tanggal Laporan</b>
                        </div>
                        <div class="col-lg-6">
                            <label for=""><small>Tanggal Awal</small></label>
                            <input type="date" name="date_start" id="text" value="<?=date('Y-m-d')?>" class="form-control"  disabled>
                        </div>
                        <div class="col-lg-6">
                            <label for=""><small>Tanggal Akhir</small></label>
                            <input type="date" name="date_finish" id="text2" value="<?=date('Y-m-d')?>" class="form-control" disabled>
                        </div>
                </div>
                
                <div class="col-lg-12 pt-3"  style="margin-top: 20px">
                    <button type="submit" name="jenis" value="<?=$cat?>" id="sub" target="_blank" class="btn btn-teal teal-icon-notika waves-effect pull-right"> Preview Laporan <i class="fa fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function check_ranting(ele) {
            var checkboxes = document.getElementsByName('id[]');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox' ) {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }

        function check_cat(ele) {
            var checkboxes = document.getElementsByName('cat[]');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox' ) {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }

        document.getElementById('filter').onchange = function() {
            document.getElementById('text').disabled = !this.checked;
            document.getElementById('text2').disabled = !this.checked;
        };

    </script>

       
           
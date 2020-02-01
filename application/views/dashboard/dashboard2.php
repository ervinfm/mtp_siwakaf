<?php $this->view('messages'); ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="color-wrap">
                        <div class="color-hd">
                            <h2>Beranda Sistem Informasi Kehartabendaan dan Wakaf  </h2>
                            <p>Sistem Informasi Pengelolahan Kehartabendaan dan Wakaf di Lingkungan Muhammadiyah <?=$this->fungsi->user_login()->nama_ranting?></p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mg-t-10">
                                <center>
                                    <img src="<?=site_url()?>assets/images/dsh2.png" style="width:450px; height : 180px">
                                </center>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mg-t-20">
                                    <div class="col-lg-3 ">
                                        <div class="color-single nk-red" style="padding : 23px">
                                            <h3><?=$this->home->getAset()?><sup>Item</sup></h3> 
                                            <span><a href="#" style="color : #ffffff">Kehartabendaan <i class="fa fa-arrow-circle-right"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 ">
                                        <div class="color-single nk-pink" style="padding : 23px">
                                            <h3><?=$this->home->getWakaf()?><sup>Item</sup></h3> 
                                            <span><a href="#" style="color : #ffffff">Wakaf <i class="fa fa-arrow-circle-right"></i></a></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="color-single nk-teal">
                                            <h2><?=ucfirst($this->fungsi->user_login()->nama_admin)?></h2>
                                            <p><?=ucfirst($this->fungsi->user_login()->alamat_ranting)?></p>
                                            <span><?="Admin ".$this->fungsi->user_login()->nama_ranting?></span>                                        
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="color-single nk-orange">
                                            <h2 id="clock"></h2>
                                            <p><?=$this->fungsi->hari()?>, <?=$this->fungsi->tgl()?></p>
                                            <span><?=$this->fungsi->well()?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script type="text/javascript">
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        document.getElementById('clock').innerHTML=curr_hour + " : " + curr_minute + " : " + curr_second + " WIB";
        }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
</script>
       

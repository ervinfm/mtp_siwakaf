<?php $this->view('messages'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="realtime-wrap notika-shadow mg-t-0">
            <div class="color-hd">
                <h2>Dashboard Sistem Informasi <br>
                    <p>Sistem Informasi Pengelolahan Kehartabendaan dan Wakaf di Lingkungan Pimpinan Cabang Muhammadiyah Piyungan</p>
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: #006266;">
                        <div class="website-traffic-ctn">
                            <h2 style="color: white"><span class="counter"><?= $this->home->getaset_barang($this->session->userdata('id_ranting')) + $this->home->getaset_tanah() ?></span> Items</h2>
                            <p style="color: white">Total Aset Kehartabendaan</p>
                        </div>
                        <div class="sparkline-bar-stats1"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: #006266;">
                        <div class="website-traffic-ctn">
                            <h2 style="color: white"><span class="counter"><?= $this->home->getWakaf_barang($this->session->userdata('id_ranting')) + $this->home->getWakaf_tanah($this->session->userdata('id_ranting')) + $this->home->getWakaf_uang() ?></span> Items</h2>
                            <p style="color: white">Total Aset Perwakafan</p>
                        </div>
                        <div class="sparkline-bar-stats2"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30" style="background-color: #006266">
                        <div class="website-traffic-ctn">
                            <h2 style="color: white">Rp <span class="counter"><?= $this->home->get_count_aset($this->session->userdata('id_ranting')) ?></span></h2>
                            <p style="color: white">Total Nilai Kehartabendaan</p>
                        </div>
                        <div class="sparkline-bar-stats3"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30" style="background-color: #006266;">
                        <div class="website-traffic-ctn">
                            <h2 style="color: white">Rp <span class="counter"><?= $this->home->get_count_wakaf($this->session->userdata('id_ranting')) ?></span></h2>
                            <p style="color: white">Total Nilai Wakaf</p>
                        </div>
                        <div class="sparkline-bar-stats4"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
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
        document.getElementById('clock').innerHTML = curr_hour + " : " + curr_minute + " : " + curr_second + " WIB";
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
</script>
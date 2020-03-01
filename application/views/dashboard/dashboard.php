<?php $this->view('messages'); ?>
<div class="color-hd">
    <h2>Dashboard Sistem Informasi <br>
        <p>Sistem Informasi Pengelolahan Kehartabendaan dan Wakaf di Lingkungan Pimpinan Cabang Muhammadiyah Piyungan</p>
    </h2>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: #006266;">
            <div class="website-traffic-ctn">
                <h2 style="color: white"><span class="counter"><?= $this->home->getaset_barang() + $this->home->getaset_tanah() ?></span> Items</h2>
                <p style="color: white">Total Aset Kehartabendaan</p>
            </div>
            <div class="sparkline-bar-stats1"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: #006266;">
            <div class="website-traffic-ctn">
                <h2 style="color: white"><span class="counter"><?= $this->home->getWakaf_barang() + $this->home->getWakaf_tanah() + $this->home->getWakaf_uang() ?></span> Items</h2>
                <p style="color: white">Total Aset Perwakafan</p>
            </div>
            <div class="sparkline-bar-stats2"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30" style="background-color: #006266">
            <div class="website-traffic-ctn">
                <h2 style="color: white">Rp <span class="counter"><?= $this->home->get_count_aset() ?></span></h2>
                <p style="color: white">Total Nilai Aset Kehartabendaan</p>
            </div>
            <div class="sparkline-bar-stats3"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30" style="background-color: #006266;">
            <div class="website-traffic-ctn">
                <h2 style="color: white">Rp <span class="counter"><?= $this->home->get_count_wakaf() ?></span></h2>
                <p style="color: white">Total Nilai Wakaf</p>
            </div>
            <div class="sparkline-bar-stats4"><canvas style="display: inline-block; width: 58px; height: 36px; vertical-align: top;" width="58" height="36"></canvas></div>
        </div>
    </div>
</div>
</div>
<div class="row" style="margin-top: 10px">
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
            <div class="recent-post-ctn">
                <div class="recent-post-title">
                    <h2>Admin Login</h2>
                </div>
            </div>

            <?php foreach ($row->result() as $key => $data) { ?>
                <a href="<?= site_url('admin/get_log_login/' . $data->id_admin) ?>">
                    <div class="recent-post-items" style="margin-top: 10px">
                        <div class="recent-post-signle rct-pt-mg-wp">
                            <div class="recent-post-flex">
                                <div class="recent-post-img">
                                    <img src="<?= base_url() ?>assets/img/post/12.png" style="width: 60px">
                                </div>
                                <div class="recent-post-it-ctn">
                                    <h2><?= $data->nama_admin ?> <?= $data->is_online == 1 ? '<a data-toggle="tooltip" data-placement="top" title="" data-original-title="Online"><i class="notika-icon notika-dot" style="color: green"></i><a>' : '<a data-toggle="tooltip" data-placement="top" title="" data-original-title="Offline"><i class="notika-icon notika-dot" style="color: red"></i><a>' ?></h2>
                                    <p><?= $data->nama_ranting ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <div class="line-chart-wp chart-display-nn">
                    <span>
                        <center> <b>Grafik Perbandingan Kehartabendaan Barang </b></center>
                    </span>
                    <iframe class="chartjs-hidden-iframe" style="display: block; overflow: hidden; border: 0px none; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;" tabindex="-1"></iframe>
                    <canvas id="myChart" style="display: block; width: 415px; height: 200px;"></canvas>
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
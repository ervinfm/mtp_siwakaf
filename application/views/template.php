<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Pengelolahan Hartabenda dan Wakaf</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ?>assets/images/muh.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/bootstrap.min.css">
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/notification/notification.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/animate.css">
    <!-- Range Slider CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/themesaller-forms.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/wave/button.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/style.css">
    <!-- sweetalert2 
        ============================================ -->
    <script src="<?= site_url() ?>assets/sweetalert/sweetalert2.js"></script>
    <link rel="stylesheet" href="<?= site_url() ?>assets/sweetalert/sweetalert2.css">

    <script src="<?= site_url() ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'> </script>

    <style>
        .auto {
            display: block;
            padding: 5px;
            margin-top: 5px;
            width: 100%;
            height: 500px;
            overflow: auto;
        }
    </style>
</head>

<body>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="<?= site_url() ?>assets/images/header.png"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#myModaleleven" role="button">
                                    <span><i class="notika-icon notika-menus"></i></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('forum') ?>" class="nav-link dropdown-toggle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Forum Administrator">
                                    <span><i class="notika-icon notika-chat"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : null ?>">
                            <a href="<?= base_url('dashboard') ?>"><i class="notika-icon notika-house"></i> Beranda </a>
                        </li>
                        <li class="<?= $this->uri->segment(1) == 'asset' ? 'active' : null ?>">
                            <a data-toggle="tab" href="#harta"><i class="notika-icon notika-form"></i> Kehartabendaan </a>
                        </li>
                        <li class="<?= $this->uri->segment(1) == 'wakaf' ? 'active' : null ?>">
                            <a data-toggle="tab" href="#wakaf"><i class="notika-icon notika-edit"></i> Wakaf </a>
                        </li>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <li class="<?= $this->uri->segment(1) == 'ranting' || $this->uri->segment(1) == 'ranting' || $this->uri->segment(1) == 'admin' ? 'active' : null ?>">
                                <a data-toggle="tab" href="#ranting"><i class="notika-icon notika-windows"></i> Ranting </a>
                            </li>
                        <?php } ?>
                        <li class="<?= $this->uri->segment(1) == 'laporan' ? 'active' : null ?>">
                            <a data-toggle="tab" href="#laporan"><i class="notika-icon notika-bar-chart"></i> Laporan </a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="harta" class="tab-pane in  <?= $this->uri->segment(2) == 'aset_barang' || $this->uri->segment(2) == 'aset_tanah' || $this->uri->segment(2) == 'rekap_aset' || $this->uri->segment(2) == 'riwayat_aset' ? 'active' : null ?>  notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <a href="<?= site_url('asset/aset_barang') ?>">Aset Barang</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('asset/aset_tanah') ?>">Aset Tanah</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('asset/rekap_aset') ?>">Rekapitulasi Aset</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('asset/riwayat_aset') ?>">Riwayat Aset</a>
                                </li>
                            </ul>
                        </div>
                        <div id="wakaf" class="tab-pane in  <?= $this->uri->segment(2) == 'wakaf_barang' || $this->uri->segment(2) == 'wakaf_tanah' || $this->uri->segment(2) == 'wakaf_uang' || $this->uri->segment(2) == 'rekap_wakaf' | $this->uri->segment(2) == 'riwayat_wakaf' ? 'active' : null ?>  notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <a href="<?= site_url('wakaf/wakaf_barang') ?>">Wakaf Barang</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('wakaf/wakaf_tanah') ?>">Wakaf Tanah</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('wakaf/wakaf_uang') ?>">Wakaf Uang</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('wakaf/rekap_wakaf') ?>">Rekapitulasi Wakaf</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('wakaf/riwayat_wakaf') ?>">Riwayat Wakaf</a>
                                </li>
                            </ul>
                        </div>
                        <div id="ranting" class="tab-pane in  <?= $this->uri->segment(1) == 'ranting' || $this->uri->segment(1) == 'admin' ? 'active' : null ?>  notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li>
                                    <a href="<?= site_url('ranting') ?>">Daftar Ranting</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('admin') ?>">Admin Ranting</a>
                                </li>
                            </ul>
                        </div>
                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                            <div id="laporan" class="tab-pane in  <?= $this->uri->segment(1) == 'laporan' ? 'active' : null ?>  notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li>
                                        <a href="<?= site_url('laporan/laporan/') ?>?cat=1">Kehartabendaan Barang</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('laporan/laporan/') ?>?cat=2">Kehartabendaan Tanah</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('laporan/laporan/') ?>?cat=3">Wakaf Barang</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('laporan/laporan/') ?>?cat=4">Wakaf Uang</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('laporan/laporan/') ?>?cat=5">Wakaf Tanah</a>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <div id="laporan" class="tab-pane in  <?= $this->uri->segment(1) == 'laporan' ? 'active' : null ?>  notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">
                                    <li>
                                        <a href="<?= site_url('laporan/laporan_sub/laporan_aset') ?>" target="_blank">Kehartabendaan</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('laporan/laporan_sub/laporan_wakaf') ?>" target="_blank">Wakaf</a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <div class="realtime-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-2 col-sm-2 col-xs-12">
                    <div class="realtime-wrap notika-shadow mg-t-0">
                        <?= $contents ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © <?= date('Y') ?>.
                            <a href="http://pcmpiyungan.org" target="_blank"> Pimpinan Cabang Muhammadiyah Piyungan </a> - <a href="http://uad.ac.id" target="_blank"> Teknik Informatika Universitas Ahmad Dahlan </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Menus Log  -->
    <div class="modal fade" id="myModaleleven" role="dialog">
        <div class="modal-dialog modals-default nk-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h2>Pengaturan lanjutan</h2>
                        <p>Silahkan Memilih salah satu Menu untuk diarahkan</p>
                    </center>
                    <div class="row">
                        <div class="col-lg-12" style="padding-top : 30px">
                            <div class="col-lg-4">
                                <div class="btn-demo-notika ">
                                    <div class="button-icon-btn button-icon-btn-rd ">
                                        <button onclick="lockscreen()" class="btn btn-teal teal-icon-notika btn-reco-mg btn-button-mg waves-effect mg-t-5" style="width:100px; height:100px">
                                            <i class="notika-icon notika-refresh" style="font-size : 40px; position: center;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="btn-demo-notika ">
                                    <div class="button-icon-btn button-icon-btn-rd ">
                                        <button type="submit" data-toggle="modal" data-target="#myModalone" data-dismiss="modal" class="btn btn-amber amber-icon-notika btn-reco-mg btn-button-mg waves-effect mg-t-5" style="width:100px; height:100px">
                                            <i class="notika-icon notika-up-arrow" style="font-size : 40px; position: center;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="btn-demo-notika ">
                                    <div class="button-icon-btn button-icon-btn-rd ">
                                        <button onclick="exit()" class="btn btn-deeporange deeporange-icon-notika btn-reco-mg btn-button-mg waves-effect mg-t-5" style="width:100px; height:100px">
                                            <i class="notika-icon notika-close" style="font-size : 40px; position: center;"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <center>
                                    <h2>Kunci Layar</h2>
                                </center>
                            </div>
                            <div class="col-lg-4">
                                <center>
                                    <h2>Profile Akun</h2>
                                </center>
                            </div>
                            <div class="col-lg-4">
                                <center>
                                    <h2>Keluar Aplikasi</h2>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Menus Log -->

    <!-- Start Update data Admin Login -->
    <div class="modal fade" id="myModalone" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Perbaharui Data Admin</h3>
                </div>
                <div class="modal-body" style="padding-top : 30px">
                    <form action="<?= site_url('admin/profil') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $this->fungsi->user_login()->id_admin ?>">
                        <div class="form-group col-lg-6">
                            <label for="">Nama Admin</label>
                            <div class="nk-int-st">
                                <input type="text" name="a_nama" value="<?= $this->fungsi->user_login()->nama_admin ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Ranting</label>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" value="<?= $this->fungsi->user_login()->nama_ranting ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Username</label>
                            <div class="nk-int-st">
                                <input type="text" name="a_user" value="<?= $this->fungsi->user_login()->username ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Password</label>
                            <div class="nk-int-st">
                                <input type="password" name="a_pass" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Alamat</label>
                            <div class="nk-int-st">
                                <input type="text" name="a_alamat" value="<?= $this->fungsi->user_login()->alamat ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">Telpon</label>
                            <div class="nk-int-st">
                                <input type="text" name="a_telp" value="<?= $this->fungsi->user_login()->telp ?>" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="d_up">Simpan Perubahan</button>
                </div>
                </form>
                <small>*Kosongkan Password jika tidak diubah</small>
            </div>
        </div>
    </div>
    <!-- End Update data Admin Login -->

    <!-- End Footer area-->
    <script>
        function exit() {
            Swal.fire({
                title: 'Yakin Akan Keluar ?',
                text: "Akun akan di logout dengan menekan Yakin!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if (result.value) {
                    window.location = "<?= site_url('auth/logout') ?>";
                } else {
                    Swal.fire(
                        'Sistem Informasi Wakaf says',
                        'Anda Tetap Berada Pada Sistem',
                        'success'
                    )
                }
            });
        }

        setTimeout(function() {
            $('#myModaleleven').modal('hide');
        }, 3000);

        function lockscreen() {
            window.location = "<?= site_url('dashboard/LockScreen') ?>";
        }
    </script>

    <!-- jquery
		============================================ -->
    <script src="<?= site_url() ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/notification/bootstrap-growl.min.js"></script>
    <script src="<?= site_url() ?>assets/js/notification/notification-active.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?= site_url() ?>assets/js/counterup/waypoints.min.js"></script>
    <script src="<?= site_url() ?>assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= site_url() ?>assets/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= site_url() ?>assets/js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= site_url() ?>assets/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/flot/jquery.flot.js"></script>
    <script src="<?= site_url() ?>assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?= site_url() ?>assets/js/flot/curvedLines.js"></script>
    <script src="<?= site_url() ?>assets/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/knob/jquery.knob.js"></script>
    <script src="<?= site_url() ?>assets/js/knob/jquery.appear.js"></script>
    <script src="<?= site_url() ?>assets/js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/wave/waves.min.js"></script>
    <script src="<?= site_url() ?>assets/js/wave/wave-active.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?= site_url() ?>assets/js/data-table/data-table-act.js"></script>

    <!--  todo JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?= site_url() ?>assets/js/main.js"></script>
    <script src="<?= site_url() ?>assets/js/meanmenu/jquery.meanmenu.js"></script>


    <!-- Charts JS Area for Dashboard
		============================================ -->
    <script src="<?= site_url() ?>assets/chart/Chart.js"></script>
    <?php
    $row = $this->home->get_ranting();
    $value = $this->home->get_count_assets();
    ?>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($row->result() as $key) {
                                echo '"' . $key->nama_ranting . '",';
                            } ?>],
                datasets: [{
                    label: '',
                    data: [<?php foreach ($value->result() as $data) {
                                echo '"' . $data->value . '",';
                            } ?>],
                    backgroundColor: [
                        'rgba(22, 160, 133,1.0)',
                        'rgba(241, 196, 15,1.0)',
                        'rgba(52, 73, 94,1.0)',
                        'rgba(149, 165, 166,1.0)',
                        'rgba(25, 42, 86,1.0)',
                        'rgba(142, 68, 173,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(46, 204, 113,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(230, 126, 34,1.0)',
                        'rgba(211, 84, 0,1.0)',
                        'rgba(0, 151, 230,1.0)',
                        'rgba(72, 126, 176,1.0)',
                        'rgba(127, 143, 166,1.0)',
                        'rgba(53, 59, 72,1.0)',
                        'rgba(39, 60, 117,1.0)',
                        'rgba(237, 76, 103,1.0)',
                        'rgba(153, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(217, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(0, 148, 50,1.0)',
                        'rgba(196, 229, 56,1.0)',
                        'rgba(238, 90, 36,1.0)',
                        'rgba(255, 195, 18,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(6, 82, 221,1.0)',
                    ],
                    borderColor: [
                        'rgba(22, 160, 133,1.0)',
                        'rgba(241, 196, 15,1.0)',
                        'rgba(52, 73, 94,1.0)',
                        'rgba(149, 165, 166,1.0)',
                        'rgba(25, 42, 86,1.0)',
                        'rgba(142, 68, 173,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(46, 204, 113,1.0)',
                        'rgba(192, 57, 43,1.0)',
                        'rgba(230, 126, 34,1.0)',
                        'rgba(211, 84, 0,1.0)',
                        'rgba(0, 151, 230,1.0)',
                        'rgba(72, 126, 176,1.0)',
                        'rgba(127, 143, 166,1.0)',
                        'rgba(53, 59, 72,1.0)',
                        'rgba(39, 60, 117,1.0)',
                        'rgba(237, 76, 103,1.0)',
                        'rgba(153, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(217, 128, 250,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(0, 148, 50,1.0)',
                        'rgba(196, 229, 56,1.0)',
                        'rgba(238, 90, 36,1.0)',
                        'rgba(255, 195, 18,1.0)',
                        'rgba(18, 203, 196,1.0)',
                        'rgba(6, 82, 221,1.0)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

</body>

</html>
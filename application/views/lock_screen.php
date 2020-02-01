<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aplikasi Pengelolahan Kehartabendaan dan Wakaf</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=site_url()?>assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="error-page-area" style="background : url(<?=site_url('assets/images/')?>2345.JPG!D) no-repeat center center fixed ; -webkit-background-size: 100% 100%; -moz-background-size: 100% 100%; -o-background-size: 100% 100%; background-size: 100% 100% ">
        <div class="error-page-wrap">
            <i class="notika-icon notika-close"></i>
            <h2>Lock Screen</h2>
            <p>Aplikasi Pengelolahan Kehartabendaan dan Wakaf</p>
            <form action="<?=site_url('dashboard/ls_proses')?>" method="post">
                <div class="col-lg-12 mg-t-10" style="margin-bottom : 20px;">
                        <div class="col-lg-3"></div>
                    <center>
                        <div class="col-lg-6" style="background : #27ae60; padding : 5px; border-radius : 5px">
                            <table >
                                <tr>
                                    <td>
                                        <div class="pull-right" style="width: 40px; height: 40px; background:#0abde3; border-radius: 100%; ">
                                            <h2 style="color : #fff; padding-top : 10px; padding-left : 14px">
                                                <?=ucfirst(substr($row->nama_admin,0,1))?>
                                            </h2>
                                        </div>
                                    </td>
                                    <td>
                                        <h2 style="padding-top : 10px; padding-left : 20px; color: #fff">
                                            <?=ucfirst($row->nama_admin)?>
                                        </h2>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </center>
                </div>
                <div class="form-element-list mg-t-30" >
                    <div class="col-lg-12 ">
                        <div class="form-group ic-cmp-int float-lb floating-lb">
                            <div class="form-ic-cmp">
                                
                            </div>
                            <div class="nk-int-st" style="margin-top : 10px">
                                <input type="hidden" name="username" value="<?=$row->username?>">
                                <input type="password" name="password" class="form-control" autofocus required oninvalid="this.setCustomValidity('Password harus di isi !')" oninput="setCustomValidity('')">
                                <label class="nk-label"><center>Password</center></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <button type="submit" name="ls_login" class="btn">Masuk</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <button onclick="exit()" class="btn error-btn-mg">Keluar</button>
                </div>
        </div>
    </div>

    <script>
        function exit(){
            window.location ="<?=site_url('auth/logout')?>";
        }
    </script>
    
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
    <!-- jquery
		============================================ -->
    <script src="<?=site_url()?>assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?=site_url()?>assets/js/counterup/waypoints.min.js"></script>
    <script src="<?=site_url()?>assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?=site_url()?>assets/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/flot/jquery.flot.js"></script>
    <script src="<?=site_url()?>assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?=site_url()?>assets/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/knob/jquery.knob.js"></script>
    <script src="<?=site_url()?>assets/js/knob/jquery.appear.js"></script>
    <script src="<?=site_url()?>assets/js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/wave/waves.min.js"></script>
    <script src="<?=site_url()?>assets/js/wave/wave-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?=site_url()?>assets/js/main.js"></script>
</body>

</html>
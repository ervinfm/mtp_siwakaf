<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?=site_url()?>assets/css/style.css">
     <!-- Main css -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/style.css">
        <!-- Font Icon -->
    <link rel="stylesheet" href="<?=site_url()?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?=site_url()?>assets/images/muh.png">

    <title>Sistem Informasi Pengelolahan Hartabenda dan Wakaf</title>
  </head>
  <body>
      <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                    <?php $this->view('messages'); ?>
                        <h3 class="form-title"><center> Registrasi Akun Baru </center></h3>
                            <form action="<?=site_url('auth/register_proses')?>" method="post">
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="user" id="name" placeholder="Username Baru" required/>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="pass" id="pass" placeholder="Password Baru" required/>
                                </div>
                                <div class="form-group">
                                    <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="password" name="re_pass" id="re_pass" placeholder="Ulangi Password Baru" required/>
                                </div>
                                <div class="form-group">
                                    <label for="ranting"><i class="zmdi zmdi-dot-circle-alt"></i></label>
                                    <input type="text" name="ranting" id="ranting" placeholder="Kode Instansi" required/>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="sign_up" value="<?=ucfirst($page)?>" class="btn btn-success"/>
                                </div>
                            </form>
                        </div>
                    <div class="signup-image">
                        <figure><img src="<?=site_url()?>assets/images/mekah-putih.jpg" alt="sing up image"></figure>
                        <a href="<?=site_url('auth/login')?>" class="signup-image-link">Sudah Terdaftar ?</a>
                    </div>
                </div>
            </div>
        </section>
      </div>
        <!-- akhir div main -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=site_url()?>assets/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


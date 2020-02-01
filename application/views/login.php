<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <!-- Main css -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/style.css">
        <!-- Font Icon -->
    <link rel="stylesheet" href="<?=site_url()?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Bootstrap min -->
    <link rel="stylesheet" href="<?=site_url()?>assets/css/bootstrap.css">

    <link rel="shortcut icon" type="image/x-icon" href="<?=site_url()?>assets/images/muh.png">


    <title>Sistem Informasi Pengelolahan Hartabenda dan Wakaf</title>
  </head>
  <body>
      <div class="main">
    <!-- awal login -->
          <section class="sign-in">
            <!-- awal container -->
              <div class="container"> 
                <!-- awal signin -->
                  <div class="signin-content">
                    <!-- awal penaruhan img -->
                      <div class="signin-image">
                          <figure><img src="<?=site_url()?>assets/images/mekah-putih.jpg" width="250px" alt="sing up image"></figure>
                          <center><h4>Aplikasi Inventaris <br> Kehartabendaan dan Wakaf</h4></center>
                      </div>
                      <!-- akhir penaruhan img -->
                      <!-- awal tabel -->
                      <div class="signin-form">
                          <?php $this->view('messages'); ?>
                          <h2 class="form-title">Login</h2>
                          <form action="<?=site_url('auth/process')?>" method="POST" class="register-form" id="login-form">
                              <div class="form-group">
                                  <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                  <input type="text" name="username" id="your_name" placeholder="Username"/>
                              </div>
                              <div class="form-group">
                                  <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                  <input type="password" name="password" id="your_pass" placeholder="Password"/>
                              </div>
                              <div class="form-group form-button">
                                  <input type="submit" name="login" id="signin" class="btn btn-success" value="Masuk"/>
                              </div>
                              <div style="float:left; width:120px">
                                  <a href="<?=site_url('auth/register')?>" class="signup-image-link">Buat Akun Baru ?</a>
                              </div>
                          </form>
                      </div>
                      <!-- akhir tabel -->
                  </div>
                  <!-- akhir sign-in -->
              </div>
              <!-- akhir container -->
          </section>
          <!-- akhir login -->

        </div>
        
  </body>
</html>
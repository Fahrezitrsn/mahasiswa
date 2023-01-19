<?php
include 'koneksi.php';
require('function.php');


    if (isset($_POST["register"])) {
        

        if(registrasi($_POST)>0){
            echo "
            <script> alert('User Baru Berhasil ditambahkan');
            document.location.href='index.php';
            </script>
            ";
        }else{
        echo "<script>alert('User Baru Gagal Ditambahkan!');
            document.location.href='registrasi.php';
            </script>";
            echo mysqli_error($conn);
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
    <title></title>

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  </head>
  <body class="container">
  <div class="card" style="width: 30rem; margin: auto; margin-top: 125px">
    <form class="form-signin" method="POST" action=""> 
  <div class="text-center mb-4">
    <img class="mb-4" alt="" width="120" height="120">
    <h1 class="h3 mb-3 font-weight-normal"></h1>
    <p>Enter Your Email And Password</p>
  </div>

  <div class="form-label-group">
    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email Anda" required autofocus>
    <label>Email</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda" required>
    <label>Password</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="repassword" id="re_password"  class="form-control" placeholder="Konfirmasi Password Anda" required>
    <label>Confirm Password</label>
  </div>
  <div class="button text-center">
  <button type="submit" name="register" class="btn btn-primary mt-3">
                Sign In
            </button>
            <button type="reset" class="btn btn-danger mt-3">
                Reset
            </button>
  </div>
  </p>
  <p class="mt-5 mb-3 text-muted text-center">&copy; Chandra Nugraha 2022-<?=date('Y')?></p>
</form>
  </div>
</body>
</html>
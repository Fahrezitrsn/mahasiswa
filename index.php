<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <title>Database Akademik</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

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
    <form class="form-signin" method="POST" action="cek_login.php"> 
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal"></h1>
    <p class="fs-3">Enter Your Email And Password</p>
  </div>

  <div class="form-label-group">
    <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required autofocus>
    <label>Email</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
    <label>Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember Me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block mb-3" type="submit">Login</button>

  <p class="text-center padding-top ">Don't have an account?
    <a href="registrasi.php">Sign Up</a>
  </p>
  <p class="mt-5 mb-3 text-muted text-center">&copy; Fahrezi Tresno<?=date('Y')?></p>
</form>
  </div>
</body>
</html>

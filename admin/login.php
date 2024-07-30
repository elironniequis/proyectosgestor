<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
<body class="hold-transition ">
  <script>
    start_loader()
  </script>
  <style>
    html, body{
      height:calc(100%) !important;
      width:calc(100%) !important;
    }
    body{
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size:cover;
      background-repeat:no-repeat;
    }
    .login-title{
      text-shadow: 2px 2px black;
      color: white;
    }
    #login{
      flex-direction:column !important;
    }
    #logo-img{
        height:150px;
        width:150px;
        object-fit:scale-down;
        object-position:center center;
        border-radius:100%;
    }
    #login .col-7, #login .col-5{
      width: 100% !important;
      max-width:unset !important;
    }
    .card-custom {
      background: rgba(255, 255, 255, 0.9);
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    .card-header-custom {
      background: transparent;
      border: none;
    }
    .input-group-text-custom {
      background-color: #007bff;
      color: white;
    }
    .btn-custom {
      background-color: #007bff;
      color: white;
      border: none;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
    .link-custom {
      color: #007bff;
    }
    .link-custom:hover {
      color: #0056b3;
      text-decoration: underline;
    }
  </style>
  <div class="h-100 d-flex align-items-center w-100" id="login">
    <div class="col-7 h-100 d-flex align-items-center justify-content-center">
      <div class="w-100">
        <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="" id="logo-img"></center>
        <h1 class="text-center py-5 login-title"><b><?php echo $_settings->info('name') ?> - Admin</b></h1>
      </div>
    </div>
    <div class="col-5 h-100 bg-gradient">
      <div class="d-flex w-100 h-100 justify-content-center align-items-center">
        <div class="card col-sm-12 col-md-6 col-lg-4 card-custom rounded-0 shadow">
          <div class="card-header card-header-custom rounded-0">
            <h4 class="text-center"><b>Acceso Administrativo</b></h4>
          </div>
          <div class="card-body rounded-0">
            <form id="login-frm" action="" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" autofocus name="username" placeholder="Usuario">
                <div class="input-group-append">
                  <div class="input-group-text input-group-text-custom">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                <div class="input-group-append">
                  <div class="input-group-text input-group-text-custom">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <div class="input-group-append">
                  <button type="button" class="btn btn-secondary" onclick="togglePasswordVisibility()">
                    <span id="toggleIcon" class="fas fa-eye"></span>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <a href="<?php echo base_url ?>" class="link-custom">Ir al acceso de Emplead@</a>
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-custom btn-block btn-flat">Acceder</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })

  function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      toggleIcon.classList.remove('fa-eye');
      toggleIcon.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      toggleIcon.classList.remove('fa-eye-slash');
      toggleIcon.classList.add('fa-eye');
    }
  }
</script>
</body>
</html>
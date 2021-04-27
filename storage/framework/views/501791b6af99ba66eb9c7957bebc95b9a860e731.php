<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e(config('app.name')); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('public/dist/css/adminlte.min.css')); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Pro</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Signup a new member</p>

        <form id="RegisterForm">
          <?php echo csrf_field(); ?>
          <div class="input-group mb-3">
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
          <input type="text" name="user_mobile" id="user_mobile" class="form-control" placeholder="Mobile" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </form>

        <div class="row">
          <div class="col-12">
            <div id="response"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <button type="button" id="BtnSubmit" onclick="UserStore()" class="btn btn-primary text-white btn-block">Register</button>
          </div>
          <div class="col-6">
            <a href="<?php echo e(url('AdminLogin')); ?>" class="text-center">Login</a>
          </div>
        </div>

      </div>

      <!-- <a href="<?php echo e(url('UserStore')); ?>" class="text-center">I already have a membership</a> -->
    </div>
  </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>

  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
  $(document).ready(function() {
    $("#response").hide();
  });

  function UserStore() {

    var name = $('#user_name').val();
    var email = $('#user_email').val();
    var password = $('#user_password').val();
    var mobile = $('#user_mobile').val();

    if (name == "" || email == "" || password == "" || mobile =="") {

      $("#response").show();
      $("#response").addClass('alert alert-danger text-center').html('Please enter all fields');

      return false;

    }
    $("#BtnSubmit").prop('disabled', true);
    let base_url = "";
    $.ajax({

      type: "POST",
      url: "<?php echo e(route('User-Store')); ?>",
      data: $('#RegisterForm').serialize(),
      success: function(data) {

        // console.log(data);
        // return false;
        $("#BtnSubmit").prop('disabled', false);

        if (data['success'] == true) {

          $("#response").removeClass();
          $("#response").show();
          $("#response").addClass('alert alert-success text-center').html(data['message']);
          
          setTimeout(function() {

            window.location.href = "<?php echo e(url('AdminLogin')); ?>";

          }, 2000);

        } else {

          $("#response").removeClass();
          $("#response").show();
          $("#response").addClass('alert alert-danger text-center').html(data['message']);

          return false;

        }

      }

    });
  }
  </script>

  <!-- Bootstrap 4 -->
  <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('public/dist/js/adminlte.min.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Authentication/Register.blade.php ENDPATH**/ ?>
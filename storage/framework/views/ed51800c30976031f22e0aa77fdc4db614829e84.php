<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
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

<body class="hold-transition login-page">
<?php if(Session::get('user_id') != ''): ?>
<script>
  window.location.href = "<?php echo e(url('Dashboard')); ?>";
</script>
<?php endif; ?>

  <div class="login-box">

    <div class="login-logo"> <b>Pro</b> </div>

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Login to start your session</p>

        <form id="LoginForm">
          <?php echo csrf_field(); ?>

          <div class="input-group mb-3">
            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
            </div>
          </div>

        </form>

        <div id="response"></div>

      </div>

      <div class="card-body m-0 ">

        <div class="row">

          <div class="col-6 mx-auto">
            <button type="button" id="BtnSubmit" class="btn btn-block btn-primary text-white" onclick="LoginStore()">Login</button>
          </div>

          <div class="col-6">
						<div class="icheck-primary">
							<a href="<?php echo e(url('Register')); ?>">Signup</a>
						</div>
					</div>

        </div>

      </div>

    </div>

  </div>
  
  <script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>

  <!-- Bootstrap 4 -->
  <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('public/dist/js/adminlte.min.js')); ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>

  $(document).ready(function() {
    $("#response").hide();
  });
  
  function LoginStore() {
    // $("#BtnSubmit").prop('disabled', true);

    var email = $('#user_email').val();
    var password = $('#user_password').val();
    // console.log(email+" "+password);

    if(email == ""){
      $("#response").show();
      $("#response").addClass('alert alert-danger text-center').html('Please enter user id');
      return false;
    }
    if(password == ""){
      $("#response").show();
      $("#response").addClass('alert alert-danger text-center').html('Please enter user id');
      return false;
    }
    $("#BtnSubmit").prop('disabled', true);
    $.ajax({

      type: "POST",
      url: "<?php echo e(url('LoginAdmin')); ?>",
      data: $('#LoginForm').serialize(),
      success: function(data) {

        $("#BtnSubmit").prop('disabled', false);
        // console.log(data);
        if (data['success'] == true) {
          
          // Swal.fire({
          //   icon: 'success',
          //   title: data['message'],
          //   // text: 'Something went wrong!',
          //   // footer: '<a href>Why do I have this issue?</a>'
          // })

          // setTimeout(function() {

          //   window.location.href = "<?php echo e(url('Dashboard')); ?>";

          // }, 2000);
          $("#response").removeClass();
          $("#response").show();
          $("#response").addClass('alert alert-success text-center').html(data['message']);
          
          setTimeout(function() {

            window.location.href = "<?php echo e(url('Dashboard')); ?>";

          }, 2000);

        } 
        else {
					
          $("#response").removeClass();
          $("#response").show();
          $("#response").addClass('alert alert-danger text-center').html(data['message']);

          return false;

        }

      }

    });

  }
  </script>

</body>

</html><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Authentication/Login.blade.php ENDPATH**/ ?>
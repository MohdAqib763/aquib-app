<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aexonic Test</title>
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
<style>
    .imgcontainer {
  text-align: center;
  margin: 0px 40px 15px 0px;
  position: relative;
}

img.avatar {
  border: 1px solid lightgrey;
  padding:8px;
  cursor:pointer;
  width: 150%;
  border-radius: 50%;
}
/* enable absolute positioning */
.icons{
    position: relative;
    bottom: 32px;
    padding-left: 6px;
}
.input-field{
    padding-left:30px;

}
</style>
<body class="hold-transition" style="background:#eee;">
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#">Aexonic Technologies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
   
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?php echo e(url('/')); ?>">Register <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?php echo e(url('AdminLogin')); ?>" >Login</a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container mt-5">
    <div class="card mt-3" style="background:#ffff;">
        <div class="row justify-content-center p-5">
            <form id="UserForm" enctype="multipart/form-data">
			<?php echo csrf_field(); ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Full name</label>
                        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Name" >
                        <span class="name_error" style="display:none;color:red;">Enter your name here</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Mobile</label>
                        <input type="text" name="user_mobile" id="user_mobile" class="form-control" placeholder="Mobile"
                            maxlength="10"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                            <span class="name_error" style="display:none;color:red;">Enter your Mobile here</span>
                    </div>
                 
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Country</label>
                        <input type="text" id="country" name="country" class="form-control" placeholder="Country">
                        <span class="name_error" style="display:none;color:red;">Enter your Country here</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">State</label>
                        <input type="text" id="designation" name="state" class="form-control" placeholder="state">
                        <span class="name_error" style="display:none;color:red;">Enter your State here</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">City</label>
                        <input type="email" id="city" name="city" class="form-control" placeholder="City">
                        <span class="name_error" style="display:none;color:red;">Enter your City here</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">PinCode</label>
                        <input type="email" id="pincode" name="pincode" class="form-control" placeholder="pincode">
                        <span class="name_error" style="display:none;color:red;">Enter your Pincode here</span>
                    </div>

                 


                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email">
                        <span class="error" style="display:none;color:red;" id="invalid_email">Email-id is invalid</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputZip">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control"
                            placeholder="Password">
                            <span class="name_error" style="display:none;color:red;">Enter your Password here</span>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputZip">Profile Photo</label>
					<div class="imgcontainer">
							<label for="image">
                            <input type="file" name="image"  onchange="displayImage(this)" id="image" style="display:none;"/>
                            <img src="<?php echo e(asset('public/images/user.png')); ?>" id="ProfileDisplay" alt="Avatar" class="avatar">
                            </label>
							</div>
                    </div>
                </div>
			<div id="response"></div>
            </form>
			
         </div>
            <div class="form-group col-md-2 mx-auto">
                    <button type="button" id="BtnSubmit" onclick="UserStore()" class="btn btn-primary text-white btn-block">Register</button>
                </div>
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
	function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#ProfileDisplay').setAttribute('src',e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
    function UserStore() {

        var name = $('#user_name').val();
        var email = $('#user_email').val();
        var password = $('#user_password').val();
        var mobile = $('#user_mobile').val();

        if(name == ""){
            $('.name_error').show();
        }
        if(IsEmail(email)==false){
          $('#invalid_email').show();
          return false;
        }
        function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
                $('#invalid_email').show();
            }else{
                return true;
            }
        }
        // $("#BtnSubmit").prop('disabled', true);
		var Profile = document.getElementById('UserForm');
   		 var PicData = new FormData(Profile);



        let base_url = "";
        $.ajax({

            type: "POST",
            url: "<?php echo e(route('User-Store')); ?>",
			data: PicData,
            contentType : false,
            processData : false, 
            success: function(data) {

                // console.log(data);
                // return false;
                // $("#BtnSubmit").prop('disabled', false);

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

</html><?php /**PATH C:\xampp\htdocs\mplussoft\resources\views/Authentication/register.blade.php ENDPATH**/ ?>
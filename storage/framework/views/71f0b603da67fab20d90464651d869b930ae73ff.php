<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(url('public/plugins/summernote/summernote-bs4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('public/plugins/toastr/toastr.min.css')); ?>">

<div class="row my-3 justify-content-center">
  <div class="col-lg-12 col-md-12">
    <div class="card card-secondary">
      <div class="card-header border-transparent">
        <h3 class="card-title">Update details</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          
          </a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
    

        <form id="ProfileForm" enctype="multipart/form-data">
        <div class="form-row">       
            <div class="form-group col-md-4">
                    <label for="exampleFormControlSelect1">Account Status</label>
                    <select class="form-control" id="account_status" name="account_status">
                    <?php if($users->status == 1): ?>
                    <option value="1" selected>Active</option>
                    <option value="2">Deactivate</option>
                    <?php else: ?>
                    <option value="2" selected>Deactivated</option>
                    <option value="1" >Activate</option>
                    <?php endif; ?>
                    </select>
                </div>    
            </div> 
          <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          <input type="hidden" name="user_id" id="user_id" value="<?php echo e($users->id); ?>">
          <div class="form-group p-3" style="margin-left:31rem;">
                    <label for="inputZip">Profile Photo</label>
					<div class="imgcontainer">
							<label for="image">
                            <input type="file" name="image"  onchange="displayImage(this)" id="image" style="display:none;"/>
                            <img src="<?php echo e(asset('public/img/'.$users->picture)); ?>" id="ProfileDisplay" alt="Avatar" class="avatar">
                            </label>
							</div>
                    </div>

              
          <div class="form-row">  
                
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo e($users->name); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo e($users->email); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="email" class="form-control" id="phone" name="user_mobile" value="<?php echo e($users->phone); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="email" class="form-control" id="country" name="country" value="<?php echo e($users->country); ?>">
                </div>
            </div>
        <div class="form-row"> 
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">state</label>
                <input type="email" class="form-control" id="state" name="state" value="<?php echo e($users->state); ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">City</label>
                <input type="email" class="form-control" id="city" name="city" value="<?php echo e($users->city); ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Pincode</label>
                <input type="email" class="form-control" id="pincode" name="pincode" value="<?php echo e($users->pincode); ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" id="user_password" name="user_password" class="form-control" value="<?php echo e($users->password); ?>">
            </div>
        </div>    
        </form>

      </div>
      <!-- /.card-body -->
      <div class="card-footer text-center clearfix">
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
        <button type="button" id="BtnSubmit" onclick="ProfileUpdate()" class="btn btn-md btn-success ">Update</button>
      </div>
      <!-- /.card-footer -->
      <div id="response"></div>
    </div>
  </div>
</div>

<script src="<?php echo e(url('public/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(url('public/plugins/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(url('public/plugins/select2/js/select2.full.min.js')); ?>"></script>

<script>
$(function() {

  //Add text editor
  $('#compose-textarea').summernote();
  $('#email_to').select2({
    theme: 'bootstrap4'
  });

  $('.toastrDefaultSuccess').click(function() {
    toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  });

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

function ProfileUpdate() {

  var name = $('#user_name').val();
  var email = $('#user_email').val();
  var password = $('#user_password').val();

  // if (name == "" || email == "" || password == "") {

  //   $("#response").show();
  //   $("#response").addClass('alert alert-danger text-center').html('Please enter all fields');

  //   return false;

  // }
//   $("#BtnSubmit").prop('disabled', true);

        var Profile = document.getElementById('ProfileForm');
   		 var PicData = new FormData(Profile);
  let base_url = "";
  $.ajax({

    type: "POST",
    url: "<?php echo e(route('User-Profile-Update')); ?>",
    data: PicData,
    contentType : false,
    processData : false, 
    success: function(data) {

      console.log(data);
      $('#response').html(data);
      location.reload();
      // return false;
    //   $("#BtnSubmit").prop('disabled', false);

    //   if (data['success'] == true) {

    //     toastr.success(data['message']);

    //   } else {

    //     toastr.danger(data['message']);

    //     return false;

    //   }

    }

  });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mplussoft\resources\views/Users/Dashboard.blade.php ENDPATH**/ ?>
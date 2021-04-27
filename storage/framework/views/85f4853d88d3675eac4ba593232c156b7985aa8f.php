<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(url('public/plugins/summernote/summernote-bs4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(url('public/plugins/toastr/toastr.min.css')); ?>">

<div class="row my-3 justify-content-center">
    <div class="col-lg-8 col-md-8">
        <div class="card card-primary">
            <div class="card-header border-transparent">
                <h3 class="card-title">Update details</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                 
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form id="ProfileForm" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo e($row->admin_id); ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name"
                            value="<?php echo e($row->admin_name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="user_email" name="user_email"
                            value="<?php echo e($row->admin_email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="text" class="form-control" id="user_mobile" name="user_mobile"
                            value="<?php echo e($row->admin_mobile); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" value="">
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center clearfix">
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
                <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
                <button type="button" id="BtnSubmit" onclick="ProfileUpdate()"
                    class="btn btn-md btn-success ">Update</button>
            </div>
            <!-- /.card-footer -->
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

function ProfileUpdate() {

    var name = $('#user_name').val();
    var email = $('#user_email').val();
    var password = $('#user_password').val();

    $("#BtnSubmit").prop('disabled', true);

    let base_url = "";
    $.ajax({

        type: "POST",
        url: "<?php echo e(route('User-Profile-Update')); ?>",
        data: $('#ProfileForm').serialize(),
        success: function(data) {

            // console.log(data);
            // return false;
            $("#BtnSubmit").prop('disabled', false);

            if (data['success'] == true) {

                toastr.success(data['message']);

            } else {

                toastr.danger(data['message']);

                return false;

            }

        }

    });
}



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Admin/UserEdit.blade.php ENDPATH**/ ?>
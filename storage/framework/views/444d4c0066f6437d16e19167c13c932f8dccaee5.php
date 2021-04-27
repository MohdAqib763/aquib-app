<?php $__env->startSection('content'); ?>


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script src="<?php echo e(url('public/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(url('public/plugins/toastr/toastr.min.js')); ?>"></script>
<script src="<?php echo e(url('public/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script>
var table = '';
$(function() {
  
  $("#table_id").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "<?php echo e(url('Admin/UsersShowList')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "admin_id",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "admin_name",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "admin_email",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "admin_mobile",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "created_at",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "status",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "action",
        "searchable": true,
        "orderable": false,
      },
    ],

  });

});

function UserRemove(id) {
  var verify = confirm('Sure to remove' +id);
  if(verify == true){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post("<?php echo e(url('User-Remove')); ?>",{user_id:id},
    function(data){
      if(data['success'] == true){
        toastr.success(data['message']);
        var table = $("#table_id").dataTable();
        table.fnPageChange("first", 1);
      }else{
        toastr.error(data['message']);
      }

    });
  }

}

function Deactivate(id){
  var verify = confirm('Sure to deactivate' +id);
  if(verify == true){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.get("<?php echo e(url('User-Deactivate')); ?>",{user_id:id},
    function(data){
      if(data['success'] == true){
       
        toastr.success(data['message']);
       
      }

    });
  }

}
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Admin/Users.blade.php ENDPATH**/ ?>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
  </ol>
</nav>
<div class="row">
<div id="response"></div>
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
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
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
      url: "<?php echo e(route('user-list')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "id",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "picture",
        render:function(data){
                    var img='<img src="http://localhost/mplussoft/public/img/'+ data +'"  width:"70" height="70"/>';
                    return img;
                },
        "searchable": true,
        "orderable": false,
      },
      {
        data: "name",
        "searchable": true,
        "orderable": false,
      },

      {
        data: "email",
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

function ChangeStatus(id,status){

  // alert(id);
  var status = $('#status').val();
  var v_token = "<?php echo e(csrf_token()); ?>";
        param = {
          id:id,
          status:status
        }

          $.ajax({
        url:"<?php echo e(route('user-status')); ?>",
        type:"post",
        data:param,
        // dataType:"json",
        // contentType:"application/json charset=utf-8",
        headers: {
                    'X-CSRF-Token': v_token 
               },
        success:function(response){
        alert(response.message);
        location.reload();

        },
        failure:function(response){
          alert(response.message);
          location.reload();

        }

  });
  // alert($('#status').val());
  // return false;
  // $.ajaxSetup({
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     }
  //   });
  //   $.post("<?php echo e(url('user-status')); ?>",{id:id,user_status:user_status},
  //   function(data){
  //    console.log(data);
  //    if(data['success']){
  //      $('#response').html(data['message']);
  //     //  location.reload();
  //    }

  //   });
  
}

function UserRemove(id){
  var verify = confirm('Sure to Delete' +id);
  if(verify == true){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post("<?php echo e(url('Admin/user-delete')); ?>",{id:id},
    function(data){
     console.log(data);
     if(data['success']){
       location.reload();
     }

    });
  }

}
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mplussoft\resources\views/Admin/Dashboard.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Vendor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Vendors</li>
  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Vendor
</button>

<!-- add vendor modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Vendor details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="VendorForm">
      <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Vendor Name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Email</label>
                <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Vendor Email"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mobile</label>
                <input type="text" class="form-control" id="Mobile" name="Mobile" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <input type="text" class="form-control" id="Address" name="Address"  placeholder="Enter Vendor Address">
            </div>
        </form>
        <div id="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="AddVendor()" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-- add vendor modal end  -->

<!-- Edit vendor Modal -->
<div class="modal fade" id="EditVendor" tabindex="-1" role="dialog" aria-labelledby="EditVendor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Vendor details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="UpdateForm">
      <?php echo csrf_field(); ?>
      <input type="text" name="vendor_id" value="<?php echo e($row->vendor_id); ?>">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($row->name); ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Email</label>
                <input type="email" class="form-control" id="email" name="email"  value="<?php echo e($row->email); ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mobile</label>
                <input type="text" class="form-control" id="Mobile" name="Mobile" value="<?php echo e($row->phone); ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <input type="text" class="form-control" id="Address" name="Address"  value="<?php echo e($row->address); ?>">
            </div>
        </form>
        <div id="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateVendor()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit vendor Modal end -->
            
          <!-- /.card-body -->
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Vendor List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Vendor Name</th>
                <th>Vendor Email</th>
                <th>Vendor Phone</th>
                <th>Vendor Address</th>
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
      url: "<?php echo e(url('Admin/getVendors')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "vendor_id",
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
        data: "phone",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "address",
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

 


function AddVendor(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('insert-vendor')); ?>",
		data:$('#VendorForm').serialize(),
		// dataType:'json',
		success:function(data){
			console.log(data);
			$('#response').html(data);
			if(data.includes('Added')){
				window.location.reload();
			}
		}
	});
}

function UpdateVendor(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('Update-vendor')); ?>",
		data:$('#UpdateForm').serialize(),
		// dataType:'json',
		success:function(data){
			console.log(data);
			$('#response').html(data);
			if(data.includes('Updated')){
				window.location.reload();
			}
		}
	});
}




</script>		  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Vendor/vendor.blade.php ENDPATH**/ ?>
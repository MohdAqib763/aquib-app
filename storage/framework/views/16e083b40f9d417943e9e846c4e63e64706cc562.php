<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Invoice</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Tax</li>
  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add Tax
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="TaxForm">
      <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Enter Tax Value %</label>
                <input type="number" class="form-control" id="tax" name="tax" placeholder="Enter Tax value">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="AddTax()" class="btn btn-primary">Save</button>
        <div id="response"></div>
      </div>
    </div>
  </div>
</div>

<!-- edit tax modal  -->
<div class="modal fade" id="taxModal" tabindex="-1" role="dialog" aria-labelledby="taxModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taxModal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="TaxBody">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateTax()" class="btn btn-primary">Save</button>
        <div id="response"></div>
      </div>
    </div>
  </div>
</div>
<!-- edit tax modal  -->



<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Invoices List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tax %</th>
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
      url: "<?php echo e(url('Admin/get-taxes')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "tax_id",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "percentage",
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


function AddTax(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('add-tax')); ?>",
		data:$('#TaxForm').serialize(),
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

function EditTax(id){
   $.get('<?php echo e(url("edit-tax")); ?>',{id:id},function(data){
    console.log(data);
    $('#TaxBody').html(data);
   });
 }

 function UpdateTax(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('update-tax')); ?>",
		data:$('#UpdateTaxForm').serialize(),
		success:function(data){
			console.log(data);
			$('#response').html(data);
			if(data.includes('Updated')){
				window.location.reload();
			}
		}
	});
}

function TaxRemove(id){
  var verify = confirm('Sure to Delete' +id);
  if(verify == true){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post("<?php echo e(url('tax-delete')); ?>",{id:id},
    function(data){
     console.log(data);
     location.reload();

    });
  }

}           
        


</script>		  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kalash\resources\views/Tax/tax.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inventory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Inventory</li>
  </ol>
</nav>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Inventory List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Vendor</th>
                <th>Stock IN</th>
                <th>Stock Out</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Entry By</th>
                <th>Date</th>
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
      url: "<?php echo e(url('Admin/GetInventory')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "inventory_id",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "category_name",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "product_name",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "name",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "stock_in",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "stock_out",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "quantity",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "price",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "entry_by",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "entry_date",
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

 


function AddProduct(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('insert-product')); ?>",
		data:$('#ProductForm').serialize(),
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

function RemoveInven(id){
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
     });
      var verify = confirm('Sure you want to remove the Inventory '+id);
       if(verify == true){
        $.post("<?php echo e(url('RemoveInventory')); ?>",{id:id},function(data){
          console.log(data);
              if(data.includes('deleted')){
                location.reload();  
              }
          });
       }
}


</script>		  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kailash\resources\views/Inventory/InventoryList.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Products</li>
  </ol>
</nav>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="ProductForm">
      <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select class="form-control" id="category" name="category">
                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat->category_id); ?>"><?php echo e($cat->category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Product Details</label>
                <input type="text" class="form-control" id="details" name="details"  placeholder="Enter Product Details"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" rows="3" placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty"  placeholder="Enter Product Quantity">
            </div>
        </form>
        <div id="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="AddProduct()" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Category">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="Category" tabindex="-1" role="dialog" aria-labelledby="Category" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="CatForm">
      <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Category Name</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category">
            </div>
        </form>
        <div id="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="AddCat()" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
            
          <!-- /.card-body -->
<!-- Edit product Modal -->
<div class="modal fade" id="EditProduct" tabindex="-1" role="dialog" aria-labelledby="EditProduct" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="UpdateProductbody">
      
        <div id="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="UpdateProduct()" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit product Modal end-->
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
                <th>Category</th>
                <th>Product Name</th>
                <th>Details</th>
                <th>Price</th>
                <th>Quantity</th>
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
      url: "<?php echo e(url('Admin/getProducts')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "product_id",
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
        data: "product_details",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "product_price",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "quantity",
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

 function EditProduct(id){
   $.get('<?php echo e(url("Get-product")); ?>',{id:id},function(data){
    console.log(data);
    $('#UpdateProductbody').html(data);
   });
 }


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

function AddCat(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('insert-category')); ?>",
		data:$('#CatForm').serialize(),
		success:function(data){
			console.log(data);
			$('#response').html(data);
			if(data.includes('Added')){
				window.location.reload();
			}
		}
	});
}

function UpdateProduct(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('update-product')); ?>",
		data:$('#UpdateProductForm').serialize(),
		success:function(data){
			console.log(data);
			$('#response').html(data);
			if(data.includes('Updated')){
				window.location.reload();
			}
		}
	});
}

function RemoveProduct(id){
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
     });
      var verify = confirm('Sure you want to remove the Product '+id);
       if(verify == true){
        $.post("<?php echo e(url('Remove-Product')); ?>",{id:id},function(data){
          console.log(data);
              if(data.includes('deleted')){
                location.reload();  
              }
          });
       }
}

</script>		  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kailash\resources\views/Product/product.blade.php ENDPATH**/ ?>
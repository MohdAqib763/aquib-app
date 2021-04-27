<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inventory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Inventroy</li>
  </ol>
</nav>
<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Create Inventroy</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
		  <form id="InventoryForm">
		<?php echo csrf_field(); ?>
		   <div class="form-row">
		   			<div class="form-group col-md-4">
						<label for="inputZip">Select Category</label>
                        <select class="form-control" id="category" name="category">
						<option selected disabled>Select Category</option>
                           <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($category->category_id); ?>"> <?php echo e($category->category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Select Product</label>
                        <select class="form-control" id="product" name="product">
                        <option selected disabled>Select Product</option>
						<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($items->product_id); ?>"> <?php echo e($items->product_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Select Vendor</label>
                        <select class="form-control" id="vendor" name="vendor">
                        <option selected disabled>Select Vendor</option>
						<?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($vendors->vendor_id); ?>"> <?php echo e($vendors->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Stock In</label>
						<input type="text" class="form-control" id="stock_in" name="stock_in" >
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Stock Out</label>
						<input type="text" class="form-control" id="stock_out" name="stock_out">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Quantity</label>
						<input type="text" class="form-control" id="qty" name="qty">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Price</label>
						<input type="text" class="form-control" id="price" name="price">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Entry By</label>
						<input type="text" class="form-control" id="entry_by" name="entry_by">
					</div>
			 </div>		
		 </form>
			<button type="button" onclick="InsertInventory()"  class="btn btn-primary">Submit</button>
	
			
				<div id="response"></div>
				
            <!-- /.row -->
		</div>
		
</div>
            
          <!-- /.card-body -->
<script>


function InsertInventory(){
	var cat = $('#category').val();
	var product = $('#product').val();
	var vendor = $('#vendor').val();
	var stockIn = $('#stock_in').val();
	var stockOut = $('#stock_out').val();
	var Qty = $('#qty').val();
	var price = $('#price').val();
	var entry = $('#entry_by').val();
	if(cat == "" || product=="" || vendor=="" || stockIn=="" || stockOut=="" || Qty=="" || price=="" || entry==""){
		alert('Please Enter all fields');
		return false;
	}

	$.ajax({
		type:"post",
		url:"<?php echo e(url('insert-stock')); ?>",
		data:$('#InventoryForm').serialize(),
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


</script>		  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kailash\resources\views/Inventory/inventory.blade.php ENDPATH**/ ?>
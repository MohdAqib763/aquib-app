<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Inventory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Inventroy</li>
  </ol>
</nav>
<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Inventroy</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
		  <form id="UpdateInventoryForm">
		<?php echo csrf_field(); ?>
        <input type="hidden" name="inventory_id" value="<?php echo e($row->inventory_id); ?>"> 
		   <div class="form-row">
		   			<div class="form-group col-md-4">
						<label for="inputZip">Select Category</label>
                        <select class="form-control" id="category" name="category">
                           <option value="<?php echo e($row->category_id); ?>"> <?php echo e($row->category_name); ?></option>   
                        </select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Select Product</label>
                        <select class="form-control" id="product" name="product">
                             <option value="<?php echo e($row->product_id); ?>"> <?php echo e($row->product_name); ?></option>
                        </select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Select Vendor</label>
                        <select class="form-control" id="vendor" name="vendor">
                           <option value="<?php echo e($row->vendor_id); ?>"> <?php echo e($row->name); ?></option>  
                        </select>
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Stock In</label>
						<input type="text" class="form-control" id="stock_in" name="stock_in" value="<?php echo e($row->stock_in); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Stock Out</label>
						<input type="text" class="form-control" id="stock_out" name="stock_out" value="<?php echo e($row->stock_out); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Quantity</label>
						<input type="text" class="form-control" id="qty" name="qty" value="<?php echo e($row->quantity); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Price</label>
						<input type="text" class="form-control" id="price" name="price" value="<?php echo e($row->price); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Entry By</label>
						<input type="text" class="form-control" id="entry_by" name="entry_by" value="<?php echo e($row->entry_by); ?>">
					</div>
			 </div>		
		 </form>
			<button type="button" onclick="UpdateInventory()"  class="btn btn-primary">Update</button>
	
			
				<div id="response"></div>
				
            <!-- /.row -->
		</div>
		
</div>
            
          <!-- /.card-body -->
<script>


function UpdateInventory(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('update-stock')); ?>",
		data:$('#UpdateInventoryForm').serialize(),
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Inventory/Edit-inventory.blade.php ENDPATH**/ ?>
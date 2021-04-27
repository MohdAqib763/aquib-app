<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Quotation</a></li>
    <li class="breadcrumb-item"><a href="#">Quotation List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Quotation</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
		<form id="QuoteForm">
		<?php echo csrf_field(); ?>
        <input type="text" name="quote_id" value="<?php echo e($row->quote_id); ?>">
		   <div class="form-row">
		   		<div class="col-md-6">
		   			<div class="form-group col-md-4">
						<label for="inputZip">Quotation No.</label>
						<input type="number" class="form-control" id="quote_no" name="quote_no" value="<?php echo e($row->quote_no); ?>">
					</div>
		  		 </div>	
		   		<div class="col-md-6">
					<div class="form-group col-md-4">
						<label for="inputZip">Date:</label>
						<input type="date" class="form-control" id="quote_date" name="quote_date" value="<?php echo e($row->date); ?>">
					</div>
		  		 </div>	
			 </div>		
             <h3>Customer Details</h3>
				<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputEmail4">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?php echo e($row->party_name); ?>" >
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Address</label>
							<textarea type="text" class="form-control" id="address" name="address" value="<?php echo e($row->address); ?>"></textarea>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">City</label>
							<input type="text" class="form-control" id="city" name="city" value="<?php echo e($row->city); ?>">
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">State</label>
							<input type="text" class="form-control" id="State" name="State" value="<?php echo e($row->state); ?>">
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">Phone</label>
							<input type="text" class="form-control" id="phone" name="phone" value="<?php echo e($row->phone); ?>">
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">GSTIN</label>
							<input type="text" class="form-control" id="gst" name="gst" value="<?php echo e($row->gstin); ?>">
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4">PAN No.</label>
							<input type="text" class="form-control" id="pan" name="pan" value="<?php echo e($row->pan_no); ?>">
						</div>
							
				</div>
				<h3>Add Items:</h3>
          	<table class="table">
                <thead>
               
                     <tr>
						<th scope="col">Item</th>
						<th scope="col">HSN Code</th>
						<th scope="col">UOM</th>
						<th scope="col">Quantity</th>
						<th scope="col">Rate</th>
						<th scope="col">Amount</th>
						<th scope="col">Discount</th>
						<th scope="col">Taxable Value</th>
						<!-- <th scope="col"><button id="add-button" type="button" class="btn  btn-sm btn-info"><i class="fas fa-plus"></i></button></th> -->
                    </tr>
                   
                </thead>
                <tbody>
                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="text" name="item_id[]" value="<?php echo e($product->item_id); ?>">
                    <tr>
						<th scope="row"><input type="text" class="form-control" id="item_name" name="item_name[]" value="<?php echo e($product->item_name); ?>"></th>
						<td><input type="text" class="form-control" id="hsn_code" name="hsn_code[]" value="<?php echo e($product->hsn_code); ?>"></td>
						<td><input type="text" class="form-control" id="uom" name="uom[]" value="<?php echo e($product->uom); ?>"></td>
						<td><input type="text" class="form-control" id="quantity" name="quantity[]" value="<?php echo e($product->quantity); ?>"></td>
						<td><input type="text" class="form-control" id="rate" name="rate[]" value="<?php echo e($product->rate); ?>"></td>
						<td><input type="text" class="form-control" id="amount" name="amount[]" value="<?php echo e($product->amount); ?>"></td>
						<td><input type="text" class="form-control" id="discount" name="discount[]" value="<?php echo e($product->discount); ?>"></td>
						<td><input type="text" class="form-control" id="tax_value" name="tax_value[]" value="<?php echo e($product->taxable_value); ?>"></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
         </table>
				
			</form>
			<button type="button" onclick="UpdateQuote()"  class="btn btn-primary">Update</button>
	
			</div>
				<div id="response"></div>
				
            <!-- /.row -->
		</div>
</div>
            
          <!-- /.card-body -->
<script>
$(document).ready(function() {
	$('#add-button').click(function(){
	 var tr = ' <tr>'+
	 			'<th scope="row"><input type="text" class="form-control" id="item_name" name="item_name[]"></th>'+
						'<td><input type="text" class="form-control" id="hsn_code" name="hsn_code[]"></td>'+
						'<td><input type="text" class="form-control" id="uom" name="uom[]"></td>'+
						'<td><input type="text" class="form-control" id="quantity" name="quantity[]"></td>'+
						'<td><input type="text" class="form-control" id="rate" name="rate[]"></td>'+
						'<td><input type="text" class="form-control" id="amount" name="amount[]"></td>'+
						'<td><input type="text" class="form-control" id="discount" name="discount[]"></td>'+
						'<td><input type="text" class="form-control" id="tax_value" name="tax_value[]"></td>'+
						'<td><a href="javascritp:;" class="bt btn-sm btn-danger deleteRow">X</a></td>'+
						
                    '</tr>';

					$('tbody').append(tr);
					$('tbody').on('click','.deleteRow',function(){
						$(this).parent().parent().remove();
					});
 });
});	

function UpdateQuote(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('update-quote')); ?>",
		data:$('#QuoteForm').serialize(),
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Admin/Edit-quote.blade.php ENDPATH**/ ?>
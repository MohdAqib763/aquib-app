<?php $__env->startSection('content'); ?>
<div class="card card-default">
          <div class="card-header">
            <h2 class="card-title">Edit Tax Invoice</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
		<form id="UpdateInvoiceForm">
		<?php echo csrf_field(); ?>
        <input type="hidden" name="invoice_id" value="<?php echo e($row->invoice_id); ?>">
		   <div class="form-row">
		   		<div class="col-md-6">
		   			<div class="form-group col-md-4">
						<label for="inputZip">Invoice No.</label>
						<input type="number" class="form-control" id="inoice_no" name="inoice_no" value="<?php echo e($row->invoice_nuumber); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Date</label>
						<input type="date" class="form-control" id="date" name="date" value="<?php echo e($row->date); ?>" >
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">Reverse Charge</label>
						<input type="text" class="form-control" id="reverse" name="reverse" value="<?php echo e($row->reverse_charge); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">State</label>
						<input type="text" class="form-control" id="state" name="state" value="<?php echo e($row->state); ?>">
					</div>
		  		 </div>	
		   		<div class="col-md-6">
		   			<div class="form-group col-md-4">
						<label for="inputZip">PO NO:</label>
						<input type="number" class="form-control" id="po_no" name="po_no" value="<?php echo e($row->po_number); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">PO Date:</label>
						<input type="date" class="form-control" id="po_date" name="po_date" value="<?php echo e($row->po_date); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">DC NO:</label>
						<input type="text" class="form-control" id="dc_no" name="dc_no" value="<?php echo e($row->dc_no); ?>">
					</div>
					<div class="form-group col-md-4">
						<label for="inputZip">DC Date</label>
						<input type="date" class="form-control" id="dc_date" name="dc_date" value="<?php echo e($row->dc_date); ?>">
					</div>
		  		 </div>	
			 </div>		
				<div class="form-row">
					<div class="col-md-6">
					<h3>Bill To Party</h3>
						<div class="form-group col-md-6">
							<label for="inputEmail4">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?php echo e($bParty->name); ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Address</label>
							<textarea type="text" class="form-control" id="address" name="address" value="<?php echo e($bParty->address); ?>"></textarea>
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">GSTIN</label>
							<input type="text" class="form-control" id="gst" name="gst" value="<?php echo e($bParty->gstin); ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">State</label>
							<input type="text" class="form-control" id="state" name="state" value="<?php echo e($bParty->state); ?>">
						</div>
					</div>	
					<div class="col-md-6">
					<h3>Ship To Party</h3>
						<div class="form-group col-md-6">
							<label for="inputEmail4">Name</label>
							<input type="text" class="form-control" id="ship_name" name="ship_name" value="<?php echo e($sParty->name); ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Address</label>
							<textarea type="text" class="form-control" id="ship_address" name="ship_address" value="<?php echo e($sParty->address); ?>"></textarea>
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">GSTIN</label>
							<input type="text" class="form-control" id="ship_gst" name="ship_gst" value="<?php echo e($sParty->gstin); ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">State</label>
							<input type="text" class="form-control" id="ship_state" name="ship_state" value="<?php echo e($sParty->state); ?>">
						</div>
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
                <input type="hidden" name="id[]" value="<?php echo e($product->item_id); ?>">
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
			<button type="button" onclick="UpdateInvoice()"  class="btn btn-primary">Submit</button>
	
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

function UpdateInvoice(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('update-invoice')); ?>",
		data:$('#UpdateInvoiceForm').serialize(),
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Admin/Edit-invoice.blade.php ENDPATH**/ ?>
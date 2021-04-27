<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">View Expense</a></li>
    <li class="breadcrumb-item"><a href="#">Expense List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Expenses</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
		  <form id="ExpenseForm">
		<?php echo csrf_field(); ?>
        <input type="hidden" name="employee_id" value="<?php echo e($data->employee_id); ?>">
		   <div class="form-row">
		   			<div class="form-group col-md-6">
						<label for="inputZip">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="<?php echo e($data->name); ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="inputZip">Employee Id</label>
						<input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php echo e($data->department); ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="inputZip">Department</label>
						<input type="text" class="form-control" id="dept" name="dept" value="<?php echo e($data->designation); ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="inputZip">Designation</label>
						<input type="text" class="form-control" id="design" name="design" value="<?php echo e($data->emp_id); ?>">
					</div>
			 </div>		
			<h3>Add Details:</h3>
          	<table class="table">
                <thead>
                     <tr>
						<th scope="col">Date</th>
						<th scope="col">Description</th>
						<th scope="col">Air/Fare</th>
						<th scope="col">Lodging</th>
						<th scope="col">Fuel/Fare</th>
						<th scope="col">Meal</th>
						<th scope="col">Other</th>
						<th scope="col">Total</th>
						<!-- <th scope="col"><button id="add-button" type="button" class="btn  btn-sm btn-info"><i class="fas fa-plus"></i></button></th> -->
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" name="expense_id[]" value="<?php echo e($item->expense_id); ?>">
                    <tr>
						<th scope="row"><input type="date" class="form-control" id="date" name="date[]" value="<?php echo e($item->date); ?>"></th>
						<td><input type="text" class="form-control" id="desc" name="desc[]" value="<?php echo e($item->description); ?>"></td>
						<td><input type="text" class="form-control" id="air_fare" name="air_fare[]" value="<?php echo e($item->air_travel); ?>"></td>
						<td><input type="text" class="form-control" id="lodging" name="lodging[]" value="<?php echo e($item->lodging); ?>"></td>
						<td><input type="text" class="form-control" id="fuel_fare" name="fuel_fare[]" value="<?php echo e($item->fuel); ?>"></td>
						<td><input type="text" class="form-control" id="meal" name="meal[]" value="<?php echo e($item->meal); ?>"></td>
						<td><input type="text" class="form-control" id="other" name="other[]" value="<?php echo e($item->other); ?>"></td>
						<td><input type="text" class="form-control" id="other" name="total[]" value="<?php echo e($item->total); ?>"></td>
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
         </table>
		 </form>
			<button type="button" onclick="UpdateExpense()"  class="btn btn-primary">Update</button>
	
			
				<div id="response"></div>
				
            <!-- /.row -->
		</div>
		
</div>
            
          <!-- /.card-body -->
<script>
$(document).ready(function(){
 
 $('#add-button').click(function(){
	 var tr = ' <tr>'+
						'<th scope="row"><input type="date" class="form-control" id="date" name="date[]"></th>'+
						'<td><input type="text" class="form-control" id="desc" name="desc[]"></td>'+
						'<td><input type="text" class="form-control" id="air_fare" name="air_fare[]"></td>'+
						'<td><input type="text" class="form-control" id="lodging" name="lodging[]"></td>'+
						'<td><input type="text" class="form-control" id="fuel_fare" name="fuel_fare[]"></td>'+
						'<td><input type="text" class="form-control" id="meal" name="meal[]"></td>'+
						'<td><input type="text" class="form-control" id="other" name="other[]"></td>'+
						'<td><input type="text" class="form-control" id="other" name="total[]"></td>'+
                    '</tr>';

					$('tbody').append(tr);
					$('tbody').on('click','.deleteRow',function(){
						$(this).parent().parent().remove();
					});
 }); 

});

function UpdateExpense(){
	$.ajax({
		type:"post",
		url:"<?php echo e(url('update-expense')); ?>",
		data:$('#ExpenseForm').serialize(),
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Admin/Edit-expense.blade.php ENDPATH**/ ?>
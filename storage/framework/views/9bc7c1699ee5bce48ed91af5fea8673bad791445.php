<form id="UpdateTaxForm">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="tax_id" value="<?php echo e($row->tax_id); ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Enter Tax Value %</label>
                <input type="number" class="form-control" id="tax" name="tax" value="<?php echo e($row->percentage); ?>">
            </div>
        </form><?php /**PATH C:\xampp\htdocs\Kailash\resources\views/Tax/UpdateTax.blade.php ENDPATH**/ ?>
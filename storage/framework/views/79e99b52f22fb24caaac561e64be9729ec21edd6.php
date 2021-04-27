<form id="UpdateProductForm">
      <?php echo csrf_field(); ?>
      <input type="text" name="product_id" value="<?php echo e($row->product_id); ?>">
            <div class="form-group">
                <label for="exampleFormControlInput1">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($row->product_name); ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select class="form-control" id="category" name="category">
                <option value="<?php echo e($row->category_id); ?>"><?php echo e($row->category_name); ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Product Details</label>
                <input class="form-control" id="details" name="details" rows="3" value="<?php echo e($row->product_details); ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" rows="3"value="<?php echo e($row->product_price); ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty"  value="<?php echo e($row->quantity); ?>">
            </div>
        </form><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Product/UpdateProduct.blade.php ENDPATH**/ ?>
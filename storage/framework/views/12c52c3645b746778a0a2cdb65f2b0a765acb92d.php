<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Expenses</title>
    <link rel="stylesheet" href="<?php echo e(url('public/css/Invoice.css')); ?>" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body class="mx-auto">
    <header class="clearfix">
      <h1>Expenses</h1>
      <div class="row">
        <div class="col-md-6">
          <h3>NAME: <span><?php echo e($row->name); ?></span></h3>
          <h3>DEPARTMENT: <span> <?php echo e($row->department); ?></span> </h3>
        </div>
        <div class="col-md-6">
          <h3>DESIGNATION: <span>  <?php echo e($row->designation); ?></span></h3>
          <h3>EMP ID: <span><?php echo e($row->emp_id); ?> </span></h3>
        </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">DATE</th>
            <th class="desc">DESCRIPTION</th>
            <th>AIR/FARE</th>
            <th>LODGE</th>
            <th>FUEL</th>
            <th>MEAL</th>
            <th>OTHER</th>   
            <th>TOTAL</th>     
          </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="service"><?php echo e($row->date); ?></td>
            <td class="desc"><?php echo e($row->description); ?></td>
            <td class="unit"><?php echo e($row->air_travel); ?></td>
            <td class="qty"><?php echo e($row->lodging); ?></td>
            <td class="total"><?php echo e($row->fuel); ?></td>
            <td class="total"><?php echo e($row->meal); ?></td>
            <td class="total"><?php echo e($row->other); ?></td>
            <td class="total"><?php echo e($row->total); ?></td>
          </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>
      <div class="row text-center pt-3">
        <div class="col-md-6">
         <h4>SUBTOTAL : <span> <?php echo e($total->grand_total); ?></span></h4>
        </div>
        <div class="col-md-6">
         <h4>GRAND TOTAL : <span> <?php echo e($total->grand_total); ?></span></h4>
        </div>
       
      </div>
    </main>
    <button class="btn btn-info d-print-none" onclick="window.print()">Print</button>
    <footer>
   
    </footer>
  </body>
</html><?php /**PATH C:\xampp\htdocs\Kalash\resources\views/Admin/PrintExpense.blade.php ENDPATH**/ ?>
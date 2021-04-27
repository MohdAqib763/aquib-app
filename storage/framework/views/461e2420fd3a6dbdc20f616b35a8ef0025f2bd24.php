<?php $__env->startSection('content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Invoice</a></li>
    <li class="breadcrumb-item"><a href="#">Invoice List</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
  </ol>
</nav>

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
                <th>Invoice No.</th>
                <th>Date</th>
                <th>State</th>
                <th>PO.Number</th>
                <th>PO.Date</th>
                <th>DC. No</th>
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
      url: "<?php echo e(url('Admin/GetInvoice')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "invoice_id",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "invoice_nuumber",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "date",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "state",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "po_number",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "po_date",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "dc_no",
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

function UserRemove(id) {
  var verify = confirm('Sure to remove' +id);
  if(verify == true){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post("<?php echo e(url('User-Remove')); ?>",{user_id:id},
    function(data){
      if(data['success'] == true){
        toastr.success(data['message']);
        var table = $("#table_id").dataTable();
        table.fnPageChange("first", 1);
      }else{
        toastr.error(data['message']);
      }

    });
  }

}

function Deactivate(id){
  var verify = confirm('Sure to deactivate' +id);
  if(verify == true){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.get("<?php echo e(url('User-Deactivate')); ?>",{user_id:id},
    function(data){
      if(data['success'] == true){
       
        toastr.success(data['message']);
       
      }

    });
  }

}
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\testProject\resources\views/Admin/InvoiceList.blade.php ENDPATH**/ ?>
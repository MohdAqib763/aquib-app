<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Quotation</a></li>
    <li class="breadcrumb-item"><a href="#">Quotation List</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
  </ol>
</nav>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Quotation List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Quotation No.</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Phone</th>
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
      url: "<?php echo e(url('Admin/GetQuotation')); ?>",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "quote_id",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "date",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "quote_no",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "party_name",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "address",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "city",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "state",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "phone",
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


function QuoteDelete(id){
  var verify = confirm('Sure to Delete' +id);
  if(verify == true){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post("<?php echo e(url('Quote-delete')); ?>",{id:id},
    function(data){
     console.log(data);
     location.reload();

    });
  }

}

</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Kailash\resources\views/Admin/QuoteList.blade.php ENDPATH**/ ?>
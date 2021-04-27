@extends('Layout')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Expense</a></li>
    <li class="breadcrumb-item"><a href="#">View Expense</a></li>
    <li class="breadcrumb-item active" aria-current="page">List</li>
  </ol>
</nav>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Expenses List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Description</th>
                <th>Air/Fare</th>
                <th>Lodging</th>
                <th>Fuel/Fare</th>
                <th>Meal</th>
                <th>Other</th>
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

<script src="{{url('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{url('public/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('public/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
var table = '';
$(function() {
  
  $("#table_id").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{url('Admin/ExpenseShow')}}",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "expense_id",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "date",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "description",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "air_travel",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "lodging",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "fuel",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "meal",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "other",
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



function DeleteExpense(id){
  var verify = confirm('Sure to Delete' +id);
  if(verify == true){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post("{{url('Expense-Delete')}}",{id:id},
    function(data){
     console.log(data);
     if(data.includes('Deleted')){
       location.reload();
     }

    });
  }

}
</script>
@endsection 
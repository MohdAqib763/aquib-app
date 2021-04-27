@extends('Layout')

@section('content')

<link rel="stylesheet" href="{{url('public/plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{url('public/plugins/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<!-- <div class="content-wrapper"> -->
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Compose</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Compose</li>
        </ol>
      </div>
    </div>
  </div>
</section> -->

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sent Messages</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="table_id" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>To</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Time</th>
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
<!-- /.content -->
</div>

<!-- <section class="content my-2">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Collapse</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item active">
                <a href="#" class="nav-link">
                  <i class="fas fa-inbox"></i> Inbox
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-envelope"></i> Sent
                </a>
              </li>
            </ul>
          </div>
        </div>

      </div>
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Compose New Message</h3>
          </div>
          <div class="card-body">
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section> -->

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
      url: "{{route('Message-Sent-Show')}}",
      // data: {
      //   from_date: from_date,
      //   to_date: to_date
      // }
    },
    columns: [
      {
        data: "email_from",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "email_subject",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "email_text",
        "searchable": true,
        "orderable": false,
      },
      {
        data: "created_at",
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

function MessageSentRemove(email_id) {
  var verify = confirm('Sure to remove');
  if(verify == true){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post("{{route('Message-Sent-Remove')}}",{email_id:email_id},
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

</script>

@endsection
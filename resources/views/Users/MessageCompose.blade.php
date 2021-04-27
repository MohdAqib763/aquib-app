@extends('Layout')

@section('content')

<link rel="stylesheet" href="{{url('public/plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{url('public/plugins/toastr/toastr.min.css')}}">

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

<!-- Main content -->
<section class="content my-2">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- <div class="col-md-3">
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
                  <span class="badge bg-primary float-right">{{$emails_unread}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-envelope"></i> Sent
                </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">65</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li>
            </ul>
          </div>
        </div>

      </div> -->
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Compose New Message</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form id="MessageForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="user_id" id="user_id" value="{{ Session::get('user_id') }}">
              <div class="form-group">
                <select class="form-control" name="email_to" id="email_to">
                  <option selected disabled>To:</option>
                  @foreach($users as $user)
                    <option value="{{$user->admin_id}}">{{$user->admin_name}}</option>
                  @endforeach
                </select>
                <!-- <input class="form-control" id="email_to" name="email_to" placeholder="To:"> -->
              </div>
              <div class="form-group">
                <input class="form-control" id="email_subject" name="email_subject" placeholder="Subject:">
              </div>
              <div class="form-group">
                <textarea  id="email_text" name="email_text" class="form-control" style="height: 200px">
              </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fas fa-paperclip"></i> Attachment
                  <input type="file" class="form-control" id="email_file" name="email_file[]" multiple>
                </div>
                <p id="filename"></p>

                <!-- <p class="help-block">Max. 32MB</p> -->
              </div>
            </form>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="float-right">
              <!-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> -->
              <button type="button" id="BtnSubmit" onclick="SendMessage()" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
            </div>
            <!-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> -->
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- </div> -->

<script src="{{url('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{url('public/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('public/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
$(function() {

  $('input[type="file"]').change(function(e){
            var Size = e.target.files[0].size;
            var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
            	i=0;while(Size>900){Size/=1024;i++;}
              var exactSize = (Math.round(Size*100)/100)+' '+fSExt[i];
              for(var i = 0 ; i < this.files.length ; i++){
                  var fileName = this.files[i].name;
                  $('#filename').append('<div class="name">' + fileName + '</div>');
                }
            // var file = Math.round((Size/1024));  
            // if(Size > 30 ){
            //   alert('file size exceeds');
            // }
            // console.log(Size);
          
            
        });

  //Add text editor
  $('#compose-textarea').summernote();
  $('#email_to').select2({
    theme: 'bootstrap4'
  });

  $('.toastrDefaultSuccess').click(function() {
    toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
  });

  
});


function SendMessage() {
  var email_to = $('#email_to').val();
  var email_subject = $('#email_subject').val();
  var email_text = $('#email_text').val();
  var email_file = $('#email_file').val();
  

  if (email_to == "") {
    
    toastr.error('Please specify recipient');

    return false;
    
  }
  if (email_subject == "" ) {
    
    toastr.warning('Please mention subject');
    // $(document).Toasts('create', {
    //   title: 'Toast Title',
    //   position: 'topLeft',
    //   body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    // })

    return false;

  }

  $("#BtnSubmit").prop('disabled', true);

  let form_data = document.getElementById("MessageForm");
  let new_data = new FormData(form_data);
  $.ajax({

    type: "POST",
    url: "{{ route('Message-Send') }}",
    // data: $('#MessageForm').serialize(),
    data: new_data,
    processData: false,
    contentType: false,
    error: function(jqXHR, textStatus, errorThrown) {
      $("#BtnSubmit").prop('disabled', false);
      // Swal.fire({
      //   icon: 'error',
      //   title: errorThrown,
      // })
      toastr.warning(errorThrown);
      // console.log(jqXHR.status);
      // console.log(textStatus);
      // console.log(errorThrown);
    },
    success: function(data) {

      console.log(data);
    
      $("#BtnSubmit").prop('disabled', false);

      if (data['success'] == true) {

        toastr.success(data['message']);
        $( '#MessageForm' ).each(function(){
            this.reset();
        });

      } else {

        toastr.warning(data['message']);

        return false;

      }

    }

  });
}
</script>

@endsection
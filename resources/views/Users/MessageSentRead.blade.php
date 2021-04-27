@extends('Layout')

@section('content')

<link rel="stylesheet" href="{{url('public/plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{url('public/plugins/toastr/toastr.min.css')}}">

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sent Message</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
          <!-- <li class="breadcrumb-item active">Sent</li> -->
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="row justify-content-center">

  <div class="col-md-10">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Sent Mail</h3>

        <!-- <div class="card-tools">
          <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i
              class="fas fa-chevron-left"></i></a>
          <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
        </div> -->
      </div>
      <div class="card-body p-0">
        <div class="mailbox-read-info">
          <h6>To: {{$email[0]->user_email ?? ""}}
            <!-- <span class="mailbox-read-time float-right">{{$email[0]->created_at ?? ""}}</span> -->
          </h6>
          <h5>{{$email[0]->email_subject ?? ""}}</h5>
        </div>
        <!-- <div class="mailbox-controls with-border text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body"
              title="Delete">
              <i class="far fa-trash-alt"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body"
              title="Reply">
              <i class="fas fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body"
              title="Forward">
              <i class="fas fa-share"></i></button>
          </div>
          <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
            <i class="fas fa-print"></i></button>
        </div> -->
        <div class="mailbox-read-message mx-4">
          <p>{{$email[0]->email_text ?? ""}}</p>

          <!-- <p>Keffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird
            on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical
            master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack
            gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon
            asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu
            blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American
            Apparel.</p> -->

          <!-- <p>Thanks,<br>Jane</p> -->
        </div>
      </div>
      <div class="card-footer bg-white">
        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
        @foreach($attachments as $row)
              <li>
                <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>
                
                <div class="mailbox-attachment-info">
                  <a href="{{url('public/Users/Attachments/')}}/{{$row->file_name}}" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i>
                  {{$row->file_name}}</a>
                  <span class="mailbox-attachment-size clearfix mt-1">
                    <!-- <span>1,245 KB</span> -->
                    <a href="{{url('public/Users/Attachments/')}}/{{$row->file_name}}" target="_blank" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                  </span>
                </div>
              </li>
            @endforeach
          <!-- <li>
            <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

            <div class="mailbox-attachment-info">
              <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
              <span class="mailbox-attachment-size clearfix mt-1">
                <span>1,245 KB</span>
                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
              </span>
            </div>
          </li>
          <li>
            <span class="mailbox-attachment-icon has-img"></span>

            <div class="mailbox-attachment-info">
              <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
              <span class="mailbox-attachment-size clearfix mt-1">
                <span>2.67 MB</span>
                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
              </span>
            </div>
          </li>
          <li>
            <span class="mailbox-attachment-icon has-img"></span>

            <div class="mailbox-attachment-info">
              <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
              <span class="mailbox-attachment-size clearfix mt-1">
                <span>1.9 MB</span>
                <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
              </span>
            </div>
          </li> -->
        </ul>
      </div>
      <div class="card-footer">
        <div class="float-right">
          <!-- <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button> -->
          <!-- <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button> -->
        </div>
        <!-- <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button> -->
        <!-- <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button> -->
      </div>
    </div>
  </div>
</div>


<script src="{{url('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{url('public/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('public/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
$(function() {

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
  if (email_subject == "") {

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

      // console.log(data);
      // return false;
      $("#BtnSubmit").prop('disabled', false);

      if (data['success'] == true) {

        toastr.success(data['message']);

      } else {

        toastr.warning(data['message']);

        return false;

      }

    }

  });
}
</script>

@endsection
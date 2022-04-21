@extends('layouts.master')

@section('content_corner')
  <a class="btn btn-primary my-2 btn-icon-text" href="#" class="btn btn-primary" data-bs-toggle="modal"
     data-bs-target="#modalCreate">
    <i class="fe fe-plus"></i> Tambah
  </a>
@endsection
@section('content')
  <div class="row row-sm">
    <div class="col-lg-12">
      <div class="card custom-card overflow-hidden">
        <div class="card-body">
          <div class="row">

          </div>
          <div class="table-responsive">
            <table class="table table-bordered border-bottom w-100" id="Datatable">
              <thead>
              <tr>
                <th>Nama</th>
                <th>Perusahaan</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Jadwal Datang</th>
                <th>Status</th>
                <th>E-Tiket</th>
                <th></th>
              </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--Modal--}}

  <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalmodalEdit" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit {{ $config['page_title'] }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formUpdate" action="#">
          @method('PUT')
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <div class="modal-body">
            <div id="errorEdit" class="mb-3" style="display:none;">
              <div class="alert alert-danger" role="alert">
                <div class="alert-icon"><i class="flaticon-danger text-danger"></i></div>
                <div class="alert-text">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label>Nama Permission <span class="text-danger">*</span></label>
              <input type="text" name="title" class="form-control" placeholder="Masukan nama permission"/>
            </div>
            <div class="mb-3">
              <label>Slug <span class="text-danger">*</span></label>
              <input type="text" name="slug" class="form-control" placeholder="Masukan nama slug"/>
            </div>
            <div class="mb-3">
              <label>Path Url <span class="text-danger">*</span></label>
              <input type="text" name="path_url" class="form-control" placeholder="ex: /backend/dashboard"/>
            </div>
            <div class="mb-3">
              <label>Icon <span class="text-danger">*</span></label>
              <input type="text" name="icon" class="form-control" placeholder="ex: fas fa-address-card"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteLabel">Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @method('DELETE')
        <div class="modal-body">
          <a href="" class="urlDelete" type="hidden"></a>
          Apa anda yakin ingin menghapus data ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button id="formDelete" type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/fc-4.0.1/fh-3.2.0/r-2.2.9/rg-1.1.4/rr-1.2.8/datatables.min.css"/>
@endsection
@section('script')
  <script type="text/javascript"
          src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/fc-4.0.1/fh-3.2.0/r-2.2.9/rg-1.1.4/rr-1.2.8/datatables.min.js"></script>
  <script>
$(document).ready(function () {
     
     let modalDelete = document.getElementById('modalDelete');
     const bsDelete = new bootstrap.Modal(modalDelete);
     let dataTable = $('#Datatable').DataTable({
       responsive: true,
       scrollX: false,
       processing: true,
       serverSide: true,
       order: [[0, 'asc']],
       lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
       pageLength: 10,
       ajax: "{{ route('backend.pengguna.index') }}",
       columns: [
         {data: 'nama', name: 'nama'},
         {data: 'perusahaan', name: 'perusahaan'},
         {data: 'jabatan', name: 'jabatan'},
         {data: 'alamat', name: 'alamat'},
         {data: 'jadwal_datang', name: 'jadwal_datang'},
         {data: 'status', name: 'status'},
         {data: 'e_tiket', name: 'e_tiket'},
         {data: 'action', name: 'action', orderable: false, searchable: false},
       ],
       columnDefs: [
         {
           className: 'text-center',
           orderable: false,
           targets: 2,
           render: function (data, type, full, meta) {
             return `<i class="`+(data ? data : '')+` fa-2x"></i>`;
           }
         }
       ],
     });
 
     modalDelete.addEventListener('show.bs.modal', function (event) {
       let button = event.relatedTarget;
       let id = button.getAttribute('data-bs-id');
       this.querySelector('.urlDelete').setAttribute('href', '{{ route("backend.permissions.index") }}/' + id);
     });
     modalDelete.addEventListener('hidden.bs.modal', function (event) {
       this.querySelector('.urlDelete').setAttribute('href', '');
     });
     $("#formStore").submit(function (e) {
       e.preventDefault();
       let form = $(this);
       let btnSubmit = form.find("[type='submit']");
       let btnSubmitHtml = btnSubmit.html();
       let url = form.attr("action");
       let data = new FormData(this);
       $.ajax({
         beforeSend: function () {
           btnSubmit.addClass("disabled").html("<span aria-hidden='true' class='spinner-border spinner-border-sm' role='status'></span> Loading ...").prop("disabled", "disabled");
         },
         cache: false,
         processData: false,
         contentType: false,
         type: "POST",
         url: url,
         data: data,
         success: function (response) {
           let errorCreate = $('#errorCreate');
           errorCreate.css('display', 'none');
           errorCreate.find('.alert-text').html('');
           btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
           if (response.status === "success") {
             toastr.success(response.message, 'Success !');
             dataTable.draw();
             bsCreate.hide();
           } else {
             toastr.error((response.message ? response.message : "Please complete your form"), 'Failed !');
             if (response.error !== undefined) {
               errorCreate.removeAttr('style');
               $.each(response.error, function (key, value) {
                 errorCreate.find('.alert-text').append('<span style="display: block">' + value + '</span>');
               });
             }
           }
         },
         error: function (response) {
           btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
           toastr.error(response.responseJSON.message, 'Failed !');
         }
       });
     });

     $("#formDelete").click(function (e) {
       e.preventDefault();
       let form = $(this);
       let url = modalDelete.querySelector('.urlDelete').getAttribute('href');
       let btnHtml = form.html();
       let spinner = $("<span aria-hidden='true' class='spinner-border spinner-border-sm' role='status'></span>");
       $.ajax({
         beforeSend: function () {
           form.text(' Loading. . .').prepend(spinner).prop("disabled", "disabled");
         },
         type: 'DELETE',
         url: url,
         dataType: 'json',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         success: function (response) {
           toastr.success(response.message, 'Success !');
           form.text('Submit').html(btnHtml).removeAttr('disabled');
           dataTable.draw();
           bsDelete.hide();
         },
         error: function (response) {
           toastr.error(response.responseJSON.message, 'Failed !');
           form.text('Submit').html(btnHtml).removeAttr('disabled');
           bsDelete.hide();
         }
       });
     });
   });
  </script>
@endsection

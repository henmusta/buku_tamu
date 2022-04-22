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
  <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalResetLabel">Tambah</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formStore" method="POST" action="{{ route('backend.pengguna.store') }}">
          @csrf
          <div class="modal-body">
            <div id="errorCreate" class="mb-3" style="display:none;">
              <div class="alert alert-danger" role="alert">
                <div class="alert-icon"><i class="flaticon-danger text-danger"></i></div>
                <div class="alert-text">
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input name="nama" class="form-control" placeholder="nama" type="text" id="nama" autocomplete="off">
            </div>
            <div class="mb-3">
              <label>Perusahaan<span class="text-danger">*</span></label>
                <input name="perusahaan" class="form-control" placeholder="Perusahaan" type="text" id="perusahaan" autocomplete="off">
            </div>	
            <div class="mb-3">
              <label>Jabatan<span class="text-danger">*</span></label>
                <input name="jabatan" class="form-control" placeholder="Jabatan" type="text" id="jabatan" autocomplete="off">
            </div>	
            <div class="mb-3">
              <label>Hp<span class="text-danger">*</span></label>
                  <input name="hp" class="form-control" placeholder="Nomor Hp" type="number" id="hp" autocomplete="off">
            </div>	
            <div class="mb-3">
              <label>Alamat<span class="text-danger">*</span></label>
                  <textarea name="alamat" id="alamat" class="yourmessage form-control" placeholder="Alamat" ></textarea>
            </div>							 			
            <div class="mb-3">
              <label>Jadwal datang<span class="text-danger">*</span></label>
                <input name="jadwal_datang" class="form-control datepicker" placeholder="Jadwal Datang" type="text" id="jadwal_datang">
            </div>	
            <div class="mb3">
              <label>Status<span class="text-danger">*</span></label>
                    <select class="form-select" id="selectStatuscreate" name="selectStatus">
                      <option value="0">Menunggu</option>
                      <option value="1">Hadir</option>
                      <option value="2">Tidak Hadir</option>
                    </select>
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
              <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input name="nama" class="form-control" placeholder="nama" type="text" id="nama" autocomplete="off">
            </div>
            <div class="mb-3">
              <label>Perusahaan<span class="text-danger">*</span></label>
                <input name="perusahaan" class="form-control" placeholder="Perusahaan" type="text" id="perusahaan" autocomplete="off">
            </div>	
            <div class="mb-3">
              <label>Jabatan<span class="text-danger">*</span></label>
                <input name="jabatan" class="form-control" placeholder="Jabatan" type="text" id="jabatan" autocomplete="off">
            </div>	
            <div class="mb-3">
              <label>Hp<span class="text-danger">*</span></label>
                  <input name="hp" class="form-control" placeholder="Nomor Hp" type="number" id="hp" autocomplete="off">
            </div>	
            <div class="mb-3">
              <label>Alamat<span class="text-danger">*</span></label>
                  <textarea name="alamat" id="alamat" class="yourmessage form-control" placeholder="Alamat" ></textarea>
            </div>							 			
            <div class="mb-3">
              <label>Jadwal datang<span class="text-danger">*</span></label>
                <input name="jadwal_datang" class="form-control datepicker" placeholder="Jadwal Datang" type="text" id="jadwal_datang">
            </div>	
            <div class="mb3">
              <label>Status<span class="text-danger">*</span></label>
                    <select class="form-select select2" id="selectStatus" name="selectStatus">
                      <option value="0">Menunggu</option>
                      <option value="1">Hadir</option>
                      <option value="2">Tidak Hadir</option>
                    </select>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/fc-4.0.1/fh-3.2.0/r-2.2.9/rg-1.1.4/rr-1.2.8/datatables.min.css"/>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script type="text/javascript"
          src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.0.1/b-colvis-2.0.1/fc-4.0.1/fh-3.2.0/r-2.2.9/rg-1.1.4/rr-1.2.8/datatables.min.js"></script>
  <script>
$(document).ready(function () {
     let modalCreate = document.getElementById('modalCreate');
      const bsCreate = new bootstrap.Modal(modalCreate);
     let modalEdit = document.getElementById('modalEdit');
    const bsEdit = new bootstrap.Modal(modalEdit);
     let modalDelete = document.getElementById('modalDelete');
     const bsDelete = new bootstrap.Modal(modalDelete);
$("#selectStatuscreate").select2({
       placeholder: 'Choose one',
      searchInputPlaceholder: 'Search',
      minimumResultsForSearch: Infinity,
      width: '100%'
});
      $(".datepicker").flatpickr({
        dateFormat: "Y-m-d"
      });

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
         {data: 'status', name: 'status', 
          render: function (data, type, full, meta) {
              let status = {
                '0': {'title': 'Menunggu', 'class': ' bg-warning'},
                '2': {'title': 'Tidak Hadir', 'class': ' bg-danger'},
                '1': {'title': 'Hadir', 'class': ' bg-success'},
              };
              if (typeof status[data] === 'undefined') {
                return data;
              }
              return '<span class="badge bg-pill' + status[data].class + '">' + status[data].title +
                '</span>';
            }
          },
          {data: 'print', name: 'print', orderable: false, searchable: false},
         {data: 'action', name: 'action', orderable: false, searchable: false},
       ],
       columnDefs: [
 
       ],
     });

      modalCreate.addEventListener('show.bs.modal', function (event) {
      });
      modalCreate.addEventListener('hidden.bs.modal', function (event) {
        $(this).find("input,textarea,select").val('').end();
 
      });

     modalEdit.addEventListener('show.bs.modal', function (event) {
        let nama = event.relatedTarget.getAttribute('data-bs-nama');
        let jabatan = event.relatedTarget.getAttribute('data-bs-jabatan');
        let perusahaan = event.relatedTarget.getAttribute('data-bs-perusahaan');
        let alamat = event.relatedTarget.getAttribute('data-bs-alamat');
        let hp = event.relatedTarget.getAttribute('data-bs-hp');
        let jadwal_datang = event.relatedTarget.getAttribute('data-bs-jadwal_datang');
        let status = event.relatedTarget.getAttribute('data-bs-status');
        let optionStatus = new Option( status, status, false, false);
        // $(this).find('#selectStatus').append(optionStatus).trigger('change');
        $(this).find('#selectStatus').val(status).change();
        $(this).find('#alamat').text(alamat);
        this.querySelector('input[name=nama]').value = nama;
        this.querySelector('input[name=jabatan]').value = jabatan;
        this.querySelector('input[name=perusahaan]').value = perusahaan;
        this.querySelector('input[name=hp]').value = hp;
        this.querySelector('input[name=jadwal_datang]').value = jadwal_datang;
        this.querySelector('#formUpdate').setAttribute('action', '{{ route("backend.pengguna.index") }}/' + event.relatedTarget.getAttribute('data-bs-id'));
      });

      modalEdit.addEventListener('hidden.bs.modal', function (event) {
        $(this).find('#alamat').text('');
        this.querySelector('input[name=nama]').value = '';
        this.querySelector('input[name=jabatan]').value = '';
        this.querySelector('input[name=perusahaan]').value = '';
        this.querySelector('input[name=hp]').value = '';
        this.querySelector('input[name=jadwal_datang]').value = '';
        this.querySelector('#formUpdate').setAttribute('href', '');
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

     $("#formUpdate").submit(function(e){
        e.preventDefault();
        let form 	= $(this);
        let btnSubmit = form.find("[type='submit']");
        let btnSubmitHtml = btnSubmit.html();
        let url 	= form.attr("action");
        let data 	= new FormData(this);
        $.ajax({
          beforeSend:function() {
            btnSubmit.addClass("disabled").html("<span aria-hidden='true' class='spinner-border spinner-border-sm' role='status'></span> Loading ...").prop("disabled", "disabled");
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          cache: false,
          processData: false,
          contentType: false,
          type: "POST",
          url : url,
          data : data,
          success: function (response) {
            let errorEdit = $('#errorEdit');
            errorEdit.css('display', 'none');
            errorEdit.find('.alert-text').html('');
            btnSubmit.removeClass("disabled").html(btnSubmitHtml).removeAttr("disabled");
            if (response.status === "success") {
              toastr.success(response.message, 'Success !');
              dataTable.draw();
              bsEdit.hide();
            } else {
              toastr.error((response.message ? response.message : "Please complete your form"), 'Failed !');
              if (response.error !== undefined) {
                errorEdit.removeAttr('style');
                $.each(response.error, function (key, value) {
                  errorEdit.find('.alert-text').append('<span style="display: block">' + value + '</span>');
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

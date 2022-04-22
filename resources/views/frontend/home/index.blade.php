@extends('layouts_front.master_front')
@section('content')
<div class="hero-slider  hero-slider-2" id="slider">
        <div class="single-slide " style="background-image: url({{ asset('assets/frontend/images/slider/slider-03.png') }})">
        <div class="hero-content-one container">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="slider-text-info text-center">
                            <h4>Belum Tau Nulis Apa</h4>
                            <h1>Sistem -  <span>Pendaftaran <br> --------------------------- </span></h1>
                            <div class="slider-button">
                                <a href="#kontak" class="slider-btn theme-btn">Registrasi</a>
                                <a href="#about" class="slider-btn white-btn">About</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-area section-ptb" id="about">
        <div class="container">
            <div class="row">
                 <div class="col-lg-6 col-md-12  order-1 order-lg-2">
                    <div class="about-content-inner">
                        <div class="about-title">
                            <h2>About<span> - What We Believe</span></h2>
                        </div>
                        <div class="about-text">
                        <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed distribution of letters, azer duskam Lorem Ipsum is that it has a more-or-less normal</p>
                        <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed distribution of letters, azer duskam Lorem Ipsum is that it has a more-or-less normal</p>
                       <a href="#" class="about-more-btn">MORE ABOUT</a>
                        </div>
                        <!-- Project Count Area Start -->
                        <div class="project-count-area">
                            <div class="project-count-inner">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <!-- counter start -->
                                        <div class="counter">
                                            <h3 class="counter-active">241</h3>
                                            <p>Pengguna</p>
                                        </div>
                                        <!-- counter end -->
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <!-- counter start -->
                                        <div class="counter">
                                            <h3 class="counter-active">531</h3>
                                            <p>Kehadiran</p>
                                        </div>
                                        <!-- counter end -->
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <!-- counter start --> 
                                        <div class="counter">
                                            <h3 class="counter-active">171</h3>
                                            <p>DLL</p>
                                        </div>
                                        <!-- counter end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Project Count Area End -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <div class="about-image text-center">
                  
                     <img src="{{ asset('assets/frontend/images/about/faq-01.png') }}" alt="">
                      
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <div class="subscribe-area subscribe-bg section-ptb" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto">
                    <div class="subscribe-title text-center">
                        <h2>Registrasi</h2>
                        <p>Silahkan Isi Semua Form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8  m-auto">
                    <div class="subscribe-form-area">
                        <form  class="contact-form-area" action="{{ route('frontend.home.store') }}" id="formStore">
                        @csrf    
                         <div id="errorCreate" class="mb-3" style="display:none;">
                            <div class="alert alert-danger" role="alert">
                                <div class="alert-text">
                                </div>
                            </div>
                         </div>
                            <div class="row contact-form">
                                <div class="form-group col-md-12">
                                    <input name="nama" class="form-control" placeholder="nama" type="text" id="nama" autocomplete="off">
                                </div>
                                <div class="form-group col-md-12">
                                    <input name="perusahaan" class="form-control" placeholder="Perusahaan" type="text" id="perusahaan" autocomplete="off">
                                </div>	
                                <div class="form-group col-md-12">
                                    <input name="jabatan" class="form-control" placeholder="Jabatan" type="text" id="jabatan" autocomplete="off">
                                </div>	
                                <div class="form-group col-md-12">
                                    <input name="hp" class="form-control" placeholder="Nomor Hp" type="number" id="hp" autocomplete="off">
                                </div>	
                                <div class="form-group col-md-12">
                                    <textarea name="alamat" class="yourmessage form-control" placeholder="Alamat" ></textarea>
                                </div>							 			
                                <div class="form-group col-md-12">
                                    <input name="jadwal_datang" class="form-control" placeholder="Jadwal Datang" type="text" id="jadwal_datang">
                                </div>	
                   
                 
                            <div class="form-group col-md-12 captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                                </button>
                            </div>
                               <div class="form-group col-md-12">
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                </div>	
                                <div class="submit-form form-group col-sm-12">
                                    <button class="button submit-btn" type="submit"><span>Submit</span></button>
                                    <p class="form-messege"></p>
                                </div>											
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('css_front')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endsection
    @section('script_front')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    $(document).ready(function () {
      $("#jadwal_datang").flatpickr({
        dateFormat: "Y-m-d"
      });
      $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
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
              setTimeout(function () {
                window.open('{{ route('frontend.home.index') }}' +'/'+ response.id +'/generatePDF', '_blank');
                if (response.redirect === "" || response.redirect === "reload") {
                  location.reload();
                } else {
                  location.href = response.redirect;
                }
              }, 1000);
         
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
    });
  </script>
    @endsection
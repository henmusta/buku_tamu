@extends('layouts.master')
@section('content')
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Disk Space</h3>
      </div>
      <div class="card-body">
        <div>
          <div class="progress progress-md mb-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-blue-1"
                 style=""></div>
          </div>
          <div class="float-end">
            <span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{--Modal--}}
@endsection
@section('css')
@endsection
@section('script')
  <script>
    $(document).ready(function () {

    });
  </script>
@endsection

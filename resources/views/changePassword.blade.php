@extends('layouts.main')
@section('content')
<div class="content-page">
    <div class="content">

      @if(Session::has('success_message'))
          <div class="alert alert-success">
              <span class="glyphicon glyphicon-ok"></span>
              {!! session('success_message') !!}

              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
              </button>

          </div>
      @endif

        <!-- Start Content-->
        <div class="container-fluid py-4">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header"><h4><i class="fas fa-pencil-alt"></i> เปลี่ยนรหัสผ่าน</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf

                         @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่านเก่า</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่านใหม่</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่านใหม่</label>

                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ยืนยัน
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

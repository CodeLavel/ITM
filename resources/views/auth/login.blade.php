@extends('layouts.app')

@section('content')
<body style="background:#000066">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="{{url('/')}}" class="text-white offset-11">หน้าแรก</a>
<div class="container">
  @if(Session::has('message'))
      <div class="alert alert-success">
          <span class="glyphicon glyphicon-ok"></span>
          {!! session('message') !!}

          <button type="button" class="close" data-dismiss="alert" aria-label="close">
              <span aria-hidden="true">&times;</span>
          </button>

      </div>
  @endif
  <br><br><br><br><br>

    <div class="row justify-content-center py-5">

        <div class="col-md-6">
           <h5 class="text-danger">*สำหรับผู้ดูแลระบบเท่านั้น</h5>
            <div class="card shadow">
                <div class="card-header">
                    <img src="{{ asset('assets/images/logo.jpg')}}" class="logo-light" alt="" height="100" width="500">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">{{ ('ชื่อผู้ใช้ หรือ อีเมล์') }}</label>
                          <div class="col-md-7">
                            <input id="login" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                              name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                              @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                                @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{('รหัสผ่าน') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('เข้าสู่ระบบ') }}
                                </button>
                            <!--
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('ลืมรหัสผ่าน?') }}
                                    </a>
                                @endif
                              -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection

@extends('layouts.main')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

          <div class="row">
              <div class="col-12">
                  <div class="page-title-box">
                      <h4 class="page-title">กรอกรหัส OTP</h4>
                  </div>
              </div>
          </div>
          <div class="row">

              <div class="col-xl-12">
                <div class="card-box" dir="ltr">


        <div class="panel-body">


            <form method="POST" action="{{ route('') }}" accept-charset="UTF-8" id="create_users_form" name="create_users_form" class="form-horizontal">
            {{ csrf_field() }}
            <center><input class="form-control col-sm-4" name="otp" type="text" id="otp" minlength="1" placeholder="กรอกรหัส OTP ..." required>
                <br>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="บันทึก">
                    </div>
                </div>
            </center>
            </form>

        </div>
    </div>
  </div> <!-- end card-box-->
</div> <!-- end col -->
  </div>
  </div>
  </div>
</div> <!-- content -->

@endsection

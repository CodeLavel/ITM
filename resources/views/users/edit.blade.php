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
                                <h4 class="page-title">แก้ไขข้อมูลผู้ใช้งานระบบ</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-12">
                          <div class="card-box" dir="ltr">


        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('users.users.update', $users->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                <div class="col-md-4">
                    <label>ชื่อผู้ใช้งานระบบ :</label>
                    <input class="form-control" name="username" type="text" id="username" value="{{ old('username', optional($users)->username) }}" minlength="1" placeholder="กรอกชื่อหมวดหมู่ครุภัณฑ์..." required>
                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!} <br>
                    <label>อีเมล์ :</label>
                    <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($users)->email) }}" minlength="1" placeholder="email..." required>
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
                    <br>
                </div>
            </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="บันทึกการแก้ไข">
                    </div>
                </div>
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

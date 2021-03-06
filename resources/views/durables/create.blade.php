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
                      <h4 class="page-title">เพิ่มครุภัณฑ์</h4>
                  </div>
              </div>
          </div>

          <div class="row">

              <div class="col-xl-12">
                <div class="card-box" dir="ltr">

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('durables.durable.index') }}" class="btn btn-primary" title="ดูครุภัณฑ์">
                    <span class="fas fa-eye" aria-hidden="true"></span>
                </a>
            </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('durables.durable.store') }}" accept-charset="UTF-8" id="create_durable_form" name="create_durable_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('durables.form', [
                                        'durable' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="บันทึก">
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

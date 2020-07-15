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
                      <h4 class="page-title">แก้ไขชื่อหมวดหมู่ครุภัณฑ์</h4>
                  </div>
              </div>
          </div>
          <div class="row">

              <div class="col-xl-12">
                <div class="card-box" dir="ltr">
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('categories.category.index') }}" class="btn btn-primary" title="ดูหมวดหมู่">
                    <span class="fas fa-eye" aria-hidden="true"></span>
                </a>

                <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="เพิ่ม">
                    <span class="fas fa-plus" aria-hidden="true"></span>
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

            <form method="POST" action="{{ route('categories.category.update', $category->id) }}" id="edit_category_form" name="edit_category_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('categories.form', [
                                        'category' => $category,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="บันทึกการแก้ไข">
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
          </div> <!-- end card-box-->
        </div> <!-- end col -->
      </div>

    </div>
    </div>
  </div> <!-- content -->

@endsection

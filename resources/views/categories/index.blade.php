@extends('layouts.main')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

          <div class="row">
              <div class="col-12">
                  <div class="page-title-box">
                      <h4 class="page-title">หมวดหมู่</h4>
                  </div>
              </div>
          </div>
    <div class="row">

        <div class="col-xl-12">
          <div class="card-box" dir="ltr">
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('categories.category.create') }}" class="btn btn-success" title="เพิ่ม">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"><h6 class="text-white"><b><i class="fas fa-plus"> เพิ่มหมวดหมู่ครุภัณฑ์</i></b></h6></span>
                </a>

        </div>

        @if(count($categories) == 0)
            <div class="panel-body text-center">
                <h4>ไม่มีหมวดหมู่ครุภัณฑ์.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive py-2">
              @php
                $i = 1
              @endphp

                <table class="table table-striped" id="table_id">
                    <thead>
                        <tr>
                            <th><h5>ลำดับ</h5></th>
                            <th><h5>ชื่อหมวดหมู่ครุภัณฑ์</h5></th>
                            <th><h5>จำนวนครุภัณฑ์</h5></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td><h5>{{ $i++ }}</h5></td>
                            <td><h5>{{ $category->category_name }}</h5></td>
                            <td><h5>{{ $category->durables->count() }}</h5></td>
                            <td>

                                <form method="POST" action="{!! route('categories.category.destroy', $category->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary" title="แก้ไข">
                                            <span class="fas fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="ลบ" onclick="return confirm(&quot;ต้องการลบข้อมูลนี้ใช่หรือไม่.&quot;)">
                                            <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
          </div> <!-- end card-box-->
        </div> <!-- end col -->
          </div>
          </div>
      </div> <!-- content -->
    </div>

        <div class="panel-footer">
            {!! $categories->render() !!}
        </div>

        @endif

    </div>
@endsection

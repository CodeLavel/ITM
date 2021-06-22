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
                      <h4 class="page-title">ครุภัณฑ์</h4>
                  </div>
              </div>
          </div>
          
          <div class="row">
            <div class="col-xl-2 col-md-6">
                <div class="card-box">
                    <a class="header-title mt-0 mb-2"><h4>หมวดหมู่</h4></a>
                    <div class="panel-group" id="accordian">

                    @foreach($categories as $category)
                      <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5><a class="panel-title" href="/durables/category/{{$category->id}}">{{$category->category_name}}</a>
                                <label class="pull-right">{{ $category->durables->count() }}</label>
                            </h5>
                        </div>
                      </div>
                    @endforeach
                    </div>
                </div>

            </div><!-- end col -->
              <div class="col-xl-10">
                <div class="card-box" dir="ltr">
                    
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('durables.durable.create') }}" class="btn btn-success" title="เพิ่ม">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"><h6 class="text-white"><b><i class="fas fa-plus"> เพิ่มครุภัณฑ์</i></b></h6></span>
                </a>
            </div>
            
        @if(count($durables) == 0)
            <div class="panel-body text-center">
                <h4>ไม่มีครุภัณฑ์.</h4>
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
                            <th><h5>รูปภาพ</h5></th>
                            <th><h5>รหัสครุภัณฑ์</h5></th>
                            <th><h5>ชื่อครุภัณฑ์</h5></th>
                            <th><h5>หมวดหมู่</h5></th>
                          <!--  <th><h5>ยี่ห้อ</h5></th>
                            <th><h5>รุ่น</h5></th> -->
                            <th><h5>สถานที่ปัจจุบัน</h5></th>
                            <th><h5>ทั้งหมด</h5></th>
                            <th><h5>เสีย-พัง</h5></th>
                            <th><h5>ใช้ได้</h5></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($durables as $durable)
                        <tr>
                            <td style='word-break:break-all' width="3%"><br><h5>{{ $i++ }}</h5></td>
                        {{-- @if($durable->photo) --}}
                       
                            <td style='word-break:break-all' width="10%">
                                @if(empty($durable->photo))
                                <img src="{{asset('assets/images/durables/noImg.jpg')}}" height="100" width="120" >
                                @else
                                <img src="{{asset('assets/images/durables')}}/{{$durable->photo}}" >
                                @endif
                            </td>
                            <td style='word-break:break-all' width="13%"><br><h5>{{ $durable->duID }}</h5></td>
                            <td style='word-break:break-all' width="21%"><br><h5>{{ $durable->du_name }}</h5></td>
                            <td><br><h5>{{ optional($durable->category)->category_name }}</h5></td>
                          <!--  <td style='word-break:break-all' width="10%"><br><h5>{{ $durable->brand }}</h5></td>
                            <td style='word-break:break-all' width="10%"><br><h5>{{ $durable->gen }}</h5></td> -->
                            <td><br><h5>{{ optional($durable->catagory)->catagory_name }}</h5></td>
                            <td><br><h5>{{ $durable->amount }}</h5></td>
                            <td><br><h5>{{ $durable->break }}</h5></td>
                            <td><br><h5>{{ $durable->use }}</h5></td>
                            <td><br>

                                <form method="POST" action="{!! route('durables.durable.destroy', $durable->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('durables.durable.edit', $durable->id ) }}" class="btn btn-primary" title="แก้ไข">
                                            <span class="fas fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="ลบ" onclick="return confirm(&quot;ต้องการลบข้อมูลนี้หรือไม่.&quot;)">
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
            {!! $durables->render() !!}
        </div>

        @endif

    </div>
@endsection

@extends("layouts.main")
@section("content")

<div class="content-page">
    <div class="content">
    <div class="container-fluid py-3">
      @if($orderlogs->count()>0)
      <div class="col-xl-12">
          <div class="card m-b-30">
              <div class="card-body">

                <h2>รายการยืมครุภัณฑ์</h2>
                <a href="{{URL('orders/pdf2')}}" class="btn btn-danger" style="float:right; margin-bottom: 20px;"><i class="fa fa-print"> พิมพ์รายงาน</i></a>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col"><h4>ลำดับ</h4></th>
                        <th scope="col"><h4>รหัสครุภัณฑ์</h4></th>
                        <th scope="col"><h4>ชื่อครุภัณฑ์</h4></th>
                        <th scope="col"><h4>หมวดหมู่</h4></th>
                        <th scope="col"><center><h4>จำนวนที่ถูกยืม/ครั้ง</h4></center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp

                      @foreach($orderlogs as $key => $logs)
                      <tr>
                        <td><h5>{{$key + 1}}</h5></td>
                        <td style='word-break:break-all'><h5>{{$logs->duID}}</h5></td>
                        <td style='word-break:break-all'><h5>{{$logs->item_name}}</h5></td>
                        <td style='word-break:break-all'><h5>{{$logs->item_category}}</h5></td>
                        <td style='word-break:break-all'><center><h5>{{$logs->total}}/ครั้ง</h5></center></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="pull-right">
                      {{$orderlogs->links()}}
                    </div>
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="alert alert-danger my-2">
            <p>ไม่พบข้อมูล</p>
          </div>
          @endif
        </div>
      </div>
</div>
@endsection

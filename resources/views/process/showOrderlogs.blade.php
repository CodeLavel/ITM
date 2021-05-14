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

                <div class="table-responsive">
                  {{-- <form  action="{{route('showorderdate')}}" method ="POST">
                    @csrf
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="form-group row">
                                    <label for="date" class="col-form-label">เริ่มวันที่ :</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                                    </div>
                                    <label for="date" class="col-form-label ">สิ้นสุดวันที่ :</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                                    </div>
                                    <div class="col-sm-2">
                                      <button type="submit" class="btn" name="search" title="Search"><img src="https://img.icons8.com/android/24/000000/search.png"/></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </form> --}}
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col"><h4>ลำดับ</h4></th>
                        <th scope="col"><h4>รหัสครุภัณฑ์</h4></th>
                        <th scope="col"><h4>ชื่อครุภัณฑ์</h4></th>
                        <th scope="col"><h4>หมวดหมู่</h4></th>
                        <th scope="col"><h4>จำนวนที่ถูกยืม/ครั้ง</h4></th>
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
                        <td style='word-break:break-all'><h5>{{$logs->total}}</h5></td>
                        {{-- <td style='word-break:break-all' width="8%">
                          <a href="/orders/detail/{{$order->order_id}}" class="btn btn-primary">รายละเอียด</a>
                        </td>     --}}
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

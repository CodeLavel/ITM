@extends("layouts.main")
@section("content")

<div class="content-page">
    <div class="content">
    <div class="container-fluid py-3">
      @if($ordersall->count()>0)
      <div class="col-xl-12">
          <div class="card m-b-30">
              <div class="card-body">

                <h2>รายการยืมครุภัณฑ์</h2>

                <div class="table-responsive">
                  <form  action="{{route('showorderdate')}}" method ="POST">
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
                </form>
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col"><h4>ลำดับ</h4></th>
                        <th scope="col"><h4>ชื่อครุภัณฑ์</h4></th>
                        <th scope="col"><h4>วันที่ยืม</h4></th>
                        <th scope="col"><h4>วันที่คืน</h4></th>
                        <th scope="col"><h4>รหัสพนักงาน</h4></th>
                        <th scope="col"><h4>ชื่อ-นามสกุล</h4></th>
                        <th scope="col"><h4>สังกัด</h4></th>
                        <th scope="col"><h4>เบอร์โทรศัพท์</h4></th>
                        <th scope="col"><h4>สถานที่นำไปใช้</h4></th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp

                      @foreach($ordersall as $key => $order)
                      <tr>
                        <td><h5>{{$key + 1}}</h5></td>
                        <td style='word-break:break-all' width="20%"><h5>{{$order->item_name}}</h5></td>
                        @php
                        $thai_months = [
                          '01' => 'มกราคม',
                          '02' => 'กุมภาพันธ์',
                          '03' => 'มีนาคม',
                          '04' => 'เมษายน',
                          '05' => 'พฤษภาคม',
                          '06' => 'มิถุนายน',
                          '07' => 'กรกฎาคม',
                          '08' => 'สิงหาคม',
                          '09' => 'กันยายน',
                          '10' => 'ตุลาคม',
                          '11' => 'พฤศจิกายน',
                          '12' => 'ธันวาคม',
                            ];
                         $day = date('d', strtotime($order->date)); 
                         $date = date('m', strtotime($order->date));   
                         $y = date('Y', strtotime($order->date));  
                         $year = $y+543;
                         $mount =  $thai_months[$date];

                         $day2 = date('d', strtotime($order->rdate));  
                         $date2 = date('m', strtotime($order->rdate));
                         $y2 = date('Y', strtotime($order->rdate));
                         $year2 = $y2+543;
                         $mount2 =  $thai_months[$date2];
                        @endphp
                        <td><h5>{{$day."/".$mount."/".$year}}</h5></td>
                        <td><h5>{{$day2."/".$mount2."/".$year2}}</h5></td>
                        <td style='word-break:break-all' width="9%"><h5>{{$order->userID}}</h5></td>
                        <td style='word-break:break-all' width="8%"><h5>{{$order->fname}} {{$order->lname}}</h5></td>
                        <td style='word-break:break-all' width="13%"><h5>{{$order->address}}</h5></td>
                        <td style='word-break:break-all' width="9%"><h5>{{$order->phone}}</h5></td>
                        <td style='word-break:break-all' width="13%"><h5>{{$order->place}}</h5></td>
                        {{-- <td style='word-break:break-all' width="8%">
                          <a href="/orders/detail/{{$order->order_id}}" class="btn btn-primary">รายละเอียด</a>
                        </td>     --}}
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="pull-right">
                      {{$ordersall->links()}}
                    </div>
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="alert alert-danger my-2">
            <p>ไม่มีข้อมูลการยืมในระบบ</p>
          </div>
          @endif
        </div>
      </div>
</div>
@endsection

@extends("layouts.main")
@section("content")

<div class="content-page">
    <div class="content">
    <div class="container-fluid py-3">

      @if(Session::has('success'))
          <div class="alert alert-success">
              <span class="glyphicon glyphicon-ok"></span>
              {!! session('success') !!}

              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="true">&times;</span>
              </button>

          </div>
      @endif

      @if($orders->count()>0)
      <div class="col-xl-12">
          <div class="card m-b-30">
              <div class="card-body">

                <h2>รายการยืมครุภัณฑ์
                <form class="app-search pull-right" action="/orders/search" method="get" style="margin:auto;max-width:300px">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" name="searchOrder" placeholder="กรอกชื่อจริง...">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                </h2>
              <br>
                <div class="table-responsive">

                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col"><h4>ลำดับ</h4></th>
                        <th scope="col"><h4>วันที่ยืม</h4></th>
                        <th scope="col"><h4>วันที่คืน</h4></th>
                        <th scope="col"><h4>รหัสพนักงาน</h4></th>
                        <th scope="col"><h4>ชื่อ-นามสกุล</h4></th>
                        <th scope="col"><h4>สังกัด</h4></th>
                        <th scope="col"><h4>เบอร์โทรศัพท์</h4></th>
                        <th scope="col"><h4>สถานที่นำไปใช้</h4></th>
                        <th scope="col"><h4>รายละเอียด</h4></th>
                        <th scope="col"><h4>หมายเหตุ</h4></th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i = 1;
                      @endphp

                      @foreach($orders as $order)
                      <tr>
                        <td><h5>{{$order->order_id}}</h5></td>
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
                        <td style='word-break:break-all' width="8%">
                          <a href="/orders/detail/{{$order->order_id}}" class="btn btn-primary">รายละเอียด</a>
                        </td>
                        <td style='word-break:break-all' width="7%"><h5>{{$order->comment}}</h5></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                    <div class="pull-right">
                        {{$orders->links()}}
                      </div>
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="alert alert-danger my-2">
            <h4 class="text-danger"><p>ไม่มีข้อมูลการยืมในระบบ</p></h4>
          </div>
          @endif
        </div>
      </div>
</div>
@endsection

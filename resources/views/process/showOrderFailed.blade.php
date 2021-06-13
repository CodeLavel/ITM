@extends("layouts.main")
@section("content")

<div class="content-page">
    <div class="content">
    <div class="container-fluid py-3">
      @if($orderfailed->count()>0)
      <div class="col-xl-12">
          <div class="card m-b-30">
              <div class="card-body">

                <h2>รายการครุภัณฑ์ยังไม่คืน</h2>
                <a href="{{URL('orders/pdf4')}}" class="btn btn-danger" style="float:right; margin-bottom: 20px;"><i class="fa fa-print"> พิมพ์รายงาน</i></a>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col"><h4>ลำดับ</h4></th>
                        <th scope="col" ><h4>รายการ</h4></th>
                        <th scope="col"><h4>วันที่ยืม</h4></th>
                        <th scope="col"><h4>วันที่คืน</h4></th>
                        <th scope="col"><center><h4>ชื่อผู้ยืม</h4></center></th>
                        <th scope="col"><center><h4>ชื่อครุภัณฑ์</h4></center></th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp

                      @foreach($orderfailed as $key => $logs)
                      <tr>
                        <td><h5>{{$key + 1}}</h5></td>
                        <td style='word-break:break-all'><h5>{{$logs->order_id}}</h5></td>
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
                         $day = date('d', strtotime($logs->date)); 
                         $date = date('m', strtotime($logs->date));   
                         $y = date('Y', strtotime($logs->date));  
                         $year = $y+543;
                         $mount =  $thai_months[$date];

                         $day2 = date('d', strtotime($logs->rdate));  
                         $date2 = date('m', strtotime($logs->rdate));
                         $y2 = date('Y', strtotime($logs->rdate));
                         $year2 = $y2+543;
                         $mount2 =  $thai_months[$date2];
                        @endphp
                        <td style='word-break:break-all'><h5>{{$day."/".$mount."/".$year}}</h5></td>
                        <td style='word-break:break-all'><h5>{{$day2."/".$mount2."/".$year2}}</h5></td>
                        <td style='word-break:break-all'><center><h5>{{$logs->fname}} {{$logs->lname}}</h5></center></td>
                        <td style='word-break:break-all'><center><h5>{{$logs->item_name}}</h5></center></td>
                        {{-- <td style='word-break:break-all' width="8%">
                          <a href="/orders/detail/{{$order->order_id}}" class="btn btn-primary">รายละเอียด</a>
                        </td>     --}}
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="pull-right">
                      {{$orderfailed->links()}}
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

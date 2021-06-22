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
                        {{-- @if(auth::check())
                        <th scope="col"><h4>สถานะ</h4></th>
                        @else
                        <th scope="col"></th>
                        @endif --}}
                        {{-- <th scope="col"><h4>ยืม/คืน</h4></th> --}}
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
                        {{-- <td>
                          @if(auth::check())

                              @if ($order->status == '1')
                                    <a href="#" class="btn btn-warning text-white" onclick="addmhsForm({{ $order->order_id }});" id="orderall" data-id="{{ $order->order_id }}" data-toggle="modal" data-target="#myModal{{ $order->order_id }}">รออนุมัติ</a>
                                  @elseif ($order->status == '2')
                                    <a href="#" class="btn btn-success disabled" onclick="addmhsForm();" id="orderall" data-toggle="modal" data-target="#myModal{{ $order->order_id }}">อนุมัติ</a>
                                  @elseif ($order->status == '3')
                                    <a href="#" class="btn btn-danger" onclick="addmhsForm();" id="orderall" data-toggle="modal" data-target="#myModal{{ $order->order_id }}">ไม่อนุมัติ</a>
                              @endif

                          @endif
                        </td> --}}
                        {{-- <script type="text/javascript">
                          $(document).ready(function() {
                            $("#orderall").click(function () {
                              // var passedID = $(this).data('id');
                            console.log("ok");
                          // var building_id = $(this).val();
                          // if(building_id){
                          //         $.ajax({
                          //             type: "GET",
                          //             url:'/backend/getmeetingroomlist/'+building_id,
                          //             dataType: 'json',
                          //             success: function(response){
                          //                 $('#mto_room').html('<option value="">เลือกห้องประชุม</option>'); 
                          //                 $.each(response,function(key,value){
                          //                 $("#mto_room").append('<option value="'+value+'">'+value+'</option>');
                          //               }); 
                          //               }
                          //           });
                          //       }
                            });    
                        });
                        </script> --}}
                        {{-- <td>

                       @if(auth::check())
                          @if ($order->status == '2')
                              @if ($order->borrow == '4')
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal1{{ $order->order_id }}">อยู่ระหว่างยืม</a>
                                  @else ($order->borrow == '5')
                                    <a href="#" class="btn btn-info disabled" data-toggle="modal" data-target="#myModal1{{ $order->order_id }}">คืนแล้ว</a>
                              @endif
                          @endif

                        @else

                          @if ($order->status == '2')
                              @if ($order->borrow == '4')
                                    <a class="text-danger" > <h5 class="text-danger"><i class="fas fa-sync-alt"></i> อยู่ระหว่างยืม</h5></a>
                                  @else ($order->borrow == '5')
                                    <a class="text-info" > <h5 class="text-info"><i class="fas fa-sign-in-alt"></i> คืนแล้ว</h5></a>
                              @endif
                            @endif
                          @endif
                        </td> --}}

                        <td style='word-break:break-all' width="7%"><h5>{{$order->comment}}</h5></td>
                      </tr>

                      

                        <!-- The Modal1 -->
                          {{-- <div class="modal fade" id="myModal1{{ $order->order_id }}">
                              <div class="modal-dialog modal-dialog py-5">
                              <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">ยืม/คืน</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  {{-- <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="/borrow/edit/{{$order->order_id}}">

                                          {{ csrf_field() }}
                                          {{ method_field('PUT') }}
                                  <!-- Modal body -->
                                  <div class="modal-body">
                                          <div class="form-group">
                                                  <label>ชื่อผู้ยืม : </label>
                                                  {{$order->fname}} {{$order->lname}}
                                          </div>

                                          <div class="form-group">
                                                  <select name="borrow" class="form-control">
                                                          <option value="4" @if($order->borrow == '4') selected @endif>อยู่ระหว่างยืม</option>
                                                          <option value="5" @if($order->borrow == '5') selected @endif>คืนแล้ว</option>
                                                  </select>
                                          </div>

                                  </div>

                                  <!-- Modal footer -->
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-success">บันทึก</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                  </div>
                                </form> --}}
                              {{-- </div>
                              </div>
                          </div>  --}}

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

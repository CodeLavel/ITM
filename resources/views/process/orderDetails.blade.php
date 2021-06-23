@extends("layouts.main")
@section("content")

<div class="content-page">
    <div class="content">
    <div class="container-fluid py-3">
      <div class="col-xl-12">
          <div class="card m-b-30">
              <div class="card-body">
                <div class="table-responsive">
                  <h2>รายละเอียดการยืม</h2><br>
                  
                  <table class="table">
                    <thead class="thead-light">
                      @php
                        $i = 1;
                      @endphp
                      <tr>
                        <th scope="col"><h4>ลำดับ</h4></th>
                        <th scope="col"><h4>รูปภาพ</h4></th>
                        <th scope="col"><h4>ชื่อครุภัณฑ์</h4></th>
                        <th scope="col"><h4>หมวดหมู่</h4></th>
                    <!--    <th scope="col"><h4>ยี่ห้อ</h4></th>
                        <th scope="col"><h4>รุ่น</h4></th> -->
                        <th scope="col"><h4>จำนวน</h4></th>
                      @if(auth::check())
                        <th></th>
                      @endif
                      <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orderitems as $orderitem)
                      <tr>
                        <th scope="row"><h4><br>{{$orderitem->order_id}}</h4></th>
                        @if(empty($durable->photo))
                        <th><img src="{{asset('assets/images/durables/noImg.jpg')}}" height="100" width="120" ></th>
                        @else
                        <th><img src="{{asset('assets/images/durables')}}/{{$durable->photo}}" ></th>
                        @endif
                        <th scope="row"><h4><br>{{$orderitem->item_name}}</h4></th>
                        <th scope="row"><h4><br>{{$orderitem->item_category}}</h4></th>
                    <!--    <th scope="row"><h4>{{$orderitem->item_brand}}</h4></th>
                        <th scope="row"><h4>{{$orderitem->item_gen}}</h4></th> -->
                        <th scope="row"><h4><br>{{$orderitem->item_amount}}</h4></th>
                      @if(auth::check())
                        
                        <th scope="row"><br>
                          @if($orderitem->item_status == '1')
                            {{-- <a href="/orders/detailord/{{$orderitem->order_id}}" class="btn btn-info disabled"><i class="fas fa-edit"></i> คืนแล้ว</a> --}}
                            <button type="submit" class="btn btn-danger disabled" title="คืนแล้ว">
                              <span class="fas fa-edit" aria-hidden="true">คืนแล้ว</span>
                          </button>
                          @elseif($orderitem->status == '2')
                          <form method="POST" action="{{route('returnorder')}}" accept-charset="UTF-8">
                            <input name="order_id" value="{{$orderitem->order_id}}" type="hidden">
                            <input name="item_id" value="{{$orderitem->item_id}}" type="hidden">
                            {{ csrf_field() }}

                               <button type="submit" class="btn btn-info" title="รับคืน">
                                        <span class="fas fa-edit" aria-hidden="true">รับคืน</span>
                                </button>
                            </form>
                          @endif
                          
                        </th>
                        
                        <th class="py-3"><br><br>
                          @if ($orderitem->item_status == null && $orderitem->status == '1')
                          <a class="badge badge-danger" href="/durables/cart/deleteFormDetail/{{$orderitem->order_id}}" onclick="return confirm('คุณต้องการยกเลิกการยืมครุภัณฑ์นี้หรือไม่ ?')">
                            <i class="fa fa-times"></i></a>
                            @elseif ($orderitem->item_status == '1')
                        </th>
                        @endif
                        
                      @endif
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <a href="/orders" class="btn btn-primary pull-right">กลับ</a>
                  @if(auth::check())

                              @if ($orderitem->status == '1')
                                    <a href="#" class="btn btn-warning text-white pull-right" style="margin-right: 10px" onclick="addmhsForm({{ $orderitem->order_id }});" id="orderall" data-id="{{ $orderitem->order_id }}" data-toggle="modal" data-target="#myModal{{ $orderitem->order_id }}">รออนุมัติ</a>
                                  @elseif ($orderitem->status == '2')
                                    {{-- <a href="#" class="btn btn-success disabled pull-right" style="margin-right: 10px" onclick="addmhsForm();" id="orderall" data-toggle="modal" data-target="#myModal{{ $orderitem->order_id }}">อนุมัติ</a> --}}
                                  @elseif ($orderitem->status == '3')
                                    <a href="#" class="btn btn-danger pull-right" style="margin-right: 10px" onclick="addmhsForm();" id="orderall" data-toggle="modal" data-target="#myModal{{ $orderitem->order_id }}">ไม่อนุมัติ</a>
                              @endif

                  @endif
                          <!-- The Modal -->
                        <div class="modal fade" id="myModal{{ $orderitem->order_id }}">
                          <div class="modal-dialog modal-dialog py-5">
                          <div class="modal-content">
                            
                              <!-- Modal Header -->
                              <div class="modal-header">
                                  <h4 class="modal-title">สถานะ</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="/confirm/edit/{{$orderitem->order_id}}">

                                      {{ csrf_field() }}
                                      {{ method_field('PUT') }}
                              <!-- Modal body -->
                              <div class="modal-body">
                                      <div class="form-group">
                                              <label><b>ชื่อผู้ยืม : </b></label>
                                              {{$orderitem->fname}} {{$orderitem->lname}}
                                              <label>|<b> สังกัด : </b></label>
                                              {{$orderitem->address}} <br>
                                              <label><b>รหัสพนักงาน : </b></label>
                                              {{$orderitem->userID}}
                                              <label>|<b> เบอร์โทร : </b></label>
                                              {{$orderitem->phone}} 
                                      </div> 
                                      <div class="form-group">
                                        <select name="status" class="form-control">
                                                <option value="1" @if($orderitem->status == '1') selected @endif>รออนุมัติ</option>
                                                <option value="2" @if($orderitem->status == '2') selected @endif>อนุมัติ</option>
                                                <option value="3" @if($orderitem->status == '3') selected @endif>ไม่อนุมัติ</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="place"><h5>หมายเหตุ : </h5></label>
                                        <input type="text" value="{{$orderitem->comment}}" name="comment" class="form-control col-md-12">
                                      </div>

                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">บันทึก</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
        </div>
    </div>


@endsection

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
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orderitems as $orderitem)
                      <tr>
                        <th scope="row"><h4><br>{{$i++}}</h4></th>
                    @if($orderitem->photo)
                        <th scope="row"><img height="90" width="100" src="{{ asset ('storage/' . $orderitem->photo) }}" alt=""/></th>
                      @else
                        <th scope="row"></th>
                    @endif
                        <th scope="row"><h4><br>{{$orderitem->item_name}}</h4></th>
                        <th scope="row"><h4><br>{{$orderitem->item_category}}</h4></th>
                    <!--    <th scope="row"><h4>{{$orderitem->item_brand}}</h4></th>
                        <th scope="row"><h4>{{$orderitem->item_gen}}</h4></th> -->
                        <th scope="row"><h4><br>{{$orderitem->item_amount}}</h4></th>
                      @if(auth::check())
                        
                        <th scope="row"><br>
                          @if($orderitem->item_status == '1')
                            <a href="/orders/detailord/{{$orderitem->item_id}}" class="btn btn-info disabled"><i class="fas fa-edit"></i> รับคืน</a>
                          @else
                          <a href="/orders/detailord/{{$orderitem->item_id}}" class="btn btn-info"><i class="fas fa-edit"></i> รับคืน</a>
                          @endif
                        </th>
                      
                        
                      @endif
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <a href="/orders" class="btn btn-primary pull-right">กลับ</a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
        </div>
    </div>


@endsection

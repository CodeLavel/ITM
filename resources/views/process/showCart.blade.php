@extends("layouts.main")
@section("content")
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3">

        <div class="row">
            <div class="col-xl-10 offset-md-1">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h3>รายการครุภัณฑ์ที่ยืม <a href="/home" class="pull-right text-success" title="หากต้องการยืมครุภัณฑ์เพิ่มเติม" style="font-size:35px"><i class="fas fa-cart-arrow-down"></i></a></h3>

                        <div class="panel-body panel-body-with-table py-3">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><h4>ลำดับ</h4></th>
                                            <th><h4>รูปภาพ</h4></th>
                                            <th><h4>ชื่อครุภัณฑ์</h4></th>
                                            <th><h4>หมวดหมู่</h4></th>
                                            {{-- <th><h4>ยี่ห้อ</h4></th>
                                            <th><h4>รุ่น</h4></th>  --}}
                                            <th><h4>จำนวน</h4></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @php
                                        $i = 1;
                                      @endphp

                                      @foreach($cartItems->items as $item)
                                        <tr>
                                            <td><br><br><h4>{{$i++}}</h4></td>
                                        @if($item['data']['photo'])
                                            <td><br><img height="90" width="100" src="{{ asset ('storage/' . $item['data']['photo']) }}" alt=""/></td>
                                        @else
                                            <td><br></td>
                                        @endif
                                            <td><br><br><h4>{{$item['data']['du_name']}}</h4></td>
                                            <td><br><br><h4>{{$item['data']['category']['category_name']}}</h4></td>
                                            <td><br><br><h4>{{$item['quantity']}}</h4></td>
                                            {{-- <td><br><br><h4>{{$item['data']['brand']}}</h4></td>
                                            <td><br><br><h4>{{$item['data']['gen']}}</h4></td> --}}

                                            <td class="py-3"><br><br>
                                                <a class="badge badge-danger" href="/durables/cart/deleteFormCart/{{$item['data']['id']}}" onclick="return confirm('คุณต้องการลบครุภัณฑ์นี้หรือไม่ ?')">
                                                  <i class="fa fa-times"></i></a>
                                            </td>
                                          
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <h4><a class="pull-right">จำนวนครุภัณฑ์ที่ยืม : {{$cartItems->totalQuantity}}</a></h4>
                          </div> <br>
                          <div class="pull-right">
                              <a href="/durables/checkout" class="btn btn-primary">ถัดไป <i class="fas fa-arrow-right"></i></a>
                          </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->

      </div> <!-- container -->

  </div> <!-- content -->
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

@endsection

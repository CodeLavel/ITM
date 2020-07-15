@extends('layouts.main')

@section('content')

  <div class="content-page">
      <div class="content">

          <!-- Start Content-->
          <div class="container-fluid">

              <!-- start page title -->
              <div class="row">
                  <div class="col-12">
                      <div class="page-title-box">
                          <h4 class="page-title">รายการครุภัณฑ์</h4>
                      </div>
                  </div>
              </div>
              <!-- end page title -->
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
                        <!--
                        <form class="app-search pull-left" action="/durables/search" method="get" style="margin:auto;max-width:300px">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="กรอกชื่อครุภัณฑ์...">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                      -->
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      @if(isset($cartItems))
                        <span class="badge offset-11" style="background:red">{{$cartItems->totalQuantity}}</span>
                      @endif
                        <a class="btn btn-primary pull-right" href="/durables/cart" role="button">
                            <i class="fas fa-shopping-cart"></i>
                        </a>

                        <div class="panel-body panel-body-with-table">
                            <div class="table-responsive py-3">

                                <table class="table" id="table_id">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><h4>ลำดับ</h4></th>
                                            <th><h4>รูปภาพ</h4></th>
                                            <th><h4>ชื่อครุภัณฑ์</h4></th>
                                            <th><h4>หมวดหมู่</h4></th>
                                            <th><h4>ยี่ห้อ</h4></th>
                                            <th><h4>รุ่น</h4></th>
                                            <th><h4>สถานที่</h4></th>
                                            <th><h4>จำนวน</h4></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      @php
                                        $i = 1;
                                      @endphp

                                    @foreach($durables as $durable)

                                        <tr>
                                            <td><br><br><h4>{{$i++}}</h4></td>
                                            <td><br>
                                              <img height="120" width="130" src="{{ asset ('storage/' . $durable->photo) }}" alt=""/>
                                            </td>
                                            <td><br><br><h4>{{$durable->du_name}}</h4></td>
                                            <td><br><br><h4>{{ optional($durable->category)->category_name }}</h4></td>
                                            <td><br><br><h4>{{$durable->brand}}</h4></td>
                                            <td><br><br><h4>{{$durable->gen}}</h4></td>
                                            <td><br><br><h4>{{ optional($durable->catagory)->catagory_name }}</h4></td>
                                            <td><br><br><h4>{{$durable->use}}</h4></td>
                                            <td>
                                              <br><br><a href="/durables/details/{{$durable->id}}" class="btn btn-warning"><h4>ยืม</h4></a>
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
              <!-- end row -->
          </div> <!-- container -->

      </div> <!-- content -->
    </div>
@endsection

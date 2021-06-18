@extends('layouts.main')

@section('content')

<script src=" {{ asset('js/number.js')}}"></script>

  <div class="content-page">
      <div class="content">
          <div class="container-fluid py-5">

              <div class="row offset-3">
                  <div class="col-md-8">
                    <h4 class="text-danger">!! กรุณาพิจารณาเลือกครุภัณฑ์ที่ต้องการให้ดีก่อนยืมและใส่ลงในตะกร้า</h4>
                          <div class="card-header">
                            <h5><i class="fas fa-edit"></i> ระบุจำนวนยืม</h5>
                          </div>
                          <div class="card-box">
                            
                                    <div class="form-group row">
                                      <label for="photo" class="col-md-2 col-form-label text-md-right">รูปภาพ : </label>
                                        <div class="col-md-7">
                                          @if(empty($durable->photo))
                                          <img height="120" width="130" src="{{asset('assets/images/durables/noImg.jpg')}}" alt=""/>
                                          @else
                                          <center><img src="{{asset('assets/images/durables')}}/{{$durable->photo}}"></center>
                                          @endif
                                        </div>
                                    </div>
                              
                            
                                    <div class="form-group row">
                                      <label for="du_name" class="col-md-2 col-form-label text-md-right">ชื่อครุภัณฑ์ : </label>
                                      <div class="col-md-7">
                                        <input type="text" name="amount" value="{{$durable->du_name}}" class="form-control" readonly>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="category_name" class="col-md-2 col-form-label text-md-right">หมวดหมู่ : </label>
                                      <div class="col-md-7">
                                        <input type="text" name="amount" value="{{$durable->category->category_name}}" class="form-control" readonly>
                                      </div>
                                    </div>
                                <!--
                                    <div class="form-group row">
                                      <label for="#" class="col-md-2 col-form-label text-md-right">ยี่ห้อ : </label>
                                      <div class="col-md-7">
                                        <input type="text" name="#" value="{{$durable->brand}}" class="form-control" readonly>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="#" class="col-md-2 col-form-label text-md-right">รุ่น : </label>
                                      <div class="col-md-7">
                                        <input type="text" name="#" value="{{$durable->gen}}" class="form-control" readonly>
                                      </div>
                                    </div>
                                -->
                                    <div class="form-group row" style="display:none">
                                      <label for="#" class="col-md-2 col-form-label text-md-right">จำนวน(ทั้งหมด) : </label>
                                      <div class="col-md-7">
                                        <input type="text" name="" value="{{$durable->use}}" onchange="Calculation()" class="form-control" id="use" readonly>
                                      </div>
                                    </div>

                                    <form action="/durables/addQuantityToCart/{{$durable->id}}" method="post">
                                    {{ csrf_field() }}
                                      <div class="form-group row">
                                        <label for="#" class="col-md-2 col-form-label text-md-right">จำนวน(คงเหลือ) : </label>
                                        <div class="col-md-7">
                                          <input type="text" name="use" value="{{$durable->use}}" onkeyup="Calculation()" class="form-control" id="row" readonly>
                                        </div>
                                      </div>


                                      <div class="form-group row">
                                        <input type="hidden" name="_id" value="{{$durable->id}}" id="amount">
                                        <label for="amount" class="col-md-2 col-form-label text-md-right">จำนวน(ยืม) :</label>
                                          <div class="col-md-7">
                                            <input type="text" maxlength="3" name="quantity" value="" class="form-control" id="bor" onkeyup="Calculation()"
                                            pattern="[0-9.]+" onkeypress="number(event)" placeholder="ระบุจำนวนยืม. . ." required>
                                          </div>
                                      </div>

                                      <script>
                                          function Calculation() {
                                              var use = document.getElementById('use').value;
                                              var bor = document.getElementById('bor').value;
                                              if(use - bor <= -1){
                                                alert("ไม่สามารถยืมได้ครุภัณท์นี้ได้ เนื่องจากจำนวนไม่เพียงพอ! ตามที่ท่านต้องการ");
                                                $("#btnSubmit").attr("disabled", true);
                                              }else{
                                                document.getElementById('row').value = use - bor;
                                                $("#btnSubmit").attr("disabled", false);
                                              }
                                          }
                                      </script>

                                      <div class="offset-2">
                                          <button type="submit" class="btn btn-success" id="btnSubmit">
                                              <i class="fas fa-save"></i> บันทึก
                                          </button>

                                          <a href="/home" class="btn btn-primary">
                                              <i class="fas fa-times"></i> ยกเลิก
                                          </a>
                                      </div>

                                </form>
                          </div>

                  </div> <!-- end col -->
              </div>
              <!-- end row -->
          </div> <!-- container -->

      </div> <!-- content -->
    </div>
@endsection

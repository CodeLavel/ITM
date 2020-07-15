@extends('layouts.main')

@section('content')

<script src=" {{ asset('js/number.js')}}"></script>

  <div class="content-page">
      <div class="content">
          <div class="container-fluid py-5">

              <div class="row offset-3">
                  <div class="col-md-7">
                          <div class="card-header">
                            <h5><i class="fas fa-edit"></i> ระบุจำนวนคืน</h5>
                          </div>
                          <div class="card-box">
                              @if($durables->photo)
                                    <div class="form-group row">
                                      <label for="photo" class="col-md-3 col-form-label text-md-right">รูปภาพ : </label>
                                        <div class="col-md-6">
                                          <img height="120" width="130" src="{{ asset ('storage/' . $durables->photo) }}" alt=""/>
                                        </div>
                                    </div>
                                @else
                                <div class="form-group row">
                                  <label for="photo" class="col-md-3 col-form-label text-md-right">รูปภาพ : </label>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                              @endif

                                    <div class="form-group row">
                                      <label for="du_name" class="col-md-3 col-form-label text-md-right">ชื่อครุภัณฑ์ : </label>
                                      <div class="col-md-6">
                                        <input type="text" name="amount" value="{{$durables->du_name}}" class="form-control" readonly>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label for="category_name" class="col-md-3 col-form-label text-md-right">หมวดหมู่ : </label>
                                      <div class="col-md-6">
                                        <input type="text" name="amount" value="{{$durables->category->category_name}}" class="form-control" readonly>
                                      </div>
                                    </div>

                                    <div class="form-group row" style="display:none;">
                                      <label for="#" class="col-md-3 col-form-label text-md-right">จำนวน(ในคลังทั้งหมด) : </label>
                                      <div class="col-md-6">
                                        <input type="text" name="" value="{{$durables->use}}" onchange="Calculation()" class="form-control" id="num1" readonly>
                                      </div>
                                    </div>

                                    <form action="/orders/addQuantityToInventory/{{$durables->id}}" method="post">
                                      {{ csrf_field() }}

                                    <div class="form-group row">
                                      <label for="#" class="col-md-3 col-form-label text-md-right">จำนวน(คลัง) : </label>
                                      <div class="col-md-6">
                                        <input type="text" name="use" value="{{$durables->use}}" onkeyup="Calculation()" class="form-control" id="sum" readonly>
                                      </div>
                                    </div>

                                      <div class="form-group row">
                                        <input type="hidden" name="_id" value="{{$durables->id}}" id="amount">
                                        <label for="amount" class="col-md-3 col-form-label text-md-right">จำนวน(คืน) :</label>
                                          <div class="col-md-6">
                                            <input type="text" name="" value="" class="form-control" id="num2" onkeyup="Calculation()"
                                            pattern="[0-9.]+" onkeypress="number(event)" placeholder="ระบุจำนวนคืน. . ." required>
                                          </div>
                                      </div>

                                      <script>
                                          function Calculation() {
                                              var num1 = document.getElementById('num1').value;
                                              var num2 = document.getElementById('num2').value;
                                              document.getElementById('sum').value = parseFloat(num1) + parseFloat(num2);
                                          }
                                      </script>

                                      <div class="offset-3">&nbsp;
                                          <button type="submit" class="btn btn-success">
                                              <i class="fas fa-save"></i> บันทึก
                                          </button>
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

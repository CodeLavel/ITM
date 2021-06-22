@extends("layouts.main")
@section("content")
<script src=" {{ asset('js/number.js')}}"></script>
<script type="text/javascript">
  function preventBack() { window.history.forward(); }
  setTimeout("preventBack()", 0);
  window.onunload = function () { null };
</script>
<div class="content-page">
    <div class="content">
<div class="container-fluid py-3">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header"><h3><i class="fas fa-user"></i> กรอกข้อมูลผู้ยืม</h3></div>

                <div class="card-body">
                      <form class="form-group" action="/durables/createOrder" method="post">
                            @csrf
                          <div class="form-group">
                            <div class="row justify-content-center">
                              <div class="col-md-4">
                                <label for="rdate"><h4>วันที่คืน <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></h4></label>
                                <input type="date" name="rdate" value="" class="form-control col-md-12" placeholder="*วันที่คืน" min="@php echo date('Y-m-d');@endphp" required>
                              </div>
                              <div class="col-md-4">
                                <label for="userID"><h4>รหัสพนักงาน <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></h4></label>
                                <input type="text" name="userID" value="" class="form-control col-md-12" placeholder="*กรอกรหัสพนักงาน" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row justify-content-center">
                              <div class="col-md-4">
                                <label for="fname"><h4>ชื่อ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></h4></label>
                                <input type="text" name="fname" value="" class="form-control col-md-12" placeholder="*ชื่อ" required>
                              </div>
                              <div class="col-md-4">
                                <label for="lname"><h4>นามสกุล  <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></h4></label>
                                <input type="text" name="lname" value="" class="form-control col-md-12" placeholder="*นามสกุล" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row justify-content-center">
                              <div class="col-md-4">
                                <label for="phone"><h4>เบอร์โทรศัพท์ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></h4></label>
                                <input type="text" name="phone" value="" pattern="[0-9.]+" onkeypress="number(event)" maxlength="10" class="form-control col-md-12" placeholder="*กรอกเบอร์โทรศัพท์" required>
                              </div>
                              <div class="col-md-4">
                                <label for="address"><h4>เลือกสังกัด <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></h4></label>
                                  <select class="form-control col-md-12" name="address" id="address" value="" autofocus>
                                    <option ></option>
                                    <option >พิพิธภัณฑ์วิทยาศาสตร์ : พวท.</option>
                                    <option >พิพิธภัณฑ์ธรรมชาติวิทยา : พธช.</option>
                                    <option >พิพิธภัณฑ์เทคโนโลยีสารสนเทศ : พทส.</option>
                                    <option >สำนักงานพัฒนาธุรกิจและการตลาด : สธต.</option>
                                    <option >สำนักพัฒนาความตระหนักด้านวิทยาศาสตร์ : สพต.</option>
                                    <option >สำนักบริหาร : สบร.</option>
                                    <option >สำนักยุทธศาสตร์และแผน : สยศ.</option>
                                    <option >สำนักโครงการพิเศษ : สคพ.</option>
                                    <option >พิพิธภัณฑ์พระรามเก้า : พพก.</option>
                                  </select>
                                </div>
                            </div>
                          </div>  
                          <div class="form-group">
                            <div class="row justify-content-center">
                              <div class="col-md-4">
                                <label for="place"><h4>สถานที่นำไปใช้ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></h4></label>
                                <textarea type="textarea" name="place" rows="5" cols="40" class="form-control col-md-12" placeholder="*โปรดระบุสถานที่ที่นำไปใช้ให้ละเอียด และชัดเจน" required></textarea>
                              </div>
                            </div>
                          </div>            
                          <div class="form-group">
                            <div class="row justify-content-center">
                              <div class="col-md-6">
                              <input type="submit" name="" value="ยืนยัน" class="form-control btn btn-success">
                            </div>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

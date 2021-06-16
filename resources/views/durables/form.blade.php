
<div class="form-group {{ $errors->has('du_name') ? 'has-error' : '' }}">
    <label for="du_name" class="col-md-2 control-label">ชื่อครุภัณฑ์ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
    <div class="col-md-10">
        <input class="form-control" name="du_name" type="text" id="du_name" value="{{ old('du_name', optional($durable)->du_name) }}" minlength="1" placeholder="กรอกชื่อครุภัณฑ์..." required>
        {!! $errors->first('du_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!--
<div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
    <label for="brand" class="col-md-2 control-label">ชื่อยี่ห้อ</label>
    <div class="col-md-10">
        <input class="form-control" name="brand" type="text" id="brand" value="{{ old('brand', optional($durable)->brand) }}" minlength="1" placeholder="กรอกชื่อยี่ห้อ...">
        {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gen') ? 'has-error' : '' }}">
    <label for="gen" class="col-md-2 control-label">ชื่อรุ่น</label>
    <div class="col-md-10">
        <input class="form-control" name="gen" type="text" id="gen" value="{{ old('gen', optional($durable)->gen) }}" minlength="1" placeholder="กรอกชื่อรุ่น...">
        {!! $errors->first('gen', '<p class="help-block">:message</p>') !!}
    </div>
</div>
-->
<div class="form-group {{ $errors->has('duID') ? 'has-error' : '' }}">
    <label for="duID" class="col-md-2 control-label">รหัสครุภัณฑ์ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
    <div class="col-md-10">
        <input class="form-control" name="duID" type="text" id="duID" value="{{ old('duID', optional($durable)->duID) }}" minlength="1" placeholder="กรอกรหัสครุภัณฑ์...">
        {!! $errors->first('duID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">หมวดหมู่ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
    <div class="col-md-10">
        <select class="form-control" id="category_id" name="category_id">
        	    <option value="" style="display: none;" {{ old('category_id', optional($durable)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>-- เลือกหมวดหมู่ --</option>
        	@foreach ($categories as $key => $category)
			    <option value="{{ $key }}" {{ old('category_id', optional($durable)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $category }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('catagory_id') ? 'has-error' : '' }}">
    <label for="catagory_id" class="col-md-2 control-label">สถานที่ครุภัณฑ์ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
    <div class="col-md-10">
        <select class="form-control" id="catagory_id" name="catagory_id">
        	    <option value="" style="display: none;" {{ old('catagory_id', optional($durable)->catagory_id ?: '') == '' ? 'selected' : '' }} disabled selected>-- เลือกสถานที่ --</option>
        	@foreach ($catagories as $key => $catagory)
			    <option value="{{ $key }}" {{ old('catagory_id', optional($durable)->catagory_id) == $key ? 'selected' : '' }}>
			    	{{ $catagory }}
			    </option>
			      @endforeach
        </select>

        {!! $errors->first('catagory_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">จำนวนทั้งหมด <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
    <div class="col-md-10">
        <input class="form-control" name="amount" type="number" id="amount" onchange="Calculation()"
        value="{{ old('amount', optional($durable)->amount) }}" onkeypress="number(event)" minlength="1" placeholder="ระบุจำนวน...">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('break') ? 'has-error' : '' }}">
    <label for="break" class="col-md-2 control-label">จำนวนที่เสีย-พัง</label>
    <div class="col-md-10">
        <input class="form-control" name="break" type="number" id="breaks" onkeyup="Calculation()"
        value="{{ old('break', optional($durable)->break) }}" onkeypress="number(event)" minlength="1" placeholder="* ถ้ามี">
        {!! $errors->first('break', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('use') ? 'has-error' : '' }}">
    <label for="use" class="col-md-2 control-label">จำนวนที่ใช้ได้ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
    <div class="col-md-10">
        <input class="form-control" name="use" type="text" id="use" value="{{ old('use', optional($durable)->use) }}" onkeypress="number(event)" minlength="1">
        {!! $errors->first('use', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script>
    function Calculation() {
        var amount = document.getElementById('amount').value;
        var breaks = document.getElementById('breaks').value;
        document.getElementById('use').value = amount - breaks;
    }
</script>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">รูปภาพ</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                  <input type="file" name="photo" id="photo" class="hidden">
                </span>
            </label>
        </div>

        @if (isset($durable->photo) && !empty($durable->photo))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_photo" class="custom-delete-file" value="1" {{ old('custom_delete_photo', '0') == '1' ? 'checked' : '' }}> ลบรูปภาพ
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    <img src="{{asset('assets/images/durables')}}/{{$durable->photo}}">
                </span>
            </div>
        @endif
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script src=" {{ asset('js/number.js')}}"></script>

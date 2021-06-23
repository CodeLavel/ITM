
<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
    <div class="col-md-6">
        <label>ชื่อผู้ใช้งาน <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
        <input class="form-control" name="username" type="text" id="username" value="{{ old('username', optional($users)->username) }}" minlength="1" placeholder="กรอกชื่อผู้ใช้งาน..." required>
        {!! $errors->first('username', '<p class="help-block" style="color: red;">:message</p>') !!} <br>
        <label>ชื่อ-นามสกุล <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
        <input class="form-control" name="names" type="text" id="names" value="{{ old('names', optional($users)->names) }}" minlength="1" placeholder="กรอกชื่อ-นามสกุล..." required>
        {!! $errors->first('names', '<p class="help-block" style="color: red;">:message</p>') !!} 
        <br>
        <label>อีเมล์ <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($users)->email) }}" minlength="1" placeholder="อีเมล์..." required>
        {!! $errors->first('email', '<p class="help-block" style="color: red;">:message</p>') !!} 
        <br>
        <label>รหัสผ่าน <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($users)->password) }}" minlength="1" placeholder="รหัสผ่าน..." required>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        <br>
        <label>ตำแหน่ง <span style="color: red; font-size: 12px">(จำเป็นต้องกรอก)</span></label>
        <div class="col-md-8">
                <select class="form-control" id="position" name="position">
                        {{-- <option value="" style="display: none;" {{ old('catagory_id', optional($durable)->catagory_id ?: '') == '' ? 'selected' : '' }} disabled selected>-- เลือกสถานที่ --</option>
                    @foreach ($catagories as $key => $catagory)
                        <option value="{{ $key }}" {{ old('catagory_id', optional($durable)->catagory_id) == $key ? 'selected' : '' }}>
                            {{ $catagory }}
                        </option>
                          @endforeach --}}
                          <option value="">เลือกตำแหน่ง</option>
                          <option value="นักวิชาการ">นักวิชาการ</option>
                </select>
        {!! $errors->first('catagory_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
    <div class="col-md-10">
        <input class="form-control" name="username" type="text" id="username" value="{{ old('username', optional($users)->username) }}" minlength="1" placeholder="กรอกชื่อหมวดหมู่ครุภัณฑ์..." required>
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!} <br>
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($users)->email) }}" minlength="1" placeholder="email..." required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
        <br>
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($users)->password) }}" minlength="1" placeholder="password..." required>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

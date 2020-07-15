
<div class="form-group {{ $errors->has('category_name') ? 'has-error' : '' }}">
    <div class="col-md-10">
        <input class="form-control" name="category_name" type="text" id="category_name" value="{{ old('category_name', optional($category)->category_name) }}" minlength="1" placeholder="กรอกชื่อหมวดหมู่ครุภัณฑ์..." required>
        {!! $errors->first('category_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

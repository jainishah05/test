<div class="form-group {{ $errors->has('coupon_code') ? 'has-error' : ''}}">
    <label for="coupon_code" class="control-label">{{ 'Coupon Code' }}</label>
    <input class="form-control" name="coupon_code" type="text" id="coupon_code" value="{{ isset($coupon->coupon_code) ? $coupon->coupon_code : ''}}" >
    {!! $errors->first('coupon_code', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ 'Amount' }}</label>
    <input class="form-control" name="amount" type="number" id="amount" value="{{ isset($coupon->amount) ? $coupon->amount : ''}}" min="0" >
    {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('amount_type') ? 'has-error' : ''}}">
    <label for="amount_type" class="control-label">{{ 'Amount Type' }}</label>
    <select name="amount_type" class="form-control" id="amount_type" >
    @if($formMode === 'create')
        <option value="">--Select--</option>
    @endif
    @foreach (json_decode('{"percentage":"Percentage","fixed":"Fixed"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($coupon->amount_type) && $coupon->amount_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('amount_type', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : ''}}">
    <label for="expiry_date" class="control-label">{{ 'Expiry Date' }}</label>
    <input class="form-control" name="expiry_date" type="date" id="expiry_date" value="{{ isset($coupon->expiry_date) ? $coupon->expiry_date : ''}}" placeholder="dd-mm-yyyy">
    {!! $errors->first('expiry_date', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($coupon) && 1 == $coupon->status) ? 'checked' : '' }}> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{ (isset($coupon) && 0 == $coupon->status) ? 'checked' : '' }}> Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

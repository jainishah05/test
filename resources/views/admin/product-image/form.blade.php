@if($formMode === 'edit')
	<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
	    <label for="product_id" class="control-label">{{ 'Products' }}</label>
            <select name="product_id" id="product_id" class="form-control" >
                @foreach($product as $pro) 
                    <option value="{{ $pro->id }}" @if($productimage->product_id == $pro->id) selected @endif>{{ $pro->name }}</option>
                @endforeach
            </select>
	    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
	</div>
@else
	<div class="form-group {{ $errors->has('product_id') ? 'has-error' : ''}}">
	    <label for="product_id" class="control-label">{{ 'Products' }}</label>
            <select name="product_id" id="product_id" class="form-control" >
                @foreach($product as $pro)
                    <option value="{{ $pro->id }}" @if($product_id == $pro->id) selected @endif>{{ $pro->name }}</option>
                @endforeach
            </select>
	    {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
	</div>
@endif
@if($formMode === 'edit')
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label">{{ 'Image' }}</label>
        <input class="form-control" name="image[]" type="file" id="image" value="" multiple>
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
@else
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label">{{ 'Image' }}</label>
        <input class="form-control" name="image[]" type="file" id="image" value="" multiple>
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
@endif


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

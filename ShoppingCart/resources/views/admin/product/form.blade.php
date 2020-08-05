<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($product->name) ? $product->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode === 'edit')
    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
        <label for="category_id" class="control-label">{{ 'Categories' }}</label>
            <select name="category_id" id="category_id" class="form-control" >
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @foreach($product->categories as $c) @if($c->id == $cat->id) selected @endif @endforeach>{{ $cat->category }}</option>
                @endforeach
            </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
@else
    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
        <label for="category_id" class="control-label">{{ 'Categories' }}</label>
            <select name="category_id" id="category_id" class="form-control" >
                <option value=" ">--Select One--</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                @endforeach
            </select>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
@endif
<div class="form-group {{ $errors->has('product_code') ? 'has-error' : ''}}">
    <label for="product_code" class="control-label">{{ 'Product Code' }}</label>
    <input class="form-control" name="product_code" type="text" id="product_code" value="{{ isset($product->product_code) ? $product->product_code : ''}}" >
    {!! $errors->first('product_code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Color' }}</label>
    <input class="form-control" name="color" type="text" id="color" value="{{ isset($product->product_code) ? $product->color : ''}}" >
    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('featured') ? 'has-error' : ''}}">
    <input type="hidden" value=" " name="featured">
    <input name="featured" type="checkbox" id="featured" {{ isset($product->featured) && $product->featured == 'on' ? 'checked' : ''}}>
    <label for="featured" class="control-label">{{ 'Is_featured' }}</label>
    {!! $errors->first('featured', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('recommended') ? 'has-error' : ''}}">
    <input type="hidden" value=" " name="recommended">
    <input name="recommended" type="checkbox" id="recommended" {{ isset($product->recommended) && $product->recommended == 'on' ? 'checked' : ''}}>
    <label for="recommended" class="control-label">{{ 'Is_recommended' }}</label>
    {!! $errors->first('recommended', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($product->description) ? $product->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($product->price) ? $product->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

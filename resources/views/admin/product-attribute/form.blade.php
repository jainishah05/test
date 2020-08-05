@if($formMode === 'edit')
    @foreach($attribute as $attr)
        <div class="form-group box {{ $errors->has('$attr->name') ? 'has-error' : ''}}" id="{{ $attr->id }}" style="display: none">
            <label for="{{ $attr->name }}" class="control-label">{{ $attr->name }}</label>
                <select name="{{ $attr->name }}" id="{{ $attr->id }}" class="form-control test" >
                    @foreach($attributevalue as $attrval)
                        @if($attrval->attribute_id == $attr->id)
                            <option value="{{ $attrval->value }}" @if($productAttr->color == $attrval->value || $productAttr->size == $attrval->value) selected @endif >{{ $attrval->value }}</option>
                        @endif
                    @endforeach
                </select>
            {!! $errors->first('{{ $attr->name }}', '<p class="help-block">:message</p>') !!}
        </div>
    @endforeach
@else
    @foreach($attribute as $attr)
        <div class="form-group box {{ $errors->has('$attr->name') ? 'has-error' : ''}}" id="{{ $attr->id }}" style="display: none">
            <label for="{{ $attr->name }}" class="control-label">{{ $attr->name }}</label>
                <select name="{{ $attr->name }}" id="{{ $attr->id }}" class="form-control" >
                    <option value="0">--Select Value--</option>
                    @foreach($attributevalue as $attrval)
                        @if($attrval->attribute_id == $attr->id)
                            <option value="{{ $attrval->value }}">{{ $attrval->value }}</option>
                        @endif
                    @endforeach
                </select>
            {!! $errors->first('{{ $attr->name }}', '<p class="help-block">:message</p>') !!}
        </div>
    @endforeach
@endif
<div class="form-group">
    <input class="form-control" name="attribute_id" type="hidden" id="attribute_id" value="">
</div>
<div class="form-group {{ $errors->has('sku') ? 'has-error' : ''}}" id="sku" style="display: none">
    <label for="sku" class="control-label">{{ 'Sku' }}</label>
    <input type="text" class="form-control" name="sku" value="{{ isset($productAttr->sku) ? $productAttr->sku : ''}} ">
    {!! $errors->first('sku', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}" id="price" style="display: none">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input type="number" class="form-control" name="price" value="{{ isset($productAttr->price) ? $productAttr->price : ''}}">
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}" id="quantity" style="display: none" >
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input type="number" class="form-control" name="quantity" value="{{ isset($productAttr->quantity) ? $productAttr->quantity : ''}}">
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
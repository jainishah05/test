<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" rows="5" name="title" type="text" id="title" value="{{ isset($banner->title) ? $banner->title : ''}}">
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Link' }}</label>
    <input class="form-control" rows="5" name="link" type="text" id="link" value="{{ isset($banner->link) ? $banner->link : ''}}">
    {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode === 'edit')
    <img id="image" src="{{url('/uploads/banners/'.$banner->image)}}" width = "100" height = "80" ><br>
    <lable class="text-secondary" name="img">{{ $banner->image }}</lable>
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label">{{ 'Image' }}</label>
        <input class="form-control" name="image" type="file" id="image" value="" >
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
@else
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        <label for="image" class="control-label">{{ 'Image' }}</label>
        <input class="form-control" name="image" type="file" id="image" value=" " >
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
@endif
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($banner) && 1 == $banner->status) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{ (isset($banner) && 1 == $banner->status) ? 'checked' : '' }}> No</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

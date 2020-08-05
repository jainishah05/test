<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($cmspage->title) ? $cmspage->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="control-label">{{ 'Url' }}</label>
    <input class="form-control" name="url" type="text" id="url" value="{{ isset($cmspage->url) ? $cmspage->url : ''}}" >
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="summernote form-control" rows="5" name="description" id="description">{{ isset($cmspage->description) ? $cmspage->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($cmspage->description) ? $cmspage->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <div class="radio">
    <label><input name="status" type="radio" value="1" {{ (isset($cmspage) && 1 == $cmspage->status) ? 'checked' : '' }}> Active</label>
</div>
<div class="radio">
    <label><input name="status" type="radio" value="0" {{ (isset($cmspage) && 0 == $cmspage->status) ? 'checked' : '' }}> Inactive</label>
</div>
    {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

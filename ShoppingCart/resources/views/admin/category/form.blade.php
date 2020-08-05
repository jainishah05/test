<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    <label for="category" class="control-label">{{ 'Category' }}</label>
    <input class="form-control" name="category" type="text" id="category" value="{{ isset($category->category) ? $category->category : ''}}">
    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode === 'edit')
	<div class="form-group {{ $errors->has('parent_category') ? 'has-error' : ''}}">
	    <label for="parent_category" class="control-label">{{ 'Parent Category' }}</label>
	    <select name="parent_category" id="parent_category" class="form-control" >
		        @foreach($categories as $cat)
		            <option value="{{ $cat->category }}" @if($category->parent_category == $cat->category) selected @endif>{{ $cat->category }}</option>
		        @endforeach
	    </select>
	    {!! $errors->first('parent_category', '<p class="help-block">:message</p>') !!}
	</div>
@else
	<div class="form-group {{ $errors->has('parent_category') ? 'has-error' : ''}}">
	    <label for="parent_category" class="control-label">{{ 'Parent Category' }}</label>
	    <select name="parent_category" id="parent_category" class="form-control" >
	    	<option value="" selected disabled>--Select--</option>
	    	@foreach($categories as $category)
	            <option value="{{ isset($category->id) ? $category->category : '' }}">{{ $category->category }}</option>
	        @endforeach
	    </select>
	    {!! $errors->first('parent_category', '<p class="help-block">:message</p>') !!}
	</div>
@endif
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

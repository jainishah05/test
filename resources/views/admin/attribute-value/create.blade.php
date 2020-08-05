@extends('layouts.admin.admin')
@section('content')
    <div class="container">
            @if($message = Session::get('flash_message')) 
                      <div class="alert alert-info alert-dismissible" role="alert">
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                       {{ $message }}
                      </div>
                    @endif
        <div class="row">
            <div class="col-md-3 mt-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/attribute') }}">General</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 mt-3">
                <div class="card">
                    <div class="card-header">Attribute-Value</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/attribute/'.$attribute_id.'/edit') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('admin/attribute-value/') }}" accept-charset="UTF-8" class="form-horizontal" >
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('attribute_id') ? 'has-error' : ''}}">
                                <input class="form-control" name="attribute_id" type="hidden" id="attribute_id" value="{{ $attribute_id }}" >
                                {!! $errors->first('attribute_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
                                <label for="value" class="control-label">{{ 'Value' }}</label>
                                <input class="form-control" name="value" type="text" id="value" value=" " >
                                {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="card">    
                    <div class="card-header">Attribute-Value</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th><th>Value</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($attributevalue as $item)
                                @if($attribute_id == $item->attribute_id)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->value }}</td>
                                    <td>
                                        <a href="{{ url('admin/attribute-value/' . $item->id . '/edit/'.$item->attribute_id)}}" title="Edit Attribute"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                        <form method="POST" action="{{ url('/admin/attribute-value' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input class="form-control" name="attribute_id" type="hidden" id="attribute_id" value="{{ $attribute_id }}" >
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Attribute" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

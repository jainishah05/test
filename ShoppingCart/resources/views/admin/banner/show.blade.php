@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Banner {{ $banner->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/banner/' . $banner->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>

                        <form method="POST" action="{{ url('admin/banner' . '/' . $banner->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $banner->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $banner->title }} </td></tr><tr><th> Link </th><td> {{ $banner->link }} </td></tr><tr><th> Image </th><td><img class="" src="{{url('/uploads/banners/'.$banner->image)}}" alt="{{$banner->image}} " width="150px" height="100px"></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

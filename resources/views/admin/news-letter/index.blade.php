@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    @if($message = Session::get('flash_message')) 
                      <div class="alert alert-info alert-dismissible" role="alert">
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                       {{ $message }}
                      </div>
                      @endif 
                    <div class="card-header">NewsLetters</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/admin/news-letter') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Email</th><th>Status</th><th>Created On</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($newsletterSubscriber as $index => $item)
                                    <tr>
                                        <td>{{ $index + $newsletterSubscriber->firstItem() }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->status == 1)
                                               <a href="{{ url('admin/news-letter/'.$item->id.'/edit/0') }}"><span style="color: green">Active</span></a> 
                                            @else
                                                <a href="{{ url('admin/news-letter/'.$item->id.'/edit/1') }}"><span style="color: red">Inactive</span></a>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <form method="POST" action="{{ url('/admin/news-letter' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $newsletterSubscriber->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

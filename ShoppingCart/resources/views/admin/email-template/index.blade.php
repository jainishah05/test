@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Email Template</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/email-template/create') }}" class="btn btn-success btn-sm" title="Add New EmailTemplate">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/email-template') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Slug</th><th>Subject</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($emailtemplate as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->slug }}</td><td>{{ $item->subject }}</td>
                                        <td>
                                            <a href="{{ url('/admin/email-template/' . $item->id) }}" title="View EmailTemplate"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/email-template/' . $item->id . '/edit') }}" title="Edit EmailTemplate"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/admin/email-template' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete EmailTemplate" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $emailtemplate->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

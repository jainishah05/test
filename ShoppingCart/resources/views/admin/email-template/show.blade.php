@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Email Template {{ $emailtemplate->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/email-template') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/email-template/' . $emailtemplate->id . '/edit') }}" title="Edit EmailTemplate"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></button></a>

                        <form method="POST" action="{{ url('admin/emailtemplate' . '/' . $emailtemplate->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete EmailTemplate" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $emailtemplate->id }}</td>
                                    </tr>
                                    <tr><th> Slug </th><td> {{ $emailtemplate->slug }} </td></tr><tr><th> Subject </th><td> {{ $emailtemplate->subject }} </td></tr><tr><th> Message </th><td> {{ $emailtemplate->message }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

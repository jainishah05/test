@extends('layouts.admin.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Product {{ $product->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></i></button></a>

                        <form method="POST" action="{{ url('admin/product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $product->name }} </td>
                                    </tr>
                                    <tr><th> Category </th>
                                        <td>
                                        @foreach($product->categories as $cat)
                                            {{ $cat->category }}
                                        @endforeach
                                    </td>
                                    </tr>
                                    <tr><th> Product Code </th>
                                        <td>{{ $product->product_code }}</td>
                                    </tr>
                                    <tr><th> Featured </th>
                                        <td>
                                            @if($product->featured == 'on')
                                                Yes
                                            @else
                                               No
                                            @endif
                                        </td>
                                    </tr>
                                    <tr><th> Recommended </th>
                                        <td>
                                            @if($product->recommended == 'on')
                                                Yes
                                            @else
                                               No
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {{ $product->description }} </td>
                                    </tr>
                                    <tr>
                                        <th> Price </th>
                                        <td> {{ $product->price }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

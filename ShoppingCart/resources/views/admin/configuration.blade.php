@extends('layouts.admin.admin')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">Configuration Management</div>
                    <div class="card-body">
                        <form>
                            <button type="submit" name="admin_email" class="btn btn-success btn-sm" title="Admin Email">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                Admin Email 
                            </button>
                            <button type="submit" name="favicon" class="btn btn-success btn-sm" title="favicon">
                                <i class="fa fa-magic" aria-hidden="true"></i>
                               Favicon
                            </button>
                        </form>
                        <br><br>
                        
                        <div class="flex-center position-ref">
                        <div>
                            @php
                                if(isset($_GET["Update1"]))
                                {
                                    update(1,$_GET["value"]);
                                }
                                if(isset($_GET["Update2"]))
                                {
                                    update(2,$_GET["value"]);
                                }
                            @endphp
                            <form class="border p-3" method="get" action="{{ url('admin/config') }}"> 
                                @csrf
                                <input type="hidden" name="_method" value="PATCH" />
                                @php
                                    if(isset($_GET["admin_email"])){
                                @endphp
                                <div class="form-group">
                                    <label>Type:</label>
                                        <input type="text" class="form-control" name="type" placeholder="" 
                                            value="Admin Email" autocomplete="off" disabled/>
                                </div>
                                <div class="form-group">
                                    <label>Value:</label>
                                            <input type="text" class="form-control" name="value" placeholder="" 
                                            value="{{ get_config('admin_email') }}" autocomplete="off" />
                                </div>
                                <hr>
                                <center>
                                    <button type="submit" name="Update1" class="btn btn-primary mt-2"><b>Update</b> </button>
                                    <a href = "{{ url('admin\config') }}" name="cancle" class="btn btn-success mt-2"><b>Cancle</b></a>
                                </center>
                                @php
                                    }elseif(isset($_GET["favicon"])){
                                @endphp
                                <div class="form-group">
                                    <label>Type:</label>
                                        <input type="text" class="form-control" name="type" placeholder="" value="Favicon" autocomplete="off" disabled/>
                                </div>
                                <div class="form-group">
                                    <label>Value:</label>
                                        <input type="text" class="form-control" name="value" placeholder="" value="{{ get_config('favicon') }}" autocomplete="off" />
                                <hr>
                                <center>    
                                    <button type="submit" name="Update2" class="btn btn-primary mt-2"><b>Update</b> </button>
                                    <a href = "{{ url('admin\config') }}" name="cancle" class="btn btn-success mt-2"><b>Cancle</b></a>
                                </center>
                                </div>
                                @php
                                    }else{
                                @endphp
                                <div class="form-group">
                                    <label>Type:</label>
                                        <input type="text" class="form-control" name="type" placeholder="" 
                                            value="" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label>Value:</label>
                                        <input type="text" class="form-control" name="value" placeholder="" 
                                            value="" autocomplete="off" />
                                </div>
                                @php
                                    }
                                @endphp 
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
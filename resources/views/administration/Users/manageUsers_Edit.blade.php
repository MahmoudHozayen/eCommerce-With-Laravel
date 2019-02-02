@extends('layouts.adminLayout.masterLayout')
@section('content')
<div class="col-xl-9">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body card-block">
                        @include('adminLayout.errors')
                        
                            <form action="{{ url()->current() }}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" id="name" name="name" placeholder="Username" class="form-control" value="{{$id->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-picture-o"></i>
                                        </div>
                                        <input type="file" id="avatar" name="avatar" placeholder="Avatar" class="form-control">                                    
                                    </div>
                                </div>                                  
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-users"></i>
                                        </div> 
                                        <select name="groupID" id="groupID" class="form-control">
                                            @foreach($roles as $role => $value)
                                                <option 
                                                name="{{ $value }}" 
                                                value="{{ $value }}" 
                                                id="groupID"  
                                                @if($id->groupID == $value)
                                                    {{'selected'}}
                                                @endif>
                                                    {{ $role }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                    
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{$id->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
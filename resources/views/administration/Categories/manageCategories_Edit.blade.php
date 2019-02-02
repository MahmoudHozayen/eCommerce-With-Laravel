@extends('layouts.adminLayout.masterLayout')
@section('content')
<div class="col-xl-9">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body card-block">
                        @include('Layouts.adminLayout.errors')
                        
                            <form action="{{ url()->current() }}" method="post" class=""  enctype="multipart/form-data">
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
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <textarea name="description" id="description" rows="5"class="form-control" placeholder="Description">{{$id->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Parent</div>

                                        <select name="parent" id="parent" class="form-control">
                                            <option name="parent" value="0" id="parent">--Parent--</option> 
                                            @foreach($Categories as $cat)
                                                <option 
                                                    name="{{$cat['name']}}" 
                                                    value="{{$cat['id']}}" 
                                                    id="{{$cat['id']}}"
                                                    @if($cat['id'] == $id->id)
                                                        {{'selected'}}
                                                    @endif
                                                >
                                                    {{$cat['name']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                                 
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Visibility</div>
                                        <select name="visibility" id="visibility" class="form-control">
                                            @if($id->visibility == 0)
                                                <option selected name="visibility" value="0" id="visibility">Invisible</option>
                                                <option  name="visibility" value="1" id="visibility">Visible</option>                                                
                                            @else
                                                <option  name="visibility" value="0" id="visibility">Invisible</option>                                            
                                                <option  selected name="visibility" value="1" id="visibility">Visible</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Allow Comments</div>
     
                                        <select name="allowComment" id="allowComment" class="form-control">
                                            @if($id->allowComment == 0)
                                                <option selected name="allowComment" value="0" id="allowComment">Not Allowed</option>
                                                <option  name="allowComment" value="1" id="allowComment">Allowed</option>                                                
                                            @else
                                                <option  name="allowComment" value="0" id="allowComment">Not Allowed</option>                                            
                                                <option  selected name="allowComment" value="1" id="allowComment">Allowed</option>
                                            @endif                                            
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Allow Ads</div>
                                        <select name="allowAds" id="allowAds" class="form-control">
                                            @if($id->allowAds == 0)
                                                <option selected name="allowAds" value="0" id="allowAds">Not Allowed</option>
                                                <option  name="allowAds" value="1" id="allowAds">Allowed</option>                                                
                                            @else
                                                <option  name="allowAds" value="0" id="allowAds">Not Allowed</option>                                            
                                                <option  selected name="allowAds" value="1" id="allowAds">Allowed</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-picture-o"></i>
                                        </div>
                                        <input type="file" id="categoryImg" name="categoryImg" placeholder="category Img" class="form-control">                                    
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
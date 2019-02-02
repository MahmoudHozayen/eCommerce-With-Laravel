@extends('layouts.adminLayout.masterLayout')
@section('content')
<div class="col-xl-9">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Add Category</div>
                    <div class="card-body card-block">
                        @include('Layouts.adminLayout.errors') <!-- Errors  -->
                        <form action="{{ url()->current() }}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="name" name="name" placeholder="Category Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <textarea name="description" id="description" rows="5"class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Parent</div>

                                    <select name="parent" id="parent" class="form-control">
                                        <option name="parent" value="0" id="parent">---Parent</option>
                                        @foreach($Categories as $cat)
                                            <option name="{{$cat['name']}}" value="{{$cat['id']}}" id="{{$cat['id']}}">{{$cat['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Visibility</div>
 
                                    <select name="visibility" id="visibility" class="form-control">
                                        <option name="visibility" value="0" id="visibility">Invisible</option>
                                        <option name="visibility" value="1" id="visibility">Visible</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Allow Comments</div>
 
                                    <select name="allowComment" id="allowComment" class="form-control">
                                        <option name="allowComment" value="0" id="allowComment">Not Allowed</option>
                                        <option name="allowComment" value="1" id="allowComment">Allowed</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Allow Ads</div>
                                    <select name="allowAds" id="allowAds" class="form-control">
                                        <option name="allowAds" value="0" id="allowAds">Not Allowed</option>
                                        <option name="allowAds" value="1" id="allowAds">Allowed</option>
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
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
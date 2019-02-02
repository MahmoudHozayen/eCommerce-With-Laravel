@extends('layouts.adminLayout.masterLayout')
@section('content')
<div class="col-xl-9">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Edit item</div>
                    <div class="card-body card-block">
                        @include('Layouts.adminLayout.errors') <!-- Errors  -->
                        <form action="{{ route('edit-items' , $id->id)}}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-shopping-cart"></i> Item Name
                                    </div>
                                    <input type="text" id="name" name="name" placeholder="Item Name" class="form-control" value="{{ $id->name}}">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-usd"></i> Price
                                    </div>
                                    <input type="number" id="price" name="price" placeholder="Item price" class="form-control" value="{{ $id->price}}">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-qrcode"></i> Quantity</div>
                                    <input type="number" id="quantity" name="quantity" placeholder="Item quantity" class="form-control" value="{{ $id->quantity}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-flag"></i> Country Made
                                    </div>
 
                                    <select name="countryMade" id="countryMade" class="form-control">
                                            @foreach($countryList as $country => $value)
                                                <option name="{{$country}}" value="{{$country}}" id="{{$country}}" @if($id->countryMade == $country) {{'selected'}} @endif>{{$value}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-sort-alpha-asc"></i> Item Status
                                    </div>
 
                                    <select name="itemStatus" id="itemStatus" class="form-control">
                                            @foreach($itemStatus as $status => $value)
                                                <option name="{{$status}}" value="{{$status}}" id="{{$status}}" @if($id->itemStatus == $status) {{'selected'}} @endif>{{$value}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>                             
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-star-half"></i> Rating 
                                    </div>
                                    <select name="rating" id="rating" class="form-control">
                                        @for($r=1; $r<=10; $r++)
                                            <option name="{{$r}}" value="{{$r}}" id="{{$r}}" @if($id->rating == $r) {{'selected'}} @endif>{{$r}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> Approval Status</div>
                                    <select name="approvalStatus" id="approvalStatus" class="form-control">
                                        <option name="approvalStatus" value="0" id="approvalStatus" @if($id->approvalStatus == 0) {{'selected'}} @endif>Not Approved</option>
                                        <option name="approvalStatus" value="1" id="approvalStatus" @if($id->approvalStatus == 1) {{'selected'}} @endif>Approved</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Best Seller</div>
                                    <select name="bestSeller" id="bestSeller" class="form-control">
                                        <option name="bestSeller" value="0" id="bestSeller" @if($id->bestSeller == 0) {{'selected'}} @endif>Not Best Seller</option>
                                        <option name="bestSeller" value="1" id="bestSeller" @if($id->bestSeller == 1) {{'selected'}} @endif>Best Seller</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Featured In Home Page</div>
                                    <select name="featured" id="featured" class="form-control">
                                        <option name="featured" value="0" id="featured" @if($id->featured == 0) {{'selected'}} @endif>Not Featured</option>
                                        <option name="featured" value="1" id="featured" @if($id->featured == 1) {{'selected'}} @endif>Featured</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-usd"></i> On Sale
                                    </div>
                                    <input type="number" id="sale" name="sale" placeholder="Item Sale" class="form-control" value="{{ $id->sale}}">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-picture-o"></i> Item Img 
                                    </div>

                                    <input type="file" name="itemImg">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-users "></i> member id
                                    </div>
                                    <select name="member_id" id="member_id" class="form-control">
                                        @foreach($Users as $user)
                                            <option name="{{$user['name']}}" value="{{$user['id']}}" id="{{$user['id']}}" @if($id->member_id == $user['id']) {{'selected'}} @endif>{{$user['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-users "></i> cat id
                                    </div>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        @foreach($Categories as $cat)
                                            <option 
                                                    name="{{ $cat['name'] }}" 
                                                    value="{{ $cat['id'] }}" 
                                                    id="{{ $cat['id']}}" 
                                                    @if($id->cat_id == $cat['id']) 
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
                                    <div class="input-group-addon">
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                    <textarea name="description" id="description" rows="5"class="form-control" placeholder="Description">{{$id->description}}</textarea>
                                </div>
                            </div>                             
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <textarea name="tags" id="tags" rows="2"class="form-control" placeholder="Tags">{{$id->tags}}</textarea>
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
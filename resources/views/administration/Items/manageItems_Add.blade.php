@extends('layouts.adminLayout.masterLayout')
@section('content')
<div class="col-xl-9">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Add item</div>
                    <div class="card-body card-block">
                        @include('Layouts.adminLayout.errors') <!-- Errors featured  -->
                        <form action="{{ url()->current() }}" method="post" class="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-shopping-cart"></i> Item Name
                                    </div>
                                    <input type="text" id="name" name="name" placeholder="Item Name" class="form-control">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-usd"></i> Price
                                    </div>
                                    <input type="number" id="price" name="price" placeholder="Item price" class="form-control">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-qrcode"></i> Quantity</div>
                                    <input type="number" id="quantity" name="quantity" placeholder="Item quantity" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-flag"></i> Country Made
                                    </div>
 
                                    <select name="countryMade" id="countryMade" class="form-control">
                                            @foreach($countryList as $country => $value)
                                                <option name="{{$country}}" value="{{$country}}" id="{{$country}}">{{$value}}</option>
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
                                                <option name="{{$status}}" value="{{$status}}" id="{{$status}}">{{$value}}</option>
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
                                            <option name="{{$r}}" value="{{$r}}" id="{{$r}}">{{$r}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"> Approval Status</div>
                                    <select name="approvalStatus" id="approvalStatus" class="form-control">
                                        <option name="approvalStatus" value="0" id="approvalStatus">Not Approved</option>
                                        <option name="approvalStatus" value="1" id="approvalStatus">Approved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Best Seller</div>
                                    <select name="bestSeller" id="bestSeller" class="form-control">
                                        <option name="bestSeller" value="0" id="bestSeller">Not Best Seller</option>
                                        <option name="bestSeller" value="1" id="bestSeller">Best Seller</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Featured In Home Page</div>
                                    <select name="featured" id="featured" class="form-control">
                                        <option name="featured" value="0" id="featured">Not Featured</option>
                                        <option name="featured" value="1" id="featured">Featured</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fas fa-usd"></i> On Sale
                                    </div>
                                    <input type="number" id="sale" name="sale" placeholder="Item Sale" class="form-control">
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
                            @if(!empty($Users))
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-users "></i> member id
                                        </div>
                                        <select name="member_id" id="member_id" class="form-control">
                                            @foreach($Users as $user)
                                                <option name="{{$user['name']}}" value="{{$user['id']}}" id="{{$user['id']}}">{{$user['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($Categories))                           
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-users "></i> cat id
                                        </div>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            @foreach($Categories as $cat)
                                                <option name="{{$cat['name']}}" value="{{$cat['id']}}" id="{{$cat['id']}}">{{$cat['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif  

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                    <textarea name="description" id="description" rows="5"class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>                             
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <textarea name="tags" id="tags" rows="2"class="form-control" placeholder="Tags"></textarea>
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
@extends('layouts.adminLayout.masterLayout')
@section('content')


<!-- User Table -->
<div class="col-xl-12">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                @if(empty($Items->all()))
                    <div class="table-data__tool-right" style="height: 200px;">
                        <a href="{{route('add-items')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Add Item
                            </button>
                        </a>
                    </div>                
                @else                
                <h3 class="title-5 m-b-35">data table</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="property">
                                <option selected="selected">All Properties</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option selected="selected">Today</option>
                                <option value="">3 Days</option>
                                <option value="">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="{{route('add-items')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Add Item
                            </button>
                        </a>

                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>countryMade</th>
                                <th>itemStatus</th>
                                <th>rating</th>
                                <th>approvalStatus</th>
                                <th>member</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Items->all() as $item)                            
                                <tr class="tr-shadow">
                                    <td>
                                        <a href="{{route('show-items', $item->id )}}">{{$item->name}}</a>
                                    </td>
                                    <td>
                                        <span class="role green">{{$item->price}}</span>
                                    </td>
                                    <td class="desc">
                                        <span >{{$item->quantity}}</span>
                                    </td>
                                    <td>
                                        <span class="status--process">{{$countryList[$item->countryMade]}}</span>
                                    </td>                                    
                                    <td>
                                    <span class="role blackPearl">
                                            {{$itemStatus[$item->itemStatus]}}
                                    </span>
                                    </td>
                                    <td>
                                        <mark>{{$item->rating}}</mark>
                                    </td>
                                    <td>
                                        @if($item->approvalStatus == 0)
                                            <span class="role red">Not Approved</span>
                                        @else
                                            <span class="role green">Approved</span>
                                        @endif
  
                                    </td>
                                    <td>
                                        <a href="{{route('Admin-showUser', $item->member_id )}}">{{ \App\User::find($item->member_id)->name}}</a>
                                    </td>
                                    <td>
                                        @foreach(App\Categories::getParent($item->cat_id) as $n)
                                            @if($n->parent == 0)
                                                <a href="{{route('show-categories', $item->cat_id )}}">{{ \App\Categories::find($item->cat_id)->name}}</a>
                                            @else
                                                <a href="{{route('show-categories', $item->cat_id )}}">{{ \App\Categories::find($item->cat_id)->name}}</a> Child Of <a href="{{route('show-categories', $n->parent )}}">{{ \App\Categories::find($n->parent)->name}}</a>              
                                            @endif                                        
                                        @endforeach
                                    </td>                                                                                                                                                
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('edit-items', $item->id )}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                                <form method="post" action="{{ route('delete-items', $item->id)}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="member_id" value="{{$item->member_id}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirm('Are you sure?')">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>                                            
                                                </form>

                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach
                            {{ $Items->links() }}
                        </tbody>
                    </table>
                </div>
                @endif               

                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>

@endsection
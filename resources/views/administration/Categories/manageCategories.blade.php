<?php //$NoSIDEBAR = ''; ?>
@extends('layouts.adminLayout.masterLayout')
@section('content')


<!-- User Table -->
<div class="col-xl-12">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                @if(empty($Categories->all()))
                    <div class="table-data__tool-right">
                        <a href="{{route('add-categories')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Add Category
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
                        <a href="{{route('add-categories')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Add Category
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
                                <th>Category Name</th>
                                <th>Visibility</th>
                                <th>Allow Comment</th>
                                <th>Allow Ads</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Categories->all() as $Cat)                            
                                <tr class="tr-shadow">
                                    <td>
                                        <a href="{{route('show-categories', $Cat->id )}}">{{$Cat->name}}</a>
                                    </td>
                                    <td>
                                        @if($Cat->visibility == 0)
                                            <span class="role red">Invisible</span>
                                        @else
                                            <span class="role green">Visible</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($Cat->allowComment == 0)
                                            <span class="role chromeYellow">Not Allowed</span>
                                        @else
                                            <span class="role wisteria">Allowed</span>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($Cat->allowAds == 0)
                                            <span class="role sizzling">Not Allowed</span>
                                        @else
                                            <span class="role blue">Allowed</span>
                                        @endif                                        
                                    </td>                                    
                                    <td>
                                        @if($Cat->parent == 0)
                                            <span class="role blackPearl">Parent</span>
                                        @else
                                                <span class="role grayblue">
                                                    Child Of @foreach(App\Categories::getParent($Cat->parent) as $n)
                                                                <a href="{{route('show-categories', $n->id )}}">{{$n->name}}</a>
                                                            @endforeach
                                                </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('edit-categories', $Cat->id )}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                                <form method="post" action="{{ route('delete-categories', $Cat->id)}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirm('Are you sure?')">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>                                            
                                                </form>

                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach
                            {{ $Categories->links() }}
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
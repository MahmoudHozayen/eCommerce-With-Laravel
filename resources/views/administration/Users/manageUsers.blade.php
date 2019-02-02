@extends('layouts.adminLayout.masterLayout')
@section('content')

<!-- User Table -->
<div class="col-xl-12">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                @if(empty($users->except(\Auth::id())->all()))
                    <div class="table-data__tool-right">
                        <a href="{{route('Admin-addUser')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add User
                            </button>
                        </a>
                    </div>                
                @else
                <h3 class="title-5 m-b-35">Users Table</h3>
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
                        <a href="{{route('Admin-addUser')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>add User
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
                                <th>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </th>
                                <th>Full Name</th>
                                <th>E-mail</th>
                                <th>Date</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users->except(\Auth::id())->all() as $user)
                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td><a href="{{ route('Admin-showUser', $user->id )}}">{{ $user->name }}</a></td>
                                    <td>
                                        <span class="block-email">{{ $user->email }}</span>
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if($user->groupID == 1)
                                            <span class="role red">Admin</span>
                                        @elseif($user->groupID == 2)
                                            <span class="role blue">Moderator</span>
                                        @elseif($user->groupID == 0)
                                            <span class="role green">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button>
                                            <a href="{{ route('Admin-editUser', $user->id )}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a><!-- , 'route' =>route('Admin-deleteUser', $user->id -->
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['Admin-deleteUser', $user->id]]) !!}
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="confirm('Are you sure?')">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                            {!! Form::close() !!}

                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach
                            {{ $users->links() }}
                        </tbody>
                    </table>
                </div>
                @endif               
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>

<!-- Start top campaigns -->
<div class="col-xl-4">
    <div class="top-campaign">
        <h3 class="title-3 m-b-30">top campaigns</h3>
        <div class="table-responsive">
            <table class="table table-top-campaign">
                <tbody>
                    <tr>
                        <td>1. Australia</td>
                        <td>$70,261.65</td>
                    </tr>
                    <tr>
                        <td>2. United Kingdom</td>
                        <td>$46,399.22</td>
                    </tr>
                    <tr>
                        <td>3. Turkey</td>
                        <td>$35,364.90</td>
                    </tr>
                    <tr>
                        <td>4. Germany</td>
                        <td>$20,366.96</td>
                    </tr>
                    <tr>
                        <td>5. France</td>
                        <td>$10,366.96</td>
                    </tr>
                    <tr>
                        <td>3. Turkey</td>
                        <td>$35,364.90</td>
                    </tr>
                    <tr>
                        <td>4. Germany</td>
                        <td>$20,366.96</td>
                    </tr>
                    <tr>
                        <td>5. France</td>
                        <td>$10,366.96</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End top campaigns  -->
@endsection
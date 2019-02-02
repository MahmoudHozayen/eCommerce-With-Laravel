<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Admin;
use App\User;
class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        $users = User::paginate(10);
        return view('administration.Users.manageUsers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = User::roleType();

        return view('administration.Users.manageUsers_Add', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
                'name' => ['required', 'string', 'max:255'],
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6',],
                'groupID' => 'required'
            ]);
        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->groupID = request('groupID');

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = uniqid(rand(100000, 999999999)). '_' . uniqid() .'_'. time() . '.' . $image->getClientOriginalExtension();

            $avaterPath = Storage::putFileAs('public/Avatars', $request->file('avatar'), $filename, 'public');
            $user->avatars = $filename;
        }
        $user->email_verified_at = NOW();
        $user->save();
        session()->flash('message', 'User signed up');
        return redirect()->route('manage-users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(User $id)
    {
        return view('administration.Users.manageUsers_Show', compact(['id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(User $id)
    {
        $roles = User::roleType();
        return view('administration.Users.manageUsers_Edit', compact(['id', 'roles']));

        //return dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
                'name' => [ 'string', 'max:255'],
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'email' => [ 'string', 'email', 'max:255'],
                'groupID' => 'required'
            ]);   
        $user = User::Find($id);       
        if(isset($request->name)):
            $user->name = $request->get('name');
        endif;

        if($request->hasFile('avatar') && isset($request->avatar)):
            Storage::delete('public/Avatars/' . $user->avatars);
            $image = $request->file('avatar');
            $filename = uniqid(rand(100000, 999999999)). '_' . uniqid() .'_'. time() . '.' . $image->getClientOriginalExtension();
            $avaterPath = Storage::putFileAs('public/Avatars', $image, $filename, 'public');
            $user->avatars = $filename;
        endif;
       if(isset($request->email)):
            $user->email = $request->get('email');
        endif;

        if(isset($request->groupID)):
            $user->groupID = $request->get('groupID');
        endif;

        if(isset($request->password)):
            $user->password = Hash::make($request->get('password'));
        endif;
        
        $user->updated_at = NOW();                       
        $user->save();

        session()->flash('message', 'User:"'. $user->name.'" Updated');
        return redirect()->route('manage-users');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete('public/Avatars/' . $user->avatars);
        Storage::deleteDirectory('public/Items/ID_' . $user->id);

        $user->delete();

        session()->flash('message', 'User:"'. $user->name.'" Deleted');
        return redirect()->route('manage-users');   
    }
}

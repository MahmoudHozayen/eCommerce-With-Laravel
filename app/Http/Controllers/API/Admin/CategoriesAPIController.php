<?php

namespace App\Http\Controllers\APIs\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Categories;
use App\User;

class CategoriesAPIController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['verified', 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categories $Categories)
    {
        return 123;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$Categories = Categories::select('id', 'name')->get()->toArray();
        return view('administration.Categories.manageCategories_Add', compact(['Categories']));
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
                'description' => [ 'string', 'max:10000'],
                'parent' => ['required'],
                'visibility' => ['required'],
                'allowComment' => ['required'],
                'allowAds' => ['required']
            ]);
        $Category = new Categories();
        $Category->name = request('name');
        $Category->description = request('description');
        $Category->parent = request('parent');
        $Category->visibility = request('visibility');
        $Category->allowComment = request('allowComment');
        $Category->allowAds = request('allowAds');
        $Category->created_at	 = NOW();
        $Category->save();
        session()->flash('message', 'Category Added');
        return redirect()->route('manage-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $id)
    {
        return view('administration.Categories.manageCategories_Show', compact(['id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $id)
    {
    	$Categories = Categories::select('id', 'name', 'parent')->get()->toArray();
		$parents = Categories::select('name', 'id')->where('parent', '=', 'id')->get()->toArray();
        return view('administration.Categories.manageCategories_Edit', compact(['id', 'Categories', 'parents']));

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
                'name' => ['required', 'string', 'max:255'],
                'description' => [ 'string', 'max:10000'],
                'parent' => ['required'],
                'visibility' => ['required'],
                'allowComment' => ['required'],
                'allowAds' => ['required']
            ]);   
        $Category = Categories::Find($id);       
        if(isset($request->name)):
            $Category->name = $request->get('name');
        endif;
        if(isset($request->description)):
            $Category->description = $request->get('description');
        endif;

        if(isset($request->parent)):
            $Category->parent = $request->get('parent');
        endif;

        if(isset($request->visibility)):
            $Category->visibility = $request->get('visibility');
        endif;

        if(isset($request->allowComment)):
            $Category->allowComment = $request->get('allowComment');
        endif;

        if(isset($request->allowAds)):
            $Category->allowAds = $request->get('allowAds');
        endif;                        
        
        $Category->updated_at = NOW();                       
        $Category->save();

        session()->flash('message', 'Category:"'. $Category->name.'" Updated');
        return redirect()->route('manage-categories');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Categories::find($id);

        $Category->delete();

        session()->flash('message', 'Category:"'. $Category->name.'" Deleted');
        return redirect()->route('manage-categories');   
    }
}

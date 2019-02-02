<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Admin;
use App\Categories;
use App\User;

class CategoriesController extends Controller
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
    public function index(Categories $Categories)
    {
        $Categories = Categories::paginate(10);
        return view('administration.Categories.manageCategories', compact('Categories'));
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
                'allowAds' => ['required'],
                'categoryImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',                
            ]);
        $Category = new Categories();
        $Category->name = request('name');
        $Category->description = request('description');
        $Category->parent = request('parent');
        $Category->visibility = request('visibility');
        $Category->allowComment = request('allowComment');
        $Category->allowAds = request('allowAds');
        $Category->created_at	 = NOW();
        if ($request->hasFile('categoryImg')) {
            $image = $request->file('categoryImg');
            $filename = uniqid(rand(100000, 999999999)). '_' . uniqid() .'_'. time() . '.' . $image->getClientOriginalExtension();

            $itemsPath = Storage::putFileAs('public/Categories', $image, $filename, 'public');
            $Category->categoryImg = $filename;
        }        
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
                'allowAds' => ['required'],
                'categoryImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',                

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
        if ($request->hasFile('categoryImg')) {
            /* Deleting The Old img First*/
            Storage::delete('public/Categories/'. $Category->categoryImg);



            $image = $request->file('categoryImg');
            $filename = uniqid(rand(100000, 999999999)). '_' . uniqid() .'_'. time() . '.' . $image->getClientOriginalExtension();

            $itemsPath = Storage::putFileAs('public/Categories/', $image, $filename, 'public');
            $Category->categoryImg = $filename;
        } 
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

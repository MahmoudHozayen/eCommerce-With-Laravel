<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Items;
use App\Admin;
use App\Categories;
use App\User;

class ItemsController extends Controller
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
    public function index(Items $Items)
    {
        $Items = Items::paginate(10);
		$itemStatus = Items::itemStatus();
		$countryList = Items::countryList();        
        return view('administration.Items.manageItems', compact(['Items', 'itemStatus', 'countryList']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$Categories = Categories::select('id', 'name')->get()->toArray();
		$Users = User::select('id', 'name')->get()->toArray();
		$itemStatus = Items::itemStatus();
		$countryList = Items::countryList();
        return view('administration.Items.manageItems_Add', compact(['Categories','Users', 'countryList', 'itemStatus' ]));
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
                'description' => ['required', 'string', 'max:100000'],
                'price' => ['required', 'integer', 'max:1000000000000'],
                'quantity' => ['required', 'integer', 'max:1000000000000'],
                'countryMade' => ['required', 'string', ],
                'itemStatus' => ['required'],
                'rating' => ['required'],
                'approvalStatus' => ['required'],
                'bestSeller' => ['required'],
                'featured' => ['required'],
                'sale' => ['required', 'integer', 'max:1000000000000'],
                'itemImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'tags' => ['max:1000'],
                'member_id' => ['required'],
                'cat_id' => ['required'],
            ]);
        $Items = new Items();
        $Items->name = request('name');
        $Items->description = request('description');
        $Items->price = request('price');
        $Items->quantity = request('quantity');
        $Items->countryMade = request('countryMade');
        $Items->itemStatus = request('itemStatus');
        $Items->rating = request('rating');
        $Items->approvalStatus = request('approvalStatus');
        $Items->bestSeller = request('bestSeller');
        $Items->featured = request('featured');
        $Items->sale = request('sale');
        if ($request->hasFile('itemImg')) {
            $image = $request->file('itemImg');
            $filename = uniqid(rand(100000, 999999999)). '_' . uniqid() .'_'. time() . '.' . $image->getClientOriginalExtension();

            $itemsPath = Storage::putFileAs('public/Items/ID_' . request('member_id'), $image, $filename, 'public');
            $Items->itemImg = $filename;
        }               
        $Items->tags = request('tags');
        $Items->member_id = request('member_id');
        $Items->cat_id = request('cat_id');
        $Items->created_at	 = NOW();
        $Items->save();
        session()->flash('message', 'item Added');
        return redirect()->route('manage-items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(Items $id)
    {
        return view('administration.Items.manageItems_Show', compact(['id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $id)
    {
        $Categories = Categories::select('id', 'name')->get()->toArray();
        $Users = User::select('id', 'name')->get()->toArray();
        $itemStatus = Items::itemStatus();
        $countryList = Items::countryList();
        return view('administration.Items.manageItems_Edit', compact(['id', 'Categories','Users', 'countryList', 'itemStatus' ]));

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
                'description' => ['required', 'string', 'max:100000'],
                'price' => ['required', 'integer', 'max:1000000000000'],
                'quantity' => ['required', 'integer', 'max:1000000000000'],
                'countryMade' => ['required', 'string', ],
                'itemStatus' => ['required'],
                'rating' => ['required'],
                'approvalStatus' => ['required'],
                'bestSeller' => ['required'],
                'featured' => ['required'],
                'sale' => ['required', 'integer', 'max:1000000000000'],                
                'itemImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'tags' => ['max:1000'],
                'member_id' => ['required'],
                'cat_id' => ['required'],
            ]);
        $Item = Items::Find($id);       
        $Item->name = request('name');
        $Item->description = request('description');
        $Item->price = request('price');
        $Item->quantity = request('quantity');
        $Item->countryMade = request('countryMade');
        $Item->itemStatus = request('itemStatus');
        $Item->rating = request('rating');
        $Item->approvalStatus = request('approvalStatus');

        $Item->bestSeller = request('bestSeller');

        $Item->featured = request('featured');

        $Item->sale = request('sale');

        if ($request->hasFile('itemImg')) {
            /* Deleting The Old img First*/
            Storage::delete('public/Items/ID_' . request('member_id') . '/'. $Item->itemImg);



            $image = $request->file('itemImg');
            $filename = uniqid(rand(100000, 999999999)). '_' . uniqid() .'_'. time() . '.' . $image->getClientOriginalExtension();

            $itemsPath = Storage::putFileAs('public/Items/ID_' . request('member_id'), $image, $filename, 'public');
            $Item->itemImg = $filename;
        }               
        $Item->tags = request('tags');
        $Item->member_id = request('member_id');
        $Item->cat_id = request('cat_id');
        $Item->updated_at   = NOW();
        $Item->save();
        session()->flash('message', 'item Edited');
        return redirect()->route('manage-items');     
    }

    /**         
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$item = Items::find($id);
        Storage::delete('public/Items/ID_' . request('member_id') . '/'. $item->itemImg);

        $item->delete();

        session()->flash('message', 'Item :"'. $item->name.'" Deleted');
        return redirect()->route('manage-items');
    }
}

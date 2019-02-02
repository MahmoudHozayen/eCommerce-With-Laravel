<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Items;
use App\Categories;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Items = Items::all();
        $Categories = Categories::all();

        $featured_Categories = Categories::where('visibility', '=', 1)->get()->all();
        
        $featured_Items = Items::where('featured', '=', 1)->get()->all();
        $bestSeller_Items = Items::where('bestSeller', '=', 1)->get()->all();
        $sale_Items = Items::where('sale', '!=', 0)->get()->all();
        $topRate_Items = Items::where('rating', '>', 7)->get()->all();


        // Supply a user id and an access token 
        $instagram_userid = \Config::get('apis.INSTAGRAM_USER_ID');
        $accessToken = \Config::get('apis.INSTAGRAM_ACCESS_TOKEN');

        // Gets our data
        function fetchData($url){
             $ch = curl_init();
             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             curl_setopt($ch, CURLOPT_TIMEOUT, 20);
             $result = curl_exec($ch);
             curl_close($ch); 
             return $result;
        }

        // Pulls and parses data.
        $result = fetchData("https://api.instagram.com/v1/users/{$instagram_userid}/media/recent/?access_token={$accessToken}");
        $result = json_decode($result, true);


        if (!\Cookie::get('Guesst')) {
            $Guesst = uniqid($prefix = 'Guesst_', $more_entropy = TRUE);
            return response(view('app.home', compact(['Items', 'Categories','featured_Items', 'bestSeller_Items', 'sale_Items', 'topRate_Items', 'featured_Categories', 'result'])))->cookie('Guesst', $Guesst , (60 * 24 * 30) );
        }else{

            return view('app.home', compact(['Items', 'Categories','featured_Items', 'bestSeller_Items', 'sale_Items', 'topRate_Items', 'featured_Categories', 'result']));            
        }
    }
}

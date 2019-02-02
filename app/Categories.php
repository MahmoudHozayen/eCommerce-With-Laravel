<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
	public static function getParent($parent){
        $name = DB::table('categories')->select('name', 'id', 'parent')->where('id', '=', $parent)->get();

        return $name;        
	}

	public static function getCategore($cat_id){
        $name = DB::table('categories')->select('name', 'id', 'parent')->where('id', '=', $cat_id)->get();

        return $name;        
	}	
}

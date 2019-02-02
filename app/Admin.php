<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    const ADMIN_TYPE_ROLL = 1; //roll 1 in groupID is Admin
    const MOD_TYPE_ROLL = 2; //roll 2 in groupID is Moderator

    const ROLES = array(
                        'ADMIN' => 1,  //roll 1 in groupID is Admin
                        'MODERATOR' => 2    //roll 2 in groupID is Mod
                        );

    public static function roleType(){
        return self::ROLES;
    }
    public static function isAdmin(){
        if (\Auth::user()->groupID === self::ADMIN_TYPE_ROLL) {
            return TRUE;
        }
    }
    public static function isMod(){
    	if (\Auth::user()->groupID === self::MOD_TYPE_ROLL || \Auth::user()->groupID === self::ADMIN_TYPE_ROLL) {
            return TRUE;
            
    	}
    }    

}

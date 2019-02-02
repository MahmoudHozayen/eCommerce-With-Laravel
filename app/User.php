<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use Notifiable;

    const ROLES = array(
                        'USER' => 0, //roll 0 in groupID is User
                        'ADMIN' => 1,  //roll 1 in groupID is Admin
                        'MODERATOR' => 2    //roll 2 in groupID is Mod
                        );

    public static function roleType(){
        return self::ROLES;
    }
    public static function getUser($member_id){
        $name = DB::table('users')->select('name', 'id')->where('id', '=', $member_id)->get();

        return $name;        
    }       
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'groupID', 'country', 'city', 'postalCode','address','avater', 'phoneNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

<?php
/**
 * Created by PhpStorm.
 * User: darryldecode
 * Date: 1/13/2018
 * Time: 1:25 PM
 */

namespace App;


use Darryldecode\Cart\CartCollection;

class DBcartStorage
{
    public function has($key)
    {
        return Carts::find($key);
    }
    public function get($key)
    {
        if($this->has($key))
        {
            return new CartCollection(Carts::find($key)->cart_data);
        }
        else
        {
            return [];
        }
    }
    public function put($key, $value)
    {
        if($row = Carts::find($key))
        {
            // update
            $row->cart_data = $value;
            $row->save();
        }
        else
        {
            Carts::create([
                'id' => $key,
                'cart_data' => $value
            ]);
        }
    }
}
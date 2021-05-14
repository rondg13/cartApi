<?php

namespace App\Services\Carts;

use App\Models\Cart;

class CartService
{
    /**
    * post service creates the cart.
    * @return the created cart to post method in CartController 
    * 
    */

    public function post($request)
    {

        try{

            $cart = new Cart();

            $cart->store_id = $request->storeId;
            $cart->currency = $request->currency;
            $cart->products = json_encode($request->products);

            $cart->save();

        }catch(\Exception $e){
            return $e->getMessage();
        }

        return $cart;

    }

    /**
    * put service updates a cart.
    * 
    * @return the updated cart to put method in CartController 
    * @return the a empty object if cart not founded
    */

    public function put($request, $cartId)
    {

        try{

            $cart = Cart::find($cartId);

            if(!$cart){
                return new Cart();
            }

            $cart->store_id = $request->storeId;
            $cart->currency = $request->currency;
            $cart->products = json_encode($request->products);

            $cart->update();

        }catch(\Exception $e){
            return $e->getMessage();
        }

        return $cart;

    }


    /**
    * get service retrieves ta cart.
    *
    * @return a cart by id to get method in CartController
    * @return the a empty object if cart not founded
    */
    public function get($cartId)
    {
        $cart= Cart::find($cartId);

        return (!$cart) ? new Cart() : $cart;

    }

}

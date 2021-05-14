<?php

namespace App\Http\Controllers\Api\V1\Carts;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Carts\PostApiV1CartsRequest;
use App\Http\Requests\Api\V1\Carts\PutApiV1CartsRequest;
use Illuminate\Support\Carbon;
use App\Models\Cart;

use function PHPUnit\Framework\throwException;

class CartsController extends ApiController
{
    /**
     * post creates the cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function post(PostApiV1CartsRequest $request)
    {
        $request->validated();

        try{

            $cart = new Cart();

            $cart->store_id = $request->storeId;
            $cart->currency = $request->currency;
            $cart->products = json_encode($request->products);

            $cart->save();

        }catch(\Exception $e){
            return $e->getMessage();
        }

        return $this->successResponse($cart, 201);
    }

    /**
     * put updates the cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function put(PutApiV1CartsRequest $request, $cartId)
    {
        $request->validated();

        try{

            $cart = Cart::findOrFail($cartId);

            $cart->store_id = $request->storeId;
            $cart->currency = $request->currency;
            $cart->products = json_encode($request->products);

            $cart->update();

        }catch(\Exception $e){
            return $e->getMessage();
        }

        return $this->successResponse($cart, 200);
    }


    /**
     * get retrieves the cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($cartId)
    {
        $cart= Cart::find($cartId);

        return $this->successResponse($cart, 200);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Carts;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Carts\PostApiV1CartsRequest;
use App\Http\Requests\Api\V1\Carts\PutApiV1CartsRequest;
use App\Services\Carts\CartService;
use App\Models\Cart;

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

        $cartService = new CartService();

        $cart = $cartService->post($request);

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

        $cartService = new CartService();

        $cart = $cartService->put($request, $cartId);

        if(is_null($cart->id)){
            return $this->respond404('Cart not found.');
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
        $cartService = new CartService();

        $cart = $cartService->get($cartId);

        if(is_null($cart->id)){
            return $this->respond404('Cart not found.');
        }

        return $this->successResponse($cart, 200);
    }
}

<?php

namespace Modules\CartModule\Repository;


use Modules\CartModule\Entities\Cart;
use Modules\CartModule\Entities\CartItem;
use Prettus\Repository\Eloquent\BaseRepository;

class CartRepository  extends BaseRepository
{
    function model()
    {
        return Cart::class;
    }
    // function getCustomerCart()
    // {
    //     return Cart::where('customer_id', $user->customer->id)->first();
    // }

    function create($data)
    {
        $cart = Cart::create($data);
        return $cart;
    }

    function getCartitem($data)
    {
        return CartItem::where('cart_id', $data['cart_id'])
            ->where('item_id', $data['item_id'])
            ->where('item_type', $data['item_type'])
            ->first();
    }

    function getCartitemById($id)
    {
        return CartItem::where('id', $id)
            ->first();
    }

    function addItem($data)
    {
        $item = CartItem::create($data);
        return $item;
    }

    function updateItem($data)
    {
        $item = CartItem::where('id', $data['id'])
            ->update([
                'qty' => $data['qty']
            ]);
        return $item;
    }

    function removeItem($id)
    {
        $item = CartItem::where('id', $id)
            ->delete();
        return $item;
    }

    function emptyCart($cart_id)
    {
        $item = CartItem::where('cart_id', $cart_id)
            ->delete();
        return $item;
    }
}

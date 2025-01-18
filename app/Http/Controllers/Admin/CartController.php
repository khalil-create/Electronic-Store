<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCartData()
    {
        $cart = Session::get('cart', []);
        $total = $this->getTotal();
        $quantity = $this->getQuantity();

        return response()->json([
            'total' => $total,
            'quantity' => $quantity,
            'cart' => $cart
        ]);
    }

    public function add(Request $request, $itemId)
    {
        $item = Item::findOrFail($itemId);

        $cart = Session::get('cart', []);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity']++;
        } else {
            $cart[$itemId] = [
                "name" => $item->name,
                "quantity" => 1,
                "price" => $item->price,
                "image" => $item->images->first()->image
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => 'تم إضافة المنتج إلى السلة بنجاح!',
            'total' => $this->getTotal(),
            'quantity' => $this->getQuantity()
        ]);
    }

    public function remove(Request $request, $itemId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$itemId])) {
            if ($cart[$itemId]['quantity'] > 1) {
                $cart[$itemId]['quantity']--;
            } else {
                unset($cart[$itemId]);
            }
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => 'تم إزالة المنتج من السلة بنجاح!',
            'total' => $this->getTotal(),
            'quantity' => $this->getQuantity()
        ]);
    }

    public function empty()
    {
        Session::forget('cart');

        return response()->json([
            'success' => 'تم إفراغ السلة بنجاح!',
            'total' => 0,
            'quantity' => 0
        ]);
    }

    private function getTotal()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    private function getQuantity()
    {
        $cart = Session::get('cart', []);
        $quantity = 0;
        foreach ($cart as $item) {
            $quantity += $item['quantity'];
        }
        return $quantity;
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }
}

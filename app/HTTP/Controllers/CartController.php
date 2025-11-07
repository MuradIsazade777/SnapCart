<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function add(Request $request)
    {
        $item = $this->cart->addItem($request->product_id, $request->quantity);
        return response()->json($item);
    }

    public function view()
    {
        return response()->json($this->cart->getCart());
    }

    public function remove($productId)
    {
        $this->cart->removeItem($productId);
        return response()->json(['message' => 'Item removed']);
    }
}

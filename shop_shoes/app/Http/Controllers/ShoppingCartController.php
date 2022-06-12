<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\ShoppingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    protected $productController;

    public function __construct(ProductController $productController){
        $this->productController = $productController;
    }

    public function addOrderDetail($userId, $total)
    {
        return OrderDetail::create([
            'user_id' => $userId,
            'total' => $total
        ]);
    }

    public function addShoppingSession($userId)
    {
        return ShoppingSession::create(
            [
                'user_id' => $userId,
                'total' => 1
            ]
        );
    }

    public function addCartItem($shopping_session_id, $productId, $quantity)
    {
        return CartItem::create(
            [
                'shopping_session_id' => $shopping_session_id,
                'product_id' => $productId,
                'quantity' => $quantity
            ]
        );
    }

    public function addOrderItem($data, $order_id)
    {
        foreach ($data as $key => $value) {
            DB::table('order_items')->insert(
                [
                    'order_id' => $order_id,
                    'product_id' => $value->product_id,
                    'quantity' => $value->quantity
                ]
            );
        }

        return true;
    }

    public function checkout(Request $request)
    {
        $userId = session()->get('userId');
        $shoppingSession = $this->getShoppingSession($userId);
        $cartItem = $this->getAllCartItem($shoppingSession->id);
        $orderDetail = $this->addOrderDetail($userId, $shoppingSession->total);
        if($orderDetail) {
            $this->deleteShopping($shoppingSession->id);
        }
        return $this->addOrderItem($cartItem, $orderDetail->id);
    }

    public function deleteShopping($shoppingId)
    {
        DB::table('shopping_session')->where('id', $shoppingId)->delete();
        DB::table('cart_item')->where('shopping_session_id', $shoppingId)->delete();
    }

    public function indexShoppingCart(){
        $userId = session()->get('userId');
        $shoppingSession = $this->getShoppingSession($userId);
        $cartItem = null;
        $shoppingId = null;
        if($shoppingSession != null) {
            $cartItem = $this->getAllCartItem($shoppingSession->id);
            $shoppingId = $shoppingSession->id;
        }

        return view('users.pages.shoppingcart')->with(['cartItem' => $cartItem, 'shoppingId' => $shoppingId]);
    }

    public function addProductCart(Request $request){
        $userId = session()->get('userId');
        $shoppingSession = $this->getShoppingSession($userId);
        if($shoppingSession == null) {
            $shoppingSession = $this->addShoppingSession($userId);
        }
        $productCart = $this->productController->showOneProduct($request->id);
        $cartItem = $this->getCartItem($shoppingSession->id,$productCart->id);
        if($cartItem != null) {
            $quantity = $cartItem->quantity + 1;
            $cartItem = $this->updateCartItem($shoppingSession->id, $productCart->id, $quantity);
        } else {
            $cartItem = $this->addCartItem($shoppingSession->id, $productCart->id, 1);
        }
        $allCartItem = $this->getAllCartItem($shoppingSession->id);
        $total = 0;
        foreach ($allCartItem as $key => $value) {
            $total += $value->quantity;
        }
        $this->updateShoppingSession($userId, $total);
        return $cartItem;
    }

    public function getShoppingSession($userId)
    {
        return DB::table('shopping_session')->where('user_id', $userId)->first();
    }

    public function updateShoppingSession($userId, $total)
    {
        return ShoppingSession::where('user_id', $userId)
            ->update(
            [
                'total' => $total
            ]
        );
    }



    public function getCartItem($shopping_session_id,$product_id)
    {
        return CartItem::where('shopping_session_id', $shopping_session_id)
            ->where('product_id', $product_id)->first();
    }

    public function getAllCartItem($shopping_session_id)
    {
        return DB::table('cart_item as t1')->select([
            't1.quantity',
            't1.product_id',
            't2.name',
            't2.main_image',
            't2.price',
            't2.brand_id',
        ])
        ->join('products as t2', 't2.id', '=','t1.product_id')
        ->where('t1.shopping_session_id', $shopping_session_id)
        ->get();
    }

    public function updateCartItem($shopping_session_id, $product_id, $quantity)
    {
        return DB::table('cart_item')
            ->where('shopping_session_id', $shopping_session_id)
            ->where('product_id', $product_id)
            ->update(
            [
                'shopping_session_id' => $shopping_session_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]
        );
    }
}

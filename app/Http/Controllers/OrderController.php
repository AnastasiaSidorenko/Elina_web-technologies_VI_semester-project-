<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/29/19
 * Time: 6:57 PM
 */

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order_item($order_id,$user_id){
            $id_user= Order::where('id','=',$order_id)->user_id();
         if($id_user == Auth::user()->id){
            $orders = Order::where('id','=',$order_id)
                ->leftJoin('product_in_orders', 'product_in_orders.id_order', '=', 'orders.id')
                ->leftJoin('products', 'products.id', '=', 'product_in_orders.id_product')
                ->orderBy('created_at', 'desc')
                ->select('product_in_orders.*','product_in_orders.price as order_product_price','products.*')
                ->get();
            return view('user.order-item', ['orders' => $orders]);
        }
        else return redirect('/user/home');
    }

    public function orders($user_id){
        if($user_id == Auth::user()->id) {
            $orders = Order::where('user_id','=',$user_id)
                ->orderBy('created_at', 'desc')
                ->get();
            return view('user.user_orders', ['orders' => $orders]);
        }
        else return redirect('/user/home');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/28/19
 * Time: 9:52 PM
 */

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index($id){
        if($id==Auth::user()->id) {
            $user = User::findOrFail($id);
            $orders = Order::where('user_id',$id)->get()->all();

            return view('user.user_account', ['user' => $user,'orders'=>$orders]);
        }
        else return redirect('/user/home');
    }

    public function orders_output($id){
        if($id==Auth::user()->id) {
            $orders = DB::table('orders')
                ->leftJoin('users', 'users.id', '=', 'orders.user_id')
                ->select('orders.*','users.fio as userFIO')
                ->paginate();
            return view('user.orders', ['orders' => $orders]);
        }
        else return redirect('/user/home');
    }

    public function orders($id,$id_order){
        if($id==Auth::user()->id) {
            $orders = DB::table('product_in_orders')->where('id_order',$id_order)
                ->leftJoin('products', 'products.id', '=', 'product_in_orders.id_product')
                ->select('product_in_orders.*','products.name_ru as name_ru','products.name_ru as name_en','products.image1 as image')
                ->paginate();
        }
        return view('user.orders_output', ['orders' => $orders]);
    }
}
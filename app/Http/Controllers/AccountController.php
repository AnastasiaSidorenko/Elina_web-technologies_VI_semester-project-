<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/28/19
 * Time: 9:52 PM
 */

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function order($id,$id_order){
        if($id==Auth::user()->id) {
            $order_items = DB::table('product_in_orders')->where('id_order',$id_order)
                ->leftJoin('products', 'products.id', '=', 'product_in_orders.id_product')
                ->select('product_in_orders.*','products.name_ru as name_ru','products.name_en as name_en','products.image1 as image')
                ->orderBy('created_at', 'desc')
                ->paginate();

            $order_status = Order::find($id_order)->status;

        }
        return view('user.order-item', ['order' => $order_items,'order_status' => $order_status]);
    }

    public function write_review($product_id)
    {
        $if_product = Order::where('user_id',Auth::user()->id)
            ->where('status',2)
            ->leftJoin('product_in_orders','product_in_orders.id_order','=','orders.id')
            ->where('product_in_orders.id_product',$product_id)
            ->get();
        if($if_product->count()>0){

        $product = Product::where('products.id',$product_id)
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.id_manufacturer')
            ->select('products.*','manufacturers.name as manuf_name')->first();

            if (!isset($product)) {
                abort(404);
                exit;
            }

            return view('user.review', ['product' => $product]);
         }
         else return redirect('/user/home');
     }

     public function post_review(Request $request){
         if($request->ajax()) {
         }
     }

}
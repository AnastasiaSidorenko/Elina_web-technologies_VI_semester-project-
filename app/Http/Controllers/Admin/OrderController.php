<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/23/19
 * Time: 6:01 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        if(Auth::user()->role=='admin'){
            $orders = DB::table('orders')
                ->leftJoin('users', 'users.id', '=', 'orders.user_id')
                ->select('orders.*','users.fio as userFIO')
                ->paginate();
            return view('admin.order', ['orders' => $orders]);
        }
        return Redirect::back();
    }

    public function order($id){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            $orders = DB::table('product_in_orders')->where('id_order',$id)
                ->leftJoin('products', 'products.id', '=', 'product_in_orders.id_product')
                ->select('product_in_orders.*','products.name_ru as name_ru','products.name_ru as name_en','products.image1 as image')
                ->paginate();
            return view('admin.order_output', ['orders' => $orders,'id'=>$id]);
        }
        else return Redirect::back();
    }

    public function destroy($id){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            $entry = Order::find($id);
            $entry->delete();
        }
        else return Redirect::back();
    }

    public function store(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            if($request->ajax()) {

                $res = Order::create(array('date' => $request->date,'total_price' => $request->total_price,'address' => $request->address,'user_id' => $request->user_id));

                $data = ['id' => $res->id, 'date' => $request->date,'total_price' => $request->total_price,'address' => $request->address,'user_id' => $request->user_id,'status' => '0'];

                return $data;
            }
        }
        else return Redirect::back();
    }

    public function update(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            if($request->ajax())
            {
                $entry = Order::find($request->id);
                $entry->status = $request->status;
                $entry->save();
                if($entry->status==2){
                    $order = DB::table('product_in_orders')->where('id_order',$request->id)
                        ->leftJoin('products', 'products.id', '=', 'product_in_orders.id_product')
                        ->select('product_in_orders.quantity as prodOrdQuantity','products.quantity as prodQuantity','products.id as prodID')
                        ->get()->all();
                    foreach($order as $o){
                        $product=Product::find($o->prodID);
                        $product->quantity += $o->prodOrdQuantity;
                        $product->save();
                    }
                }
            }
        }
        else return Redirect::back();
    }

}
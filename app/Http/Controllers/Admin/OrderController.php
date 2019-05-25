<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/23/19
 * Time: 6:01 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function orders()
    {
        if(Auth::user()->role=='admin'){
            $orders = Order::paginate(5);
            return view('admin.order', ['orders' => $orders]);
        }
        return redirect('admin/home');
    }


    public function destroy($id){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            $entry = Order::find($id);
            $entry->delete();
        }
        else return redirect('admin/home');
    }

    public function store(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            if($request->ajax()) {

                $res = Order::create(array('date' => $request->date,'total_price' => $request->total_price,'address' => $request->address,'user_id' => $request->user_id));

                $data = ['id' => $res->id, 'date' => $request->date,'total_price' => $request->total_price,'address' => $request->address,'user_id' => $request->user_id,'status' => 'не выполнен'];

                return $data;
            }
        }
        else return redirect('admin/home');
    }

    public function update(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            if($request->ajax())
            {
                $order = Order::find($request->id);
                $column=$request->name;
                $order->$column = $request->new_val;
                $order->save();
            }
        }
        else return redirect('admin/home');
    }

}
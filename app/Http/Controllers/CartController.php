<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/16/19
 * Time: 11:01 AM
 */
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\Product_in_order;
use Illuminate\Http\Request;
use App\Models\Product_in_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{
    /*public function products()
    {
        $products=Product::paginate(10);
        //$products = News::orderBy('id', 'desc')->paginate(4);
        return view('products', ['products' => $products, 'all' => 'all']);
    }*/
    public function __construct()
    {
        $this->middleware('user');
    }

    public function store(Request $request){
        if($request->ajax()) {
            $user=Product_in_cart::where('user_id',$request->id_user)->where('id_product',$request->id_product)->first();
            $product=Product::find($request->id_product);
            if($user){
                $user->quantity+=$request->quantity;
                $user->save();
            }
            else Product_in_cart::create(array('id_product'=>$request->id_product,'user_id'=>$request->id_user, 'quantity'=>$request->quantity));

        }
    }


    public function cart($id){
        if($id==Auth::user()->id) {

            $cart_products = Product_in_cart::where('user_id', $id)
                ->leftJoin('products','products.id','=','id_product')
                ->leftJoin('manufacturers','products.id_manufacturer','=','manufacturers.id')
                ->select('products.*','products.quantity as product_quantity','product_in_carts.*','manufacturers.name')
                ->paginate();
            $total_sum=0;

            foreach($cart_products as $item){
                if($item->quantity > $item->product_quantity){
                    $item->quantity=$item->product_quantity;
                    $item->save();
                }

            }

            foreach($cart_products as $item){
                $total_sum += $item->price * $item->quantity;
            }
            $quantity =  Product_in_cart::where('user_id','=',$id)->count();
            return view('user.cart',['cart_products' => $cart_products, 'quantity' => $quantity,'total_sum' => $total_sum]);
        }
        else return redirect('/user/home');
    }

    public static function totalSum($id){
        $cart_products = Product_in_cart::where('user_id', $id)
            ->leftJoin('products','products.id','=','id_product')
            ->leftJoin('manufacturers','products.id_manufacturer','=','manufacturers.id')
            ->select('products.*','products.quantity as product_quantity','product_in_carts.*','manufacturers.name')
            ->paginate();
        $total_sum=0;
        foreach($cart_products as $item){
            $total_sum += $item->price * $item->quantity;
        }
        return $total_sum;
    }

    public function delete_cart_item(Request $request)
    {
        if ($request->ajax()) {
            Product_in_cart::where('user_id', $request->user_id)->where('id_product', $request->product_id)->delete();
        }
    }

    public function plus_cart_item(Request $request){
        if($request->ajax()) {
            $cart_product = Product_in_cart::where('user_id', $request->user_id)
                ->where('id_product', $request->product_id)->first();
                $cart_product->quantity += 1;
                $cart_product->save();
                $data=CartController::totalSum($request->user_id);
                return $data;
        }
    }
    public function minus_cart_item(Request $request){
        if($request->ajax()) {
            $cart_product = Product_in_cart::where('user_id', $request->user_id)
                ->where('id_product', $request->product_id)->first();
            $cart_product->quantity -= 1;
            $cart_product->save();
            $data=CartController::totalSum($request->user_id);
            return $data;
        }
    }

    public function remove_all_products_in_cart(Request $request){
        if($request->user_id == Auth::user()->id){
            Product_in_cart::where('user_id', $request->user_id)->delete();
        }
    }

    public function send_order(Request $request){
        $validator=Validator::make($request->all(),[
            'city' => 'required|max:30',
            'index'=> 'required|max:6|min:6',
            'street'=>'required|max:40',
            'house'=> 'required|max:4',
            'apartment'=>'nullable',
        ]);
        if ($validator->fails()){
            return Redirect::back()->with('error_code', 5)->withErrors($validator)->withInput();
        }

        $cart_products = Product_in_cart::where('user_id', Auth::user()->id)
            ->leftJoin('products','products.id','=','id_product')
            ->leftJoin('manufacturers','products.id_manufacturer','=','manufacturers.id')
            ->select('products.*','products.quantity as product_quantity','product_in_carts.*','manufacturers.name')
            ->paginate();
        $total_sum=0;
        foreach($cart_products as $item){
            $total_sum += $item->price * $item->quantity;
        }
        $address=$request->city.";".$request->street.";".$request->house.";".$request->apartment.";".$request->index.";";
        $order=Order::create(array('date'=> date("Y-m-d H:i:s") ,'total_price'=>$total_sum,'address'=>$address,'user_id'=>Auth::user()->id, 'status'=>'0'));
        foreach($cart_products as $item){
            $product=Product::where('id',$item->id_product)->first();
            $product->quantity-=$item->quantity;
            $product->save();
            Product_in_order::create(array( 'quantity'=>$item->quantity,'id_order'=>$order->id,'id_product'=>$item->id_product,'price'=>$item->price));
        }
        return Redirect::back()->with('code', 1);
    }

    public function reviews(){

    }

}
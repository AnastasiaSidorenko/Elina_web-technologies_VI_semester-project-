<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/16/19
 * Time: 11:01 AM
 */
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_in_cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    public function cart($id)
    {
        if ($id == Auth::user()->id) {

            $cart_products = Product_in_cart::where('user_id', $id)
                ->leftJoin('products', 'products.id', '=', 'id_product')
                ->leftJoin('manufacturers', 'products.id_manufacturer', '=', 'manufacturers.id')
                ->select('products.*', 'products.quantity as product_quantity', 'product_in_carts.*', 'manufacturers.name')
                ->paginate();
            $total_sum = 0;

            foreach ($cart_products as $item) {
                if ($item->quantity > $item->product_quantity) {
                    $item->quantity = $item->product_quantity;
                    $item->save();
                }

            }

            foreach ($cart_products as $item) {
                $total_sum += $item->price * $item->quantity;
            }

            $quantity = Product_in_cart::where('user_id','=',$id)->count();
            return view('user.cart',['cart_products' => $cart_products, 'quantity' => $quantity,'total_sum' => $total_sum]);
        }
        else return redirect('/user/home');
    }

    public function delete_cart_item(Request $request)
    {
        if ($request->ajax()) {
            Product_in_cart::where('user_id', $request->user_id)->where('id_product', $request->product_id)->delete();
        }
    }

    public function plus_cart_item(Request $request){
        if($request->ajax()) {
            // $user_id = Auth::user()->id;
            // if ($user_id) {
            $cart_product = Product_in_cart::where('user_id', $request->user_id)
                ->where('id_product', $request->id_product)->first();
            $product = Product::find($request->id_product);
            if ($cart_product->quantity < $product->quantity) {
                $cart_product->quantity += 1;
                $cart_product->save();
            }
        }
    }
    public function minus_cart_item(Request $request){
        if($request->ajax()) {
            // $user_id = Auth::user()->id;
            // if ($user_id) {
            $cart_product = Product_in_cart::where('user_id', $request->user_id)
                ->where('id_product', $request->id_product)->first();
            $product = Product::find($request->id_product);
            if ($cart_product->quantity > 1) {
                $cart_product->quantity -= 1;
                $cart_product->save();
            }
            if($cart_product->quantity){
                $cart_product->delete();
            }
        }
    }

    public function remove_all_cart_items(Request $request){
        if($request->user_id == Auth::user()->id){
            $carts_product = Product_in_cart::where('user_id', $request->user_id)->delete();
        }
    }


    public function reviews(){

    }

}
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

   public function cart($id){
       if($id==Auth::user()->id) {
           $cart_products = Product_in_cart::where('user_id', $id)
               ->leftJoin('products','products.id','=','id_product')
               ->get();
           $total_sum=0;
           foreach($cart_products as $item){
               $total_sum += $item->price * $item->quantity;
           }
//           $cart_products = DB ::table('product_in_carts')
//               ->where('user_id', $id)
//               ->get();
           $quantity =  Product_in_cart::where('user_id','=',$id)->count();
           return view('user.cart',['cart_products' => $cart_products, 'quantity' => $quantity,'total_sum' => $total_sum]);
       }
       else return redirect('/user/home');
   }

   public function delete_cart_item($product_id){
        $user_id = Auth::user()->id;
       if($user_id) {
           Product_in_cart::where('user_id',$user_id)->where('id_product',$product_id)->delete();
       }
   }

    public function plus_cart_item($product_id){
        $user_id = Auth::user()->id;
        if($user_id) {
            $product = Product_in_cart::where('user_id',$user_id)->where('id_product',$product_id)->get();
            $quantity =
        }
    }
    public function minus_cart_item(){

    }

   public function reviews(){

   }
}
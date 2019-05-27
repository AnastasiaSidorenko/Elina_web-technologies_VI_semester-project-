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
}
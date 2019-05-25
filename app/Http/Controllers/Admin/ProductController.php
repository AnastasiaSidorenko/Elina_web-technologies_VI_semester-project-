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
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function products()
    {
        if(Auth::user()->role=='admin'){
            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
                ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.id_manufacturer')
                ->select('product','categories.name as categName', 'categories.*', 'manufacturers.name as manufName', 'manufacturers.*')
                ->paginate(10);
            return view('admin.products', ['products' => $products]);
        }
        return redirect('admin/home');
    }


    public function destroy($id){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            $entry = Product::find($id);
            $entry->delete();
        }
        else return redirect('admin/home');
    }

    public function store(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            /*  $request->validate([
                  'title_ru'              =>  'required',
                  'title_en'              =>  'required',
                  'body_ru'              =>  'required',
                  'body_en'              =>  'required',
                  'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
              ]);*/

            if($request->ajax()) {
                $res = Product::create(array('name_en' => $request->name_en,'name_ru' => $request->name_ru,
                    'description_en' => $request->description_en,'description_ru' => $request->description_ru,
                    'suggested_use_en' => $request->suggested_use_en,'suggested_use_ru' => $request->suggested_use_ru,
                    'ingredients' => $request->ingredients,'price' => $request->price,
                    'expiration_date' => $request->expiration_date,'quantity' => $request->quantity,
                    'id_manufacturer' => $request->id_manufacturer,'id_category' => $request->id_category,
                    'image1' => $request->image1,'image2' => $request->image2,
                ));

                $data = ['id' => $res->id, 'name_en' => $request->name_en,'name_ru' => $request->name_ru,
                    'description_en' => $request->description_en,'description_ru' => $request->description_ru,
                    'suggested_use_en' => $request->suggested_use_en,'suggested_use_ru' => $request->suggested_use_ru,
                    'ingredients' => $request->ingredients,'price' => $request->price,
                    'expiration_date' => $request->expiration_date,'quantity' => $request->quantity,
                    'id_manufacturer' => $request->id_manufacturer,'id_category' => $request->id_category,
                    'image1' => $request->image1,'image2' => $request->image2,
                ];

                return $data;
            }
        }
        else return redirect('admin/home');
    }

    public function update(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            if($request->ajax())
            {
                $prod = Product::find($request->id);
                $column=$request->name;
                $prod->$column = $request->new_val;
                $prod->save();
            }
        }
        else return redirect('admin/home');
    }

}
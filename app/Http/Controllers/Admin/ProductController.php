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
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function products()
    {
        if(Auth::user()->role=='admin'){
            $manuf=DB::table('manufacturers')->pluck('name','id');
            $category_ru=DB::table('categories')->orderBy('name_ru','ASC')->pluck('name_ru','id');
            $category_en=DB::table('categories')->orderBy('name_en','ASC')->pluck('name_en','id');
            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
                ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.id_manufacturer')
                ->select('products.*','categories.name_ru as categName_ru','categories.name_en as categName_en', 'manufacturers.name as manufName')
                ->paginate();
            return view('admin.products', ['products' => $products,'manuf'=>$manuf,'category_en'=>$category_en,'category_ru'=>$category_ru]);
        }
        return Redirect::back();
    }


    public function destroy($id)
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            $entry = Product::find($id);
            $entry->delete();
        } else return Redirect::back();
    }

    public function store(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){

            if($request->ajax()) {
                $res = Product::create(array('name_en' => $request->name_en,'name_ru' => $request->name_ru,
                    'description_en' => $request->description_en,'description_ru' => $request->description_ru,
                    'suggested_use_en' => $request->suggested_use_en,'suggested_use_ru' => $request->suggested_use_ru,
                    'ingredients' => $request->ingredients,'price' => $request->price,
                    'expiration_date' => $request->expiration_date,'quantity' => $request->quantity,
                    'id_manufacturer' => $request->manufacturer,'id_category' => $request->category,
                    'image1' => $request->image1,'image2' => $request->image2,
                ));
                $manuf=DB::table('manufacturers')->where('id',$request->manufacturer)->value('id');
                $categ=DB::table('categories')->where('id',$request->category)->value('id');

                $data = ['id' => $res->id, 'name_en' => $request->name_en,'name_ru' => $request->name_ru,
                    'description_en' => $request->description_en,'description_ru' => $request->description_ru,
                    'suggested_use_en' => $request->suggested_use_en,'suggested_use_ru' => $request->suggested_use_ru,
                    'ingredients' => $request->ingredients,'price' => $request->price,
                    'expiration_date' => $request->expiration_date,'quantity' => $request->quantity,
                    'id_manufacturer' => $manuf,'id_category' => $categ,
                    'image1' => $request->image1,'image2' => $request->image2,
                ];

                return $data;
            }
        }
        else return Redirect::back();
    }

    public function update(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            if($request->ajax())
            {
                $entry = Product::find($request->id);
                $entry->name_en = $request->name_en;
                $entry->name_ru = $request->name_ru;
                $entry->description_en = $request->description_en;
                $entry->description_ru = $request->description_ru;
                $entry->suggested_use_en = $request->suggested_use_en;
                $entry->suggested_use_ru = $request->suggested_use_ru;
                $entry->price = $request->price;
                $entry->ingredients = $request->ingredients;
                $entry->expiration_date = $request->expiration_date;
                $entry->quantity = $request->quantity;

                $entry->save();
            }
        }
        else return Redirect::back();
    }

}
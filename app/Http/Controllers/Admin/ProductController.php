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


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.id', '=', 'manufacturers.user_id')
            ->select('users.*', 'category.name_en','category.name_ru')
            ->get();
        $products = Product::paginate(30);
        return view('admin.products', ['products' => $products]);
    }

}
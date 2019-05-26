<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/16/19
 * Time: 11:01 AM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products()
    {
        $products=Product::paginate(10);
        //$products = News::orderBy('id', 'desc')->paginate(4);
        return view('products', ['products' => $products, 'all' => 'all']);
    }

    public function all_section_products($section){
        $section_products = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->leftJoin('sections', 'sections.id', '=', 'categories.id_section')
            ->where('sections.id', $section)
            ->select('product','sections.name_en','sections.name_ru')
            ->paginate(10);
//            ->select('product','categories.name as categName', 'categories.*', 'manufacturers.name as manufName', 'manufacturers.*')
//            ->paginate(10);
        return view('products',['products' => $section_products]);
    }

    public function category_products($section){
        $category_products = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->leftJoin('sections', 'sections.id', '=', 'categories.id_section')
            ->where('sections.id', $section)
            ->select('product','sections.name_en','sections.name_ru')
            ->paginate(10);
//            ->select('product','categories.name as categName', 'categories.*', 'manufacturers.name as manufName', 'manufacturers.*')
//            ->paginate(10);
        return view('products',['products' => $category_products,'section' => $section]);
    }

    public function product_item($id){
        //Соединение с FEEDBACKS !! Вывод отзывов
        $product_item = DB::table('products')
            ->where('products.id', $id)
            ->leftJoin('feedback_on_products', 'feedback_on_products.id_product', '=', 'products.id')
            ->leftJoin('feedback', 'feedback_on_products.id_feedback', '=', 'feedbacks.id')
            ->leftJoin('User_feedbacks', 'feedbacks.id', '=', 'User_feedbacks.id_feedback')
            ->leftJoin('User', 'User_feedbacks.user_id', '=', 'User.id')
            ->select('products.*','feedbacks.*','User.fio')
            ->paginate(10);
        return view('product_item',['product_item' => $product_item]);
    }
}
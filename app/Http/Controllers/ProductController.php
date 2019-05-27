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
        $section_products = DB ::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->leftJoin('sections', 'sections.id', '=', 'categories.id_section')
            ->where('sections.id', $section)
            ->select('product','sections.name_en','sections.name_ru')
            ->paginate(10);
//            ->select('product','categories.name as categName', 'categories.*', 'manufacturers.name as manufName', 'manufacturers.*')
//            ->paginate(10);
        return view('products',['products' => $section_products,'section'=> $section]);
    }

    public function category_products($category){
        $category_products = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->where('category.id', $category)
            ->select('product','categories.name_en','categories.name_ru')
            ->paginate(10);
//            ->select('product','categories.name as categName', 'categories.*', 'manufacturers.name as manufName', 'manufacturers.*')
//            ->paginate(10);
        return view('products',['products' => $category_products,'category' => $category]);
    }

    public function product_item($id){
        //Соединение с FEEDBACKS !! Вывод отзывов
        $product_item = DB::table('products')
            ->where('products.id', $id)
            ->leftJoin('manufacturers', 'products.id_manufacturer', '=', 'manufacturers.id')
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->leftJoin('sections', 'sections.id', '=', 'categories.id_section')
            ->select('products.*','manufacturers.name as manufacturer_name','categories.name_en as category_name_en',
                'categories.name_ru as category_name_ru','sections.name_en as section_name_en',
                'sections.name_ru as section_name_ru', 'sections.id as section_id', 'categories.id as category_id')
                ->get(1);
        if(($product_item->count())==0){
            redirect('home');
        }
        //var_dump($product_item[0]);
        /*$reviews = DB::table('feedback_on_products')
            ->where('feedback_on_products.id_product', $id)
            ->leftJoin('feedback', 'Feedback_on_products.id_feedback', '=', 'Feedbacks.id')
            ->leftJoin('user_feedbacks', 'feedbacks.id', '=', 'user_feedbacks.id_feedback')
            ->leftJoin('user', 'user_feedbacks.user_id', '=', 'user.id')
            ->leftJoin('feedback_on_products', 'feedback_on_products.id_product', '=', 'products.id')
            ->select('user.fio','feedbacks.*');
        $reviews_quantity = $reviews->count();*/
        return view('product-item',['product_item' => $product_item[0]/*'reviews'=> $reviews, 'reviews_quantity'=>$reviews_quantity*/]);
    }
}
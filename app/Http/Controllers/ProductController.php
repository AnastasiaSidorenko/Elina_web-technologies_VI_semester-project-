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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
//    public function scopeCheapest($query)
//    {
//        return $query->orderBy('price', 'asc');
//    }
//    public function scopeExspensive($query)
//    {
//        return $query->orderBy('price', 'asc');
//    }
//    public function scopeNewest($query)
//    {
//        return $query->orderBy('created_at', 'desc');
//    }
//    public function scopeDefault($query)
//    {
//        return $query;
//    }

    public function products()
    {
        $products=Product::paginate(8);
        //$products = News::orderBy('id', 'desc')->paginate(4);
        return view('products', ['products' => $products, 'all' => 'all']);
    }

    public function all_section_products($section){
        //if(isset($_GET['sort'])){
        //    $sort = $_GET['sort'];
        $section_products = DB ::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->leftJoin('sections', 'sections.id', '=', 'categories.id_section')
            ->where('sections.id', $section)
            ->leftJoin('manufacturers', 'products.id_manufacturer', '=', 'manufacturers.id')
            ->select('products.*','sections.name_en','sections.name_ru',
                'manufacturers.name as manufacturer_name', 'sections.id as section_id',
                'categories.name_en as category_name_en', 'categories.name_ru as category_name_ru',
                'sections.name_en as section_name_en', 'sections.name_ru as section_name_ru',
                'categories.id as category_id','products.name_en as name_en','products.name_ru as name_ru')
            //->$sort()
            ->paginate(8);
        if(!isset($section_products[0])){
            abort(404);
            exit;
        }
        return view('products',['products' => $section_products,'in_section'=> $section]);
    }

    public function section_new_products($section){
        $date = strtotime("-7 day");
        $date=date('Y-m-d h:m:s', $date);
        //$date_now = date('Y-m-d h:i:s a', time());
        //$date = date("Y-m-d", mktime(0, 0, 0, date('Y'), date('m') , date('d')-14));
        $section_products = DB ::table('products')
            ->where('products.created_at','>=',$date)
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->leftJoin('sections', 'sections.id', '=', 'categories.id_section')
            ->where('sections.id', $section)
            ->leftJoin('manufacturers', 'products.id_manufacturer', '=', 'manufacturers.id')
            ->select('products.*','sections.name_en','sections.name_ru',
                'manufacturers.name as manufacturer_name', 'sections.id as section_id',
                'categories.name_en as category_name_en', 'categories.name_ru as category_name_ru',
                'sections.name_en as section_name_en', 'sections.name_ru as section_name_ru',
                'categories.id as category_id','products.name_en as name_en','products.name_ru as name_ru')
            ->paginate(8);
    return view('products',['products' => $section_products,'in_section'=> $section]);
}

    public function category_products($category){
        $category_products = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.id_category')
            ->where('categories.id', $category)
            ->leftJoin('manufacturers', 'products.id_manufacturer', '=', 'manufacturers.id')
            ->leftJoin('sections', 'sections.id', '=', 'categories.id_section')
            ->select('products.*','manufacturers.name as manufacturer_name','categories.name_en as category_name_en',
                'categories.name_ru as category_name_ru','sections.name_en as section_name_en',
                'sections.name_ru as section_name_ru', 'sections.id as section_id', 'categories.id as category_id')
            ->paginate(8);
//            ->select('product','categories.name as categName', 'categories.*', 'manufacturers.name as manufName', 'manufacturers.*')
//            ->paginate(10);
        if(!isset($category_products[0])){
            abort(404);
            exit;
        }
        return view('products',['products' => $category_products,'in_category' => $category]);
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
        if(!isset($product_item[0])){
            abort(404);
            exit;
        }
        if(Auth::user())
            $userID=Auth::user()->id;
        else $userID=0;
        //var_dump($product_item[0]);
        /*$reviews = DB::table('feedback_on_products')
            ->where('feedback_on_products.id_product', $id)
            ->leftJoin('feedback', 'Feedback_on_products.id_feedback', '=', 'Feedbacks.id')
            ->leftJoin('user_feedbacks', 'feedbacks.id', '=', 'user_feedbacks.id_feedback')
            ->leftJoin('user', 'user_feedbacks.user_id', '=', 'user.id')
            ->leftJoin('feedback_on_products', 'feedback_on_products.id_product', '=', 'products.id')
            ->select('user.fio','feedbacks.*');
        $reviews_quantity = $reviews->count();*/
        return view('product-item',['product_item' => $product_item[0],'userID'=>$userID/*'reviews'=> $reviews, 'reviews_quantity'=>$reviews_quantity*/]);
    }
}
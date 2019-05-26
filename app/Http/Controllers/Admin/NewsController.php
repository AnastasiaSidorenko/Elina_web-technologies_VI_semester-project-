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
use App\Models\News;


class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function news()
    {
        if(Auth::user()->role=='admin'){
            $news = News::paginate(10);
            return view('admin.news', ['news' => $news]);
        }
        return redirect('admin/home');
    }


    public function destroy($id){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            $entry = News::find($id);
            $entry->delete();
        }
        else return redirect('admin/home');
    }

    public function store(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){

            if($request->ajax()) {

                $res = News::create(array('title_ru' => $request->title_ru,'title_en' => $request->title_en,'body_ru' => $request->body_ru,'body_en' => $request->body_en,'date' => $request->date,'image' => $request->image));

                $data = ['id' => $res->id, 'title_ru' => $request->title_ru,'title_en' => $request->title_en,'body_ru' => $request->body_ru,'body_en' => $request->body_en,'date' => $request->date,'image' => $request->image];

                return $data;
            }
        }
        else return redirect('admin/home');
    }

    public function update(Request $request){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            if($request->ajax())
            {
                $entry = News::find($request->id);
                $entry->title_ru = $request->title_ru;
                $entry->title_en = $request->title_en;
                $entry->body_ru = $request->body_ru;
                $entry->body_en = $request->body_en;
                $entry->save();
            }
        }
        else return redirect('admin/home');
    }

}
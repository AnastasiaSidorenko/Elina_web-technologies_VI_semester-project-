<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/16/19
 * Time: 11:01 AM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(4);
        //$news = News::find(1)->roles;
       // $news = News->sortByDesc('created_at')::paginate(4);
        return view('news', ['news' => $news]);
    }
}
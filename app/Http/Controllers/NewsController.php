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
        $news = News::paginate(4);
        return view('news', ['news' => $news]);
    }
}
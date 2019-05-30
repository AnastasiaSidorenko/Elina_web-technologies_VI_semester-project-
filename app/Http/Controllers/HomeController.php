<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 3/22/19
 * Time: 11:37 AM
 */

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{
    public function index(){
            $news=News::orderBy('id', 'desc')->take(3)->get();
        return view('home',['news' => $news]);
    }
}
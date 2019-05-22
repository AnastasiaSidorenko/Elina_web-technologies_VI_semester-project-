<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 3/22/19
 * Time: 11:37 AM
 */

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
}
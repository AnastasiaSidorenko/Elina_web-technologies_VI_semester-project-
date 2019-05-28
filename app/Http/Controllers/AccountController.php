<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/28/19
 * Time: 9:52 PM
 */

namespace App\Http\Controllers;

use App\Models\User;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index($id){
        $user = User::findOrFail($id);
        return view('user.user_account',['user' => $user]);
    }
}
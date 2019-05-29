<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/28/19
 * Time: 9:52 PM
 */

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index($id){
        if($id==Auth::user()->id) {
            $user = User::findOrFail($id);

            return view('user.user_account', ['user' => $user]);
        }
        else return redirect('/user/home');
    }
}
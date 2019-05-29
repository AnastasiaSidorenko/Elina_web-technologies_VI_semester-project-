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
            $orders = Order::where('user_id','=',$id)->orderBy('created_at', 'desc')->get(2);
            return view('user.user_account', ['user' => $user, 'orders' => $orders]);
        }
        else return redirect('/user/home');
    }
}
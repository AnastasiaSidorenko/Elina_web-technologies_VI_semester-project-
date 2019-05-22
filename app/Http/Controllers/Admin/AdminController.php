<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/19/19
 * Time: 7:26 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function managers()
    {
       if(Auth::user()->role=='admin'){
               $managers = Admin::paginate(4);
               return view('admin.manage', ['managers' => $managers]);
        }
       return redirect('admin/home');
    }
}
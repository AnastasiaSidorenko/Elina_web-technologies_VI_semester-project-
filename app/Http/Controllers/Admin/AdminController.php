<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/19/19
 * Time: 7:26 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function managers()
    {
       if(Auth::user()->role=='admin'){
               $managers = Admin::paginate(10);
               return view('admin.manage', ['managers' => $managers]);
        }
       return redirect('admin/home');
    }

    public function destroy($id){
        if(Auth::user()->role=='admin'){
            $entry = Admin::find($id);
            $entry->delete();
        }
        else return redirect('admin/home');
    }

    public function updateManager(Request $request){
        if(Auth::user()->role=='admin'){
            if($request->ajax())
            {
                $entry = Admin::find($request->id);
                $entry->name = $request->name;
                $entry->role = $request->role;
                $entry->save();
            }
        }
        else return redirect('admin/home');
    }

}
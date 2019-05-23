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

    public function products(){
        if(Auth::user()->role=='admin' || Auth::user()->role=='manager'){
            $products =Product::paginate(15);
            return view('admin.products', ['products' => $products]);
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


    public function update(Request $request){
        if(Auth::user()->role=='admin'){
            if($request->ajax())
            {
                $admin = Admin::find($request->id);
                $column=$request->name;
                $admin->$column = $request->new_val;
                $admin->save();
            }
        }
        else return redirect('admin/home');
    }

}
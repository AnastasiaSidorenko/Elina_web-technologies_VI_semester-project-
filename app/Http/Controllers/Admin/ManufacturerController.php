<?php
/**
 * Created by PhpStorm.
 * User: nastya
 * Date: 5/23/19
 * Time: 6:01 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacturer;


class ManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function manufacturers()
    {
        if(Auth::user()->role=='admin'){
            $manufacturers = Manufacturer::paginate(10);
            return view('admin.manufacturers', ['manufacturers' => $manufacturers]);
        }
        return redirect('admin/home');
    }


    public function destroy($id){
        if(Auth::user()->role=='admin'){
            $entry = Manufacturer::find($id);
            $entry->delete();
        }
        else return redirect('admin/home');
    }

    public function store(Request $request){
        if(Auth::user()->role=='admin'){
            if($request->ajax()) {
                $res = Manufacturer::create(array('name' => $request->name));

                $data = ['id' => $res->id, 'name' => $request->name];

                return $data;
            }
        }
        else return redirect('admin/home');
    }

    public function update(Request $request){
        if(Auth::user()->role=='admin'){
            if($request->ajax())
            {
                $entry = Manufacturer::find($request->id);
                $entry->name = $request->name;
                $entry->save();
            }
        }
        else return redirect('admin/home');
    }

}
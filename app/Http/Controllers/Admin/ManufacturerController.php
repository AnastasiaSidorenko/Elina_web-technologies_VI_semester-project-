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
use Illuminate\Support\Facades\Redirect;


class ManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function manufacturers()
    {
        if(Auth::user()->role=='admin'){
            $manufacturers = Manufacturer::paginate();
            return view('admin.manufacturers', ['manufacturers' => $manufacturers]);
        }
        return Redirect::back();
    }


    public function destroy($id){
        if(Auth::user()->role=='admin'){
            $entry = Manufacturer::find($id);
            $entry->delete();
        }
        else return Redirect::back();
    }

    public function store(Request $request){
        if(Auth::user()->role=='admin'){
            if($request->ajax()) {
                $res = Manufacturer::create(array('name' => $request->name));

                $data = ['id' => $res->id, 'name' => $request->name];

                return $data;
            }
        }
        else return Redirect::back();
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
        else return Redirect::back();
    }

}
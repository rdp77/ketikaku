<?php

namespace App\Http\Controllers\backend\master;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB; 
use Storage;
use App\d_category;

class master_categoryController extends Controller
{
    public function index()
    {
    	$data = d_category::all();
    	return view('backend_view.master_category.index',compact('data'));
    }
    public function create()
    {
        return view('backend_view.master_category.create',compact('data'));
    }
    public function save(Request $request)
    {
    	$input = $request->all();
        $data = d_category::insert($input);
        return response()->json(['status'=>'sukses']);
    }
    public function edit($id)
    {
        $data = d_category::where('mc_id',$id)->first();
        return view('backend_view.master_category.edit',compact('data'));
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $data = d_category::where('mc_id',$request->mc_id)->update($input);
        return response()->json(['status'=>'sukses']);
    }

    
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    public function GetProduct($id){
    	$product = DB::table('products')
    			->where('category_id',$id)
    			->get();
    	return response()->json($product);
    }
}

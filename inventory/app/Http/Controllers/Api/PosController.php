<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DateTime;

class PosController extends Controller
{
    public function GetProduct($id){
    	$product = DB::table('products')
    			->where('category_id',$id)
    			->get();
    	return response()->json($product);
    }

    public function SearchOrderDate(Request $request){
    	$orderdate = $request->date;
    	$newdate = new DateTime($orderdate);
    	$done = $newdate->format('d/m/Y');
    	
    	$order = DB::table('orders')
    		->join('customers', 'orders.customer_id','customers.id')
    		->select('customers.name', 'orders.*')
    		->where('orders.order_date', $done)
    		->get();

    	return response()->json($order);

    }

    
}

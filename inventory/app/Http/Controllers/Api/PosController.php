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


    public function TodaySell(){
        $date = date('d/m/Y');
        $sell = DB::table('orders')->where('order_date',$date)->sum('total');
        return response()->json($sell);
    }

    public function TodayIncome(){
        $date = date('d/m/Y');
        $income = DB::table('orders')->where('order_date',$date)->sum('pay');
        return response()->json($income);
    }

    public function TodayDue(){
        $date = date('d/m/Y');
        $due = DB::table('orders')->where('order_date',$date)->sum('due');
        return response()->json($due);
    }

    
}

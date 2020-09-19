<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){
    	$product = DB::table('products')->where('id', $id)->first();

    	$check = DB::table('pos')->where('pro_id', $id)->first();

    	if($check){
    		DB::table('pos')->where('pro_id', $id)->increment('pro_quantity');
            $product = DB::table('pos')->where('pro_id', $id)->first();
            $subtotal = $product->pro_quantity * $product->product_price;

            DB::table('pos')->where('id', $id)->update(['sub_total' => $subtotal]);
    	}else{
    		$data = array();
	    	$data['pro_id'] = $id;
	    	$data['pro_name'] = $product->product_name;
	    	$data['pro_quantity'] = 1;
	    	$data['product_price'] = $product->selling_price;
	    	$data['sub_total'] = $product->selling_price;

	    	DB::table('pos')->insert($data);
    	}


    	
    }

    public function CartProduct(){
    	$data = DB::table('pos')->get();
    	return response()->json($data);
    }

    public function DeleteProductFromCart($id){
    	DB::table('pos')->where('id', $id)->delete();
    }

    public function incriment($id){
        $quantity = DB::table('pos')->where('id', $id)->increment('pro_quantity');

        $product = DB::table('pos')->where('id', $id)->first();
        $subtotal = $product->pro_quantity * $product->product_price;

        DB::table('pos')->where('id', $id)->update(['sub_total' => $subtotal]);
        return response('done');
    }

    public function decriment($id){
        DB::table('pos')->where('id', $id)->decrement('pro_quantity');

        $product = DB::table('pos')->where('id', $id)->first();
        $subtotal = $product->pro_quantity * $product->product_price;

        DB::table('pos')->where('id', $id)->update(['sub_total' => $subtotal]);
        return response('done');
    }



    public function getVat(){
        $vat = DB::table('extra')->first();
        return response()->json($vat);
    }


    public function ConfirmOrder(Request $request){
        return response("Ok");
    }
}

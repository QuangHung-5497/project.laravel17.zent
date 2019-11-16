<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Mail;

class CartController extends Controller
{
    public function index(){
    	$items = Cart::content();
    	return view('fontend.pages.cart')->with(['items'=>$items]);
    }
    public function add($id){
    	$product = Product::find($id);
    	Cart::add($product->id,$product->name,1, $product->origin_price);
    	$items = Cart::content();
        return redirect()->route('fontend.pages.cart');
    }
    
    public function seedmail(Request $request)
    {

        $user = $request->all();
        Mail::send('mail',['name'=>$user['name'],'email'=>$user['email']], function ($mail) use ($email,$name){
            $mail->to($email)->subject('Đặt hàng');
        } );
        return redirect()->route('fontend.index');

    }
}

<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;


class OrderController extends Controller
{

	

    public function order(){
        return view('fontend.pages.order');
    }
    public function order_store(Request $request){
        $email = $request->get('email');
        $name = $request->get('name');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $order = new Order();

        $order->name = $name;
        $order->email = $email;
        $order->address = $address;
        $order->phone = $phone;

        $order->save();
        $items = Cart::content();

        foreach($items as $item){
        	$order_detail = new Order_detail();
        	$order_detail->name = $item->name;
        	$order_detail->price = $item->price;
        	$order_detail->order_id = $order->id;
        	$order_detail->qty = $item->qty;
        	$order_detail->save();
        }
        
        // Mail::send('mail',['email'=>$order->email,'name'=>$order->name], function ($mail) use ($email,$name){
        //     $mail->to($email)->subject('Đặt hàng');
        // } );
        Cart::destroy();
        return redirect()->route('fontend.index');
    }
}

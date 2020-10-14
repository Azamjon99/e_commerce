<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\product;
use App\Cart;
class PaymentsController extends Controller
{//show payment page
    public function payment(){
        $payment_info=Session::get('payment_info');
        // has not paid
        if($payment_info['status']=='on_hold'){
        return view('paymentpage', ['payment_info'=>$payment_info]);
    }else{

        return redirect()->route('allProduct');

      
    }
    Session::forget('payment_info');
    Session::flush();
      }
      
}

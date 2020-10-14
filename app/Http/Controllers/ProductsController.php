<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\product;
use App\Cart;
class ProductsController extends Controller
{
    public function products(){

  $products=product::paginate(3);
  $producs= DB::table('products')->where('type', 'man')->get();
  $wproducts= DB::table('products')->where('type', 'woman')->get();

        return view('allProducts', ['products'=>$products, 'producs'=>$producs, 'wproducts'=>$wproducts]);
    }


// add item to the cart
public function addToCart(Request $request, $id)
{
  $prevCart = $request->session()->get('item');
  $item= new Cart($prevCart);
  $product=product::find($id);

  $item->addItem($id, $product);
  $request->session()->put('item', $item);

  return redirect()->route('allProduct');
}


//increase number of cart items
public function increaseProduct(Request $request, $id){
  $prevCart = $request->session()->get('item');
  $item= new Cart($prevCart);
  $product=product::find($id);

  $item->addItem($id, $product);
  $request->session()->put('item', $item);

  return redirect()->route('cartItems');

}


//decrease number of cart items
public function decreaseProduct(Request $request, $id){
  $prevCart = $request->session()->get('item');
  $item= new Cart($prevCart);
  if ($item->item[$id]['quantity']>1){
    $product=product::find($id);
    $item->item[$id]['quantity']=$item->item[$id]['quantity']-1;
    $price=str_replace('$', '', $product->price);
    $item->item[$id]['totalSinglePrice']=$item->item[$id]['quantity']*$price;
  $item->PriceAndQuantity();
  $request->session()->put('item', $item);

  }
  return redirect()->route('cartItems');

}
// delete cart item
public function DeleteCart(Request $request, $id){

  $item = $request->session()->get('item');

if(array_key_exists($id, $item->item)){

  unset($item->item[$id]);
}

$prevCart = $request->session()->get('item');
$updatedCart= new Cart($prevCart);
$updatedCart->PriceAndQuantity();
$prevCart = $request->session()->put('item',$updatedCart );
return redirect()->route('cartItems');

}




// show carts view

public function showCarts(Request $request){
  $item = $request->session()->get('item');

  if($item){
    return view('cartView', ['item'=>$item]);
  } else{
  return redirect()->route('allProduct');

  }
}

//show products for only men
public function menProducts(){
  $products= DB::table('products')->where('type', 'man')->get();
  return view('menProducts', ['products'=>$products]);
}



//show products for only women
public function womenProducts(){
    
  $products= DB::table('products')->where('type', 'woman')->get();
  return view('womenProducts', ['products'=>$products]);
}

//search products
public function search(Request $request){
  $searchRequest=$request->input('search');

  $products=product::where('name', 'Like', $searchRequest. '%')->paginate(3);

  return view("allProducts", ['products'=>$products]);
}


public function createOrder(Request $request){
$item=Session::get('item');
$first_name= $request->input('f_name');
$last_name= $request->input('l_name');
$address= $request->input('address');
$zip= $request->input('code');
$phone= $request->input('phone');
$email= $request->input('email');
  if($item){
    $date=date("Y-m-d H:i:s");

    $newOrderArray=array('status'=>'on_hold', 'date'=>$date, 'del_date'=>$date, 'price'=>$item->totalPrice,
  'first_name'=>$first_name, 'address'=>$address, 'last_name'=>$last_name, 'zip'=>$zip, 'email'=>$email, 'phone'=>$phone,
  'address'=>$address);
   $created_order=DB::table('orders')->insert($newOrderArray);
    $order_id=DB::getPdo()->lastInsertId();

    foreach($item->item as $cart){
      $item_id=$cart['data']['id'];
      $item_name=$cart['data']['name'];
    $item_price=str_replace('$', '', $cart['data']['price']);

      
      $newItemsInCurrentOrder=array('item_id'=>$item_id,'item_name'=>$item_name, 'item_price'=>$item_price, 'order_id'=>$order_id);
   $created_order_items=DB::table("orders_items")->insert($newItemsInCurrentOrder);
    }


Session::forget("item");
Session::flush();


$payment_info=$newOrderArray;
Session::put('payment_info', $payment_info);

// $request->session->put('payment_info',$payment_info);
return redirect()->route('paymentPage');


  }

  else{
  //  return redirect()->route('allProducts');
    print_r('errors');
  }
}





public function checkout(Request $request){
  $item = $request->session()->get('item');

  if($item){
    return view('checkout', ['item'=>$item]);
  } else{
  return redirect()->route('allProduct');

  }
}




}

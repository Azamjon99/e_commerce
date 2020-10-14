<?php

namespace App;

class Cart{

public $item = array();
public $totalQuantity;
public $totalPrice;







public function __construct($prevCart){
    if($prevCart!=null){

$this->item=$prevCart->item;
$this->totalQuantity=$prevCart->totalQuantity;
$this->totalPrice=$prevCart->totalPrice;
}
        else{

            $this->item=array();
            $this->totalQuantity=0;
            $this->totalPrice=0;
   
        }
    }



 public function addItem($id,$product){
    $price=str_replace('$', '', $product->price);
    if(array_key_exists($id, $this->item)){
    $productToAdd=$this->item[$id];
    $productToAdd['quantity']++;
$productToAdd['totalSinglePrice']=$productToAdd['totalSinglePrice']* $productToAdd['quantity'];
}
else{
    $productToAdd=array('quantity'=>1, 'totalSinglePrice'=>$price, 'data'=>$product );
}




$this->item[$id]=$productToAdd;
$this->totalQuantity++;
$this->totalPrice=$this->totalPrice+$price;
        }





public function PriceAndQuantity()
    {

$totalPrice=0;
$totalQuantity=0;

foreach($this->item as $item){
    $totalPrice=$totalPrice+$item['totalSinglePrice'];
    $totalQuantity=$totalQuantity+$item['quantity'];
}
$this->totalPrice=$totalPrice;
$this->totalQuantity=$totalQuantity;

        }
   






}



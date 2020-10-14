<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
public function index(){
    $products=product::paginate(3);

    return view('admin.displayProducts', ['products'=>$products]);
}
    


public function editProduct($id){
    $product=Product::find($id);
    return view('admin.editProductForm', ['product'=>$product]);
}


public function editImage($id){
    $product=Product::find($id);
    return view('admin.editProductImageForm', ['product'=>$product]);

}


public function updateImage(Request $request, $id){
   
$this->validate($request,[
    'image' => 'required|file|image|max:50000'
    ]);
    

if($request->hasFile('image')){
    $product=product::find($id);

    $exists=Storage::disk('local')->exists("public/product_images/". $product->image);
    if($exists){
        Storage::delete("public/product_images/". $product->image);

    } else{
echo "it is wrong";
    }


$fileNameEx= $request->file('image')->getClientOriginalExtension();

$request->image->storeAs('public/product_images', $product->image);

$arrayToUpdate=array('image'=>$product->image);

DB::table("products")->where('id', $product->id)->update($arrayToUpdate);

return redirect()->route("admin");
}


    else{
    $error="NO image was selected";
    echo $error;
        
    }




}




public function update(Request $request, $id){
    $name=$request->input('name');
    $description=$request->input('description');
    $type=$request->input('type');
    $price=$request->input('price');

$arrayToUpdate=array('name'=>$name,'description'=>$description, 'type'=>$type, 'price'=>$price);

    DB::table("products")->where('id', $id)->update($arrayToUpdate);

return redirect()->route("allProduct");
}






//create product
public function createProduct(){

    return view('admin.createProduct');

}


public function CreateNewProduct(Request $request){
    $name=$request->input('name');
    $description=$request->input('description');
    $type=$request->input('type');
    $price=$request->input('price');

    $this->validate($request,[
        'image' => 'required|file|image|max:50000'
        ]);
        $fileNameEx= $request->file('image')->getClientOriginalExtension();

$fileNam= str_replace(" ", "", $request->input('name'));

$name1= $fileNam. "." .$fileNameEx;

//        Storage::disk('local')->put('public/product_images/'.$name1, 'Contents');
$request->image->storeAs('public/product_images', $name1);

        
$arrayToCreate=array('name'=>$name,'description'=>$description, 'type'=>$type, 'price'=>$price, 'image'=>$name1);

$insert=DB::table("products")->insert($arrayToCreate);
        if($insert){
    
            return redirect()->route("admin");
        }
        else{
echo "Product is not created";
        }
}


//delete product


public function deleteProduct($id){
    $product=Product::find($id);
    $exists=Storage::disk('local')->exists("public/product_images/". $product->image);
    if($exists){
        Storage::delete("public/product_images/". $product->image);

    } else{
echo "it is wrong";
    }

    product::destroy($id);
    return redirect()->route("admin");

}



// show products by categories 






}
















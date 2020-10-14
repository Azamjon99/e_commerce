@extends('auth.layouts.admin')
@section('body')
<h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#id</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Edit image</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td><img src="/storage/product_images/{{$product->image}}" width="100" height="100"/></td>
                  <td>{{$product->name}}</td>
                  <td>{{$product->description}}</td>
                  <td>{{$product->price}}</td>
                  <td><a href="{{route('admineditProductImageForm', ['id'=>$product['id']])}}" class="btn btn-primary">Edit Image</a></td>
                  <td><a href="{{route('admineditProductForm', ['id'=>$product['id']])}}" class="btn btn-primary">Edit </a></td>

                  <td><a href="{{route('adminDeleteProduct', ['id'=>$product['id']])}}" class="btn btn-danger">Remove</a></td>

                  
                </tr>
                @endforeach
                
              </tbody>
            </table>

            {{$products->links()}}
          </div>
        
          @endsection
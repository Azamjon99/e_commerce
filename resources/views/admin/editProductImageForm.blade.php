@extends('auth.layouts.admin')
@section('body')
<div class="table-responsive">
@if($errors->any())
<div class="alert alert-danger">
<ul>
<li>{!!print_r($errors->all())!!}</li>
</ul>
</div>

@endif

<h3>Current Image</h3>

<div><img src="/storage/product_images/{{$product->image}}" width="100" height="100" ></div>

<form action="/admin/update/{{$product->id}}"  method="POST" enctype="multipart/form-data">

{{ csrf_field() }}
<div class="form-group">
<label for="image">{{$product->description}}</label>
<input type="file" name="image" id="image"  class="form-control" value="{{$product->image}}" 
 required>

</div>

<button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>

</div>
@endsection
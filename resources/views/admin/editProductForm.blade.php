@extends('auth.layouts.admin')
@section('body')
<div class="table-responsive">
<form action="/admin/updateContent/{{$product->id}}" method="post">
@csrf
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="name"  class="form-control" value="{{$product->name}}" placeholder="Product name">
</div>

<div class="form-group">
<label for="Description">Description</label>
<input type="text" name="description" id="description"  class="form-control" value="{{$product->Description}}" placeholder="Description">
</div>

<div class="form-group">
<label for="name">type</label>
<input type="text" name="type" id="type"  class="form-control" value="{{$product->type}}" placeholder="type">
</div>

<div class="form-group">
<label for="price">Price</label>
<input type="text" name="price" id="price"  class="form-control" value="{{$product->price}}" placeholder="price">
</div>
<button type="submit" class="btn btn-info">Submit</button>
</form>



</div>

@endsection
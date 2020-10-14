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

<form action="/admin/CreateNewProduct" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="name"  class="form-control" value="" placeholder="Product name">
</div>

<div class="form-group">
<label for="Description">Description</label>
<input type="text" name="description" id="description"  class="form-control" value="" placeholder="Description">
</div>

<div class="form-group">
<label for="name">type</label>
<input type="text" name="type" id="type"  class="form-control" value="" placeholder="type">
</div>


<div class="form-group">
<label for="name">image</label>
<input type="file" name="image" id="image"  class="form-control" value="" >
</div>



<div class="form-group">
<label for="price">Price</label>
<input type="text" name="price" id="price"  class="form-control" value="" placeholder="price">
</div>
<button type="submit" name="submit" class="btn btn-info">Submit</button>
</form>



</div>

@endsection
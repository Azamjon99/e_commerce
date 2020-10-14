@extends('auth.layouts.index')

@section('center')

<div id="cart-items">
<div class="container">
<div class="breadcrumbs">
<ol class="breadcrumbs">
<li><a href="/products">Home</a></li>

</ol>
</div>
</div>
</div>


<div class="shopper-information">
<div class="row">
<div class="col-sm-12 clearfix">
<div class="bill-to">
<p>Shopping/Bill to</p>
<div class="form-one">
<div class="total_area">
<ul>
<li>Payment Status <span>{{$payment_info['status']}}</span></li>
<li>Shipping Cost: <span>free</span></li>
<li>Total: <span>{{$payment_info['price']}}</span></li>
</ul>
<a href="" class="btn btn-default update">Update</a>
<a href="" class="btn btn-default checkout">Pay now</a>
</div>
</div>


<div class="form-two">
</div>
</div>
</div>
</div>
</div>




@endsection
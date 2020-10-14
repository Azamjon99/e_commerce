

@extends('auth.layouts.index')

@section('center')
  

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<p></p>
					@foreach($item->item as $products)
<td class="cart_product">
								<a href=""><img src="{{asset('/storage/product_images/'.$products['data']['image'])}}" width="100" height="100" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$products['data']['name']}}
</a></h4><p>{{$products['data']['description']}}</p>
								<p>id:{{$products['data']['id']}}
                                  
</p>
							</td>
							<td class="cart_price">
								<p>{{$products['data']['price']}}
</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{route('increaseProduct', ['id'=>$products['data']['id']])}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$products['quantity']}}
" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="{{route('decreaseProduct', ['id'=>$products['data']['id']])}}"> - </a>
								</div>
							</td>
							<td class="cart_total">
${{$products['totalSinglePrice']}}
								<p class="cart_total_price"></p>
							</td>
							<td class="cart_delete">
                                <a class="cart_quantity_delete"
                                 href="{{route('DeleteCart', ['id'=>$products['data']['id']])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
@endforeach

						
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Quantity <span>{{$item->totalQuantity}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>${{$item->totalPrice}}</span></li>
						</ul>
							<a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
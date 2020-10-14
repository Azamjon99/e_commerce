@extends('auth.layouts.index')

@section('center')

	
<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/products" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="/checkout">Checkout</a></li> 
										<li><a href="{{asset('/carts')}}">Cart</a></li> 
										<li><a href="/login">Login</a></li> 
                                    </ul>
                                </li> 
							
								
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
						<form action="/search" method="get">
							<input type="text" name="search" placeholder="Search"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information/BillTo</p>
							<form action="/products/createOrder">
							@csrf
								<input type="text" name="email"  placeholder="Email*">
								<input type="text" name="f_name" placeholder="First Name *">
								
								<input type="text" name="l_name" placeholder="Last Name *">
								<input type="text" name="address" placeholder="address">
								

									<input type="text" name="code" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									
									<input type="text" name="phone" placeholder="Phone *">
								
							<button class="btn btn-primary" type="submit" nme="submit">Proceed to payment</button>
								
							</form>
						</div>
					</div>
					
						</div>
					</div>
										
				</div>
			
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
		
		</div>
	</section> <!--/#cart_items-->


@endsection
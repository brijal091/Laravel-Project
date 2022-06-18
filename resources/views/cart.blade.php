@extends('userlogindesign')

@section('content')

<section class="ftco-section ftco-cart">

@if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('error') !!}

			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
					<h3>Cart</h3>
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							@php($total=0)
								@foreach($crtlist as $crt)
						      <tr class="text-center">
						        <td class="product-remove"><a href="/deletecart?x={{$crt->cartid}}"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url({{ URL::asset($crt->productimage) }});"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$crt->productname}}</h3>
						        	<p>{{$crt->description}}</p>
						        </td>
						        
						        <td class="price">Rs. {{$crt->price}} / {{$crt->unit}}</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="{{$crt->quantity}}" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">Rs.{{$crt->price*$crt->quantity}}</td>
								@php($total=$total+$crt->price*$crt->quantity)
						      </tr><!-- END TR-->
                                 @endforeach
						    
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    		
			

    			
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>Rs. {{$total}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>Rs. 0.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rs. {{$total}}</span>
    					</p>
    				</div>


					 <form action="{!!route('payment')!!}" method="POST" >                        
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZOR_KEY') }}"
                                data-amount="{{$total*100}}"
                                data-buttontext="Proceed to Checkout"
                                data-name="Agriculture Hub"
                                data-description="Payment"
                                data-prefill.name="{{ Session::get('name') }}"
                                data-prefill.email="{{ Session::get('email') }}"
                                data-theme.color="#ff7529">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">

						
                    </form>



    				<!-- <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p> -->
    			</div>
    		</div>
			</div>
		</section>


@endsection
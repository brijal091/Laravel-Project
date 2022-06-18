@extends('userlogindesign')

@section('content')

<section class="ftco-section ftco-cart">


<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
					<h3>Order History</h3>
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Orderid</th>
						        <th>Payment Mode</th>
						        <th>Paymentid</th>
						        <th>Order Date</th>
								<th>Order Status</th>
								
						      </tr>
						    </thead>
						    <tbody>
								@foreach($orlist as $or)
						      <tr class="text-center">
						        
						        
						        
						        <td class="price">{{$or->orderid}}</td>
						        
						        <td class="total">{{$or->payment}}</td>
								<td class="total">{{$or->paymentid}}</td>
								<td class="total">{{$or->created_at}}</td>
								<td class="total">{{$or->orderstate}}</td>
								
							 </tr><!-- END TR-->
                             
							 <tr class="text-center">
								 <td></td>
						     <td colspan="5">
							 <table border="1">
							 <tr>
                            <td>
								 Product name
</td>
<td>
	 Image
</td>
								<td>
								 Price
</td>
								<td>
								 Measurement
</td>
								<td>
								 Quantity
</td>
								<td>
								 Total
</td>

 							</tr>
                             @for($i=0;$i<count($or->orderdetails);$i++)
							 
							 <tr>
                             <td>{{$or->orderdetails[$i]->productname}}</td>
							 <td class="image-prod"><div class="img" style="background-image:url({{ URL::asset($or->orderdetails[$i]->productimage) }});"></div></td>
						        
							 <td>Rs. {{$or->orderdetails[$i]->price}}</td>
							 <td>{{$or->orderdetails[$i]->unit}}</td>
							 <td>{{$or->orderdetails[$i]->quantity}}</td>
							 <td>Rs. {{$or->orderdetails[$i]->price*$or->orderdetails[$i]->quantity}}</td>
							 
							</tr>
  @endfor
							</table>
</td>
                           
 							</tr>

							 @endforeach
						    
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>

			
		</section>


@endsection
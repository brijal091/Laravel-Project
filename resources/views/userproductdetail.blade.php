@extends('userlogindesign')

@section('content')

<script>
	function dec()
	{
            var q=parseInt(document.getElementById("quantity").value);

           if(q<=0)
		   {

		   }
		   else{
			   q=q-1;
			   document.getElementById("quantity").value=q;
		   }
	}

	function inc()
	{
var q=parseInt(document.getElementById("quantity").value);
		q=q+1;
		document.getElementById("quantity").value=q;
			
	}
	</script>

<section class="ftco-section">
	<form action="/addtocart" method="post">
		@csrf
		<input type="hidden" value='{{Request()->get("x")}}' name="pid">
    	<div class="container">

    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="{!! asset($prlist[0]->productimage) !!}" class="image-popup"><img src="{!! asset($prlist[0]->productimage) !!}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$prlist[0]->productname}}</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							</div>
    				<p class="price"><span>Rs. {{$prlist[0]->price}} / {{$prlist[0]->unit}}</span></p>
    				<p>{{$prlist[0]->description}}
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" onclick="dec()" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" onclick="inc()" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	</div>
          	<p><input type="submit" class="btn btn-black py-3 px-5" value="Add to Cart"></p>
    			</div>
    		</div>
    	</div>
</form>
    </section>

	@endsection
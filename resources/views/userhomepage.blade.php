@extends('userdesign')

@section('content')


<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="/userhomepage" class="active">All</a></li>
    				    @foreach($calist as $ct)
					   	<li><a href="/userhomepage?x={{$ct->categoryid}}">{{$ct->categoryname}}</a></li>
						   @endforeach
    					
					</ul>
    			</div>
    		</div>
    		<div class="row">
			@foreach($prlist as $pr)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="{!! asset($pr->productimage) !!}" alt="Colorlib Template">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div> 
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$pr->productname}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale">Rs. {{$pr->price}} Per {{$pr->unit}}</span></p>

		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="/productdetail?x={{$pr->productid}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="/login" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="/login" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
				@endforeach
				
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
           
          </div>
        </div>
    	</div>
    </section>

@endsection
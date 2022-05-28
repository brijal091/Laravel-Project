@extends('userdesign')

@section('content')

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="/AddRegistration" method="post" class="billing-form">
                            @csrf
							<h3 class="mb-4 billing-heading">Registration</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">First Name</label>
	                  <input type="text" name="t1" class="form-control" placeholder="First Name">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" name="t2" class="form-control" placeholder="Last Name">
	                </div>
                </div>

                <div class="w-100"></div>

                <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Address</label>
		            		<div class="select-wrap">
		                  <textarea name="t3"  placeholder="Address"  class="form-control"></textarea>
		                </div>
		            	</div>
		            </div>

		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="t4"  class="form-control">
		                    @foreach($stlist as $st)
                          <option value="{{$st->stateid}}">{{$st->statename}}</option>
		                    @endforeach
		                  </select>
		                </div>
		            	</div>
		            </div>
		            
                    
                    <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">City</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="t5" class="form-control">
		                  @foreach($ctlist as $ct)
                          <option value="{{$ct->cityid}}">{{$ct->cityname}}</option>
		                    @endforeach
		                    </select>
		                </div>
		            	</div>
		            </div>
		            
                    
                    <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Pincode</label>
	                  <input type="text" name="t6" class="form-control" placeholder="Pincode">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
                        <label for="streetaddress">Phone</label>
	                
	                  <input type="text" name="t7" class="form-control" placeholder="Phone">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Emailid</label>
	                  <input type="text" name="t8" class="form-control" placeholder="Emailid">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Password</label>
	                  <input type="password"  name="t9" class="form-control" placeholder="Password">
	                </div>
		            </div>
		            
                <div class="w-100"></div>
                <div class="col-md-12">
                <p><input type="submit" class="btn btn-primary py-3 px-4" value="Submit">
                <input type="reset" class="btn btn-primary py-3 px-4" value="Cancel">
            
            </p>

                </div>
	            </div>
	          </form><!-- END -->
					</div>
				
        </div>
      </div>
    </section> <!-- .section -->

@endsection
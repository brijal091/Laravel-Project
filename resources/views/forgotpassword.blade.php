@extends('userdesign')

@section('content')

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="/sendpassword" class="billing-form" method="post">
              @csrf
							<h3 class="mb-4 billing-heading">Forgot Password</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Loginid</label>
	                  <input type="text"  name="t1" class="form-control" required placeholder="">
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


            @if(request()->get('x') != null)
                  @if(request()->get("x")=="1")
                  <span style="color:gree">Your password send to your registered emailid.</span>
                   @else
                   <span style="color:red">Invalid Loginid</span>
                   
                   @endif
                      @endif


             
          
             <br>
             <br>
             <a href="/login">Back To Login</a>

					</div>
				
        </div>
      </div>
    </section> <!-- .section -->

@endsection
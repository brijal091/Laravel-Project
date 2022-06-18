@extends('userdesign')

@section('content')

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="/userchecklogin" class="billing-form" method="post">
              @csrf
							<h3 class="mb-4 billing-heading">Login</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Loginid</label>
	                  <input type="text"  name="t1" class="form-control" required placeholder="">
	                </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Password</label>
	                  <input type="password" name="t2" class="form-control" required placeholder="">
	                </div>
                </div>
               
                <div class="w-100"></div>
                <div class="col-md-12">
                
                <p><input type="submit" class="btn btn-primary py-3 px-4" value="Login">
                <input type="reset" class="btn btn-primary py-3 px-4" value="Cancel">
            
            </p>


                </div>
	            </div>
	          </form><!-- END -->
               @if(request()->get("x")!=null)
                <span style="color:red">Invalid Loginid or Password</span>
               @endif
             <br>
             <br>
             <a href="/forgotpassword">Forgot Password</a>

             <br>
             <br>
             <a href="/registration">New User? Register Here</a>

					</div>
				
        </div>
      </div>
    </section> <!-- .section -->

@endsection
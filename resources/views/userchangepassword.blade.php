@extends('userlogindesign')

@section('content')

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="/updateuserpassword" method="post" class="billing-form">
                            @csrf
							<h3 class="mb-4 billing-heading">Change Password</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Old Password</label>
	                  <input type="password" name="t1" class="form-control" placeholder="Old Password">
	                </div>
	              </div>
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">New Password</label>
	                  <input type="password" name="t2" class="form-control"  placeholder="New Password">
	                </div>
                </div>

				<div class="col-md-12">
	                <div class="form-group">
	                	<label for="lastname">Confirm Password</label>
	                  <input type="password" name="t3" class="form-control"  placeholder="Confirm Password">
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
                  <span style="color:gree">Your password changed successfully</span>
                   @else
                   <span style="color:red">Invalid old password</span>
                   
                   @endif
                      @endif
					</div>
				
				
				
        </div>
      </div>
    </section> <!-- .section -->

@endsection
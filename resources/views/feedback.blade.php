@extends('userlogindesign')

@section('content')

<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="/addfeedback" method="post" class="billing-form">
                            @csrf
							<h3 class="mb-4 billing-heading">Feedback</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Feedback</label>
	                  <textarea name="t1" rows="7" class="form-control" placeholder="Enter Feedback" required></textarea>
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
                  <span style="color:gree">Your feedback submitted successfully.</span>
                      @endif
					</div>
				
				
				
        </div>
      </div>
    </section> <!-- .section -->

@endsection
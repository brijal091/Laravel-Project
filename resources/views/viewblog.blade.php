@extends('userdesign')

@section('content')
<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 ftco-animate">
						<div class="row">

            @foreach($blist as $b)

							<div class="col-md-12 d-flex ftco-animate">
		            <div class="blog-entry align-self-stretch d-md-flex">
		              <a href="#" class="block-20" style="background-image:url({{ URL::asset($b->image) }});">
		              </a>
                  
		              <div class="text d-block pl-md-4">
		              	<div class="meta mb-3">
		                  <div><a href="#">{{$b->created_at}}</a></div>
		                  <div><a href="#">Admin</a></div>
		                </div>
		                <h3 class="heading"><a href="#">{{$b->title}}</a></h3>
		                <p>{{$b->description}}</p>
		                <p><a href="/singleblog?x={{$b->blogid}}" class="btn btn-primary py-2 px-3">Read more</a></p>
		              </div>
		            </div>
		          </div>

              @endforeach
		          
		          
						</div>
          </div> <!-- .col-md-8 -->
         
        </div>
      </div>
    </section> <!-- .section -->


@endsection
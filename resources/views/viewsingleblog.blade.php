@extends('userdesign')

@section('content')

<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 ftco-animate">
					
          
             <h2 class="mb-3">{{$b->title}}</h2>
            <p>{{$b->description}}</p>
            <p>
              <img src="{!! asset($b->image) !!}" alt="" class="img-fluid">
            </p>
            
           

          </div> <!-- .col-md-8 -->
         

        </div>
      </div>
    </section> <!-- .section -->

@endsection
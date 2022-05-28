@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">City</h4>
                  <p class="card-description">
                    City
                  </p>
                  <form class="forms-sample" action="/addcity" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">City Name</label>
                      <input type="text" class="form-control" name="t1" placeholder="City Name">
                    </div>
                    
                    <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">State</label>
                      <select class="form-control" name="t2" placeholder="State">
                        @foreach($stlist as $st)
                        <option value='{{$st->stateid}}'>{{$st->statename}}</option>
                        @endforeach
                      </select>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>



                
                <div class="card-body">
                  <h4 class="card-title">City</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>City</th>
                          <th>
                            State
                          </th>
                          <th>
                            
                          </th>
                          <th>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($ctlist as $ct)
                        <tr>
                          <td>
                            {{$ct->cityid}}
                          </td>
                          <td>
                            {{$ct->cityname}}
                          </td>
                          <td>
                            {{$ct->statename}}
                          </td>
                          
                          <td>
                             <a href='/editcity/{{$ct->cityid}}'>Edit</a>
                          </td>
                          <td>
                            <a href='/deletecity/{{$ct->cityid}}'>Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>






              </div>


@endsection
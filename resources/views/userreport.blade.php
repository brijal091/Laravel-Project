@extends('admindesign')

@section('content')



<div class="card">


<div class="card-body">
                  <h4 class="card-title">User Report</h4>
                  <form class="forms-sample" method="get" action="/userreport">
                  
                    <div class="form-group">
                    
                    <label for="exampleInputName1">City</label>

                      <select class="form-control" name="t1">
                      @foreach($ctlist as $ct)
                          <option value="{{$ct->cityid}}">{{$ct->cityname}}</option>
		                    @endforeach
                      <select>
                    
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>

                    
                <div class="card-body">
                  <h4 class="card-title">User List</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>City</th>
                          <th>Picode</th>
                          <th>Phone</th>
                          <th>Emailid</th>
                          <th>Created Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($rglist as $rg)
                        <tr>
                          <td>
                            {{$rg->userid}}
                          </td>
                          <td>
                            {{$rg->firstname}} {{$rg->lastname}}
                          </td>
                          <td>
                            {{$rg->address}}
                          </td>
                          <td>
                            {{$rg->cityname}}
                          </td>
                          

                          <td>
                            {{$rg->pincode}}
                          </td>
                          
                          <td>
                            {{$rg->phone}}
                          </td>
                          
                          <td>
                            {{$rg->emailid}}
                          </td>
                          
                          <td>
                            {{$rg->created_at}}
                          </td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              



              </div>


@endsection
@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">State</h4>
                  <p class="card-description">
                    State Form
                  </p>
                  <form class="forms-sample" action="/addstate" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">State Name</label>
                      <input type="text" class="form-control" name="t1" placeholder="State Name">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>


                

                <div class="card-body">
                  <h4 class="card-title">State</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
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
                        @foreach($stlist as $st)
                        <tr>
                          <td>
                            {{$st->stateid}}
                          </td>
                          <td>
                            {{$st->statename}}
                          </td>
                          <td>
                             <a href='/editstate/{{$st->stateid}}'>Edit</a>
                          </td>
                          <td>
                            <a href='/deletestate/{{$st->stateid}}'>Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>





              </div>


              

@endsection
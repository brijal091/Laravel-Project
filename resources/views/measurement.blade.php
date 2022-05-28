@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Measurement Unit</h4>
                  <p class="card-description">
                  Measurement Unit
                  </p>
                  <form class="forms-sample" method="post" action="/addunit">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Unit</label>
                      <input type="text" class="form-control" name="t1" placeholder="unit">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>


                

              <div class="card-body">
                  <h4 class="card-title">Measurement Unit</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                          Measurement Unit
                          </th>
                          <th>
                            
                          </th>
                          <th>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mtlist as $mt)
                        <tr>
                          <td>
                            {{$mt->unitid}}
                          </td>
                          <td>
                            {{$mt->unit}}
                          </td>
                          <td>
                             <a href='/editunit/{{$mt->unitid}}'>Edit</a>
                          </td>
                          <td>
                            <a href='/deleteunit/{{$mt->unitid}}'>Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>





          


              </div>



           
@endsection
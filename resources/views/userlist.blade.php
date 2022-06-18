@extends('admindesign')

@section('content')



<div class="card">
                
                    
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
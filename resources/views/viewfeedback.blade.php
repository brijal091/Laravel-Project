@extends('admindesign')

@section('content')



<div class="card">
              

                    
                <div class="card-body">
                  <h4 class="card-title">Feedback</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Feedback</th>
                          <th>Given Date</th>
                          <th>User Name</th>
                          <th>Phone</th>
                          <th>Emailid</th>
                          <th></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($flist as $f)
                        <tr>
                          <td>
                            {{$f->feedbackid}}
                          </td>
                          <td>
                            {{$f->feedback}}
                          </td>
                          
                          <td>
                            {{$f->created_at}}
                          </td>
                          <td>
                            {{$f->firstname}} {{$f->lastname}}
                          </td>
                          
                          <td>
                            {{$f->phone}}
                          </td>
                          <td>
                            {{$f->emailid}}
                          </td>
                          <td>
                          <a href='/deletefeedback?x={{$f->feedbackid}}' >Delete</a>
                        </td>
                          
                        
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>





              </div>


@endsection
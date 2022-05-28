@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change Password</h4>
                  <p class="card-description">
                    Change Password Form
                  </p>
                  <form class="forms-sample" action="/adminupdatepassword" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Old Password</label>
                      <input type="password" class="form-control" name="t1" placeholder="Old Password">

                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">New Password</label>
                      <input type="password" class="form-control" name="t2" placeholder="New Password">

                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputName1">Confirm Password</label>
                      <input type="password" class="form-control" name="t3" placeholder="Confirm Password">

                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>

                @isset($msg)  
                <span style="color:purple;padding:10px">{{$msg}}</span>
                  @endisset



              </div>


              

@endsection
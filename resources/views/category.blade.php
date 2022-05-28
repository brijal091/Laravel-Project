@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category</h4>
                  <p class="card-description">
                    Category Form
                  </p>
                  <form class="forms-sample" method="post" action="/addcategory" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Cateogry Name</label>
                      <input type="text" class="form-control" name="t1" placeholder="Cateogry Name">
                    </div>
                    <div class="form-group">
                      <label>Category Image</label>
                      <input type="file" name="t2" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Category Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>



                    
                <div class="card-body">
                  <h4 class="card-title">Category</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Category</th>
                          <th>Category Image</th>
                          
                          <th>
                            
                          </th>
                          <th>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($calist as $ct)
                        <tr>
                          <td>
                            {{$ct->categoryid}}
                          </td>
                          <td>
                            {{$ct->categoryname}}
                          </td>
                          <td>
                           <img src='{!! asset($ct->categoryimage) !!}' width="100" height="100">
                          </td>
                          
                          <td>
                             <a href='/editcategory/{{$ct->categoryid}}'>Edit</a>
                          </td>
                          <td>
                            <a href='/deletecategory/{{$ct->categoryid}}'>Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>





              </div>


@endsection
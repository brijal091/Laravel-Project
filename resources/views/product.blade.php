@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product</h4>
                  <p class="card-description">
                    prouduct 
                  </p>

                  <form class="forms-sample" action="/addproduct" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" name="t1" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select class="form-control" name="t2" placeholder="category">
                        @foreach($calist as $ca)
                        <option value='{{$ca->categoryid}}'>{{$ca->categoryname}}</option>
                        @endforeach
                     </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <textarea class="form-control" name="t3" placeholder="Description"></textarea>
                    </div>
                      

                    <div class="form-group">
                      <label>Product Image</label>
                      <input type="file" name="t4" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Product Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Product Price</label>
                      <input type="text" class="form-control" name="t5" placeholder="Product Price">
                    </div>


                    <div class="form-group">
                      <label for="exampleInputName1">Unit</label>
                      <select class="form-control" name="t6" placeholder="Unit">
                      @foreach($melist as $ma)
                        <option value='{{$ma->unitid}}'>{{$ma->unit}}</option>
                        @endforeach
                     
                        <select>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>



                <div class="card-body">
                  <h4 class="card-title">Product</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Unit</th>
                          <th>Image</th>
                          
                          <th>
                            
                          </th>
                          <th>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($prlist as $pr)
                        <tr>
                          <td>
                            {{$pr->productid}}
                          </td>
                          <td>
                            {{$pr->productname}}
                          </td>
                          <td>
                            {{$pr->categoryname}}
                          </td>
                          
                          <td>

                            {{$pr->description}}
                          </td>
                          
                          <td>
                            {{$pr->price}}
                          </td>
                          <td>
                            {{$pr->unit}}
                          </td>
                          
                          
                          <td>
                           <img src='{!! asset($pr->productimage) !!}' width="100" height="100">
                          </td>
                          
                          <td>
                             <a href='/editproduct/{{$pr->productid}}'>Edit</a>
                          </td>
                          <td>
                            <a href='/deleteproduct/{{$pr->productid}}'>Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>






              </div>


@endsection
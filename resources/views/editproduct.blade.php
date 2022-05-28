@extends('admindesign')

@section('content')



<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product</h4>
                  <p class="card-description">
                    prouduct 
                  </p>

                  <form class="forms-sample" action="/updateproduct" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" value='{{$p->productid}}' name="id">
                  <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" value='{{$p->productname}}' name="t1" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select class="form-control" name="t2" placeholder="category">
                        @foreach($calist as $ca)
                        @if($ca->categoryid==$p->categoryid)

                        <option selected value='{{$ca->categoryid}}'>{{$ca->categoryname}}</option>
                    
                        @else
                        
                        <option value='{{$ca->categoryid}}'>{{$ca->categoryname}}</option>
                        
                        @endif
                        @endforeach
                     </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <textarea class="form-control" name="t3" placeholder="Description">{{$p->description}}</textarea>
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
                      <img src='{!! asset($p->productimage) !!}' width="50" height="50">
                 
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Product Price</label>
                      <input type="text" class="form-control" name="t5" value='{{$p->price}}' placeholder="Product Price">
                    </div>


                    <div class="form-group">
                      <label for="exampleInputName1">Unit</label>
                      <select class="form-control" name="t6" placeholder="Unit">
                      @foreach($melist as $ma)
                      @if($ma->unitid==$p->unitid)

                        <option selected value='{{$ma->unitid}}'>{{$ma->unit}}</option>
                        @else
                        <option value='{{$ma->unitid}}'>{{$ma->unit}}</option>
                        
                        @endif
                        @endforeach
                     
                        <select>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update</button>
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
@extends('admindesign')

@section('content')



<div class="card">


<div class="card-body">
                  <h4 class="card-title">Product Report</h4>
                  <form class="forms-sample" method="get" action="/productreport">
                  
                    <div class="form-group">
                    
                    <label for="exampleInputName1">Cateogry</label>

                      <select class="form-control" name="t1">
                      @foreach($calist as $ct)
                          <option value="{{$ct->categoryid}}">{{$ct->categoryname}}</option>
		                    @endforeach
                      <select>
                    
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>

                    
                <div class="card-body">
                  <h4 class="card-title">Product List</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th>Unit</th>
                          <th>Description</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($prolist as $p)
                        <tr>
                        <td>
                            {{$p->productid}}
                          </td>
                            
                        <td>
                            {{$p->productname}}
                          </td>
                          <td>
                            {{$p->categoryname}} 
                                                    </td>
                          <td>
                            {{$p->price}}
                          </td>
                          <td>
                            {{$p->unit}}
                          </td>
                          

                          <td>
                            {{$p->description}}
                          </td>
                          
                          
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              



              </div>


@endsection
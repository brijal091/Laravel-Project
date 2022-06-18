@extends('admindesign')

@section('content')



<div class="card">
                



<div class="card-body">
                  <h4 class="card-title">Order Report</h4>
                  <form class="forms-sample" method="get" action="/orderreport">
                  
                    <div class="form-group">
                    
                    <label for="exampleInputName1">From</label>

                      <input type="date" class="form-control" name="t1">
                     
                    
                    </div>

                    
                    <div class="form-group">
                    
                    <label for="exampleInputName1">To</label>

                      <input type="date" class="form-control" name="t2">
                     
                    
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>

                    
                <div class="card-body">
                  <h4 class="card-title">Order Details</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Contactno</th>
                          
                          
                          <th>Payment Mode</th>
                          <th>Paymentid</th>
                          <th>Order Date</th>
                          <th>Orde Status</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($orlist as $or)
                        <tr>
                      
						        
						        
						        <td >{{$or->orderid}}</td>
						        <td >{{$or->firstname}} {{$or->lastname}}</td>
						        <td >{{$or->address}}<br>{{$or->cityname}}</td>
						        <td >{{$or->phone}}</td>
						        
						        <td >{{$or->payment}}</td>
								<td >{{$or->paymentid}}</td>
								<td >{{$or->created_at}}</td>
								<td >{{$or->orderstate}}</td>
								                
                      </tr>


                      <tr >
								 <td></td>
						     <td colspan="9">
							 <table border="1">
							 <tr>
                            <td>
								 Product name
</td>
<td>
	 Image
</td>
								<td>
								 Price
</td>
								<td>
								 Measurement
</td>
								<td>
								 Quantity
</td>
								<td>
								 Total
</td>

 							</tr>
                             @for($i=0;$i<count($or->orderdetails);$i++)
							 
							 <tr>
                             <td>{{$or->orderdetails[$i]->productname}}</td>
					
                             <td>
                             <img src='{!! asset($or->orderdetails[$i]->productimage) !!}' width="100" height="100">
                    
</td>

                    
							 <td>Rs. {{$or->orderdetails[$i]->price}}</td>
							 <td>{{$or->orderdetails[$i]->unit}}</td>
							 <td>{{$or->orderdetails[$i]->quantity}}</td>
							 <td>Rs. {{$or->orderdetails[$i]->price*$or->orderdetails[$i]->quantity}}</td>
							 
							</tr>
  @endfor
							</table>
</td>
                           
 							</tr>


                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>





              </div>


@endsection
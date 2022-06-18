<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Measurement;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Ordermaster;
use App\Models\Orderdetails;



class RazorpayController extends Controller
{

  public function vieworder(Request $request)
  {
    $id=$request->session()->get("id");

    $orlist=DB::table('ordermasters')->select('ordermasters.*')->where('ordermasters.userid','=',$id)->orderBy('ordermasters.orderid', 'desc')->get();
   
    for($i=0;$i<count($orlist);$i++)
    {

    $ordlist=DB::table('orderdetails')->join('products','products.productid','=','orderdetails.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->select('products.*','categories.*','measurements.*','orderdetails.*')->where('orderdetails.orderid','=',$orlist[$i]->orderid)->get();
    $orlist[$i]->orderdetails=$ordlist; 
   }

    return view('order',compact('orlist'));
   
  }


  public function viewuserorder(Request $request)
  {
    
    $orlist=DB::table('ordermasters')->join('registrations','ordermasters.userid','=','registrations.userid')->join('cities','cities.cityid','=','registrations.cityid')->select('ordermasters.*','registrations.*','cities.*')->where('ordermasters.orderstate','=','New')->get();
   
    for($i=0;$i<count($orlist);$i++)
    {

    $ordlist=DB::table('orderdetails')->join('products','products.productid','=','orderdetails.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->select('products.*','categories.*','measurements.*','orderdetails.*')->where('orderdetails.orderid','=',$orlist[$i]->orderid)->get();
    $orlist[$i]->orderdetails=$ordlist; 
   }

    return view('viewuserorder',compact('orlist'));
   
  }


  public function viewalluserorder(Request $request)
  {
    
    $orlist=DB::table('ordermasters')->join('registrations','ordermasters.userid','=','registrations.userid')->join('cities','cities.cityid','=','registrations.cityid')->select('ordermasters.*','registrations.*','cities.*')->get();
   
    for($i=0;$i<count($orlist);$i++)
    {

    $ordlist=DB::table('orderdetails')->join('products','products.productid','=','orderdetails.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->select('products.*','categories.*','measurements.*','orderdetails.*')->where('orderdetails.orderid','=',$orlist[$i]->orderid)->get();
    $orlist[$i]->orderdetails=$ordlist; 
   }

    return view('viewalluserorder',compact('orlist'));
   
  }


  public function orderreport(Request $request)
  {
    
    if($request->get("t1")!=null)
    {

      $t1=$request->get("t1");
      $t2=$request->get("t2");
      

    $orlist=DB::table('ordermasters')->join('registrations','ordermasters.userid','=','registrations.userid')->join('cities','cities.cityid','=','registrations.cityid')->select('ordermasters.*','registrations.*','cities.*')->where('ordermasters.created_at','>=',$t1)->where('ordermasters.created_at','<=',$t2)->get();
   
    for($i=0;$i<count($orlist);$i++)
    {

    $ordlist=DB::table('orderdetails')->join('products','products.productid','=','orderdetails.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->select('products.*','categories.*','measurements.*','orderdetails.*')->where('orderdetails.orderid','=',$orlist[$i]->orderid)->get();
    $orlist[$i]->orderdetails=$ordlist; 
   }

  }
  else{

    $orlist=[];

  }

    return view('orderreport',compact('orlist'));
   
  }


  public function statuswiseorderreport(Request $request)
  {
    
    if($request->get("t1")!=null)
    {

      $t1=$request->get("t1");
      $t2=$request->get("t2");
      

    $orlist=DB::table('ordermasters')->join('registrations','ordermasters.userid','=','registrations.userid')->join('cities','cities.cityid','=','registrations.cityid')->select('ordermasters.*','registrations.*','cities.*')->where('ordermasters.orderstate','=',$t1)->get();
   
    for($i=0;$i<count($orlist);$i++)
    {

    $ordlist=DB::table('orderdetails')->join('products','products.productid','=','orderdetails.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->select('products.*','categories.*','measurements.*','orderdetails.*')->where('orderdetails.orderid','=',$orlist[$i]->orderid)->get();
    $orlist[$i]->orderdetails=$ordlist; 
   }

  }
  else{

    $orlist=[];

  }

    return view('statuswiseorderreport',compact('orlist'));
   
  }



  public function deliver(Request $request)
  {
    $id=$request->get("x");
    $od=Ordermaster::find($id);
    $od->orderstate="Deliver";
    $od->save();
    return redirect('viewuserorder');

  }


  public function payment(Request $request)
  {        
      $input = $request->all();        
      $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
      $payment = $api->payment->fetch($input['razorpay_payment_id']);

      if(count($input)  && !empty($input['razorpay_payment_id'])) 
      {
          try 
          {
              $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

          } 
          catch (\Exception $e) 
          {
              return  $e->getMessage();
              \Session::put('error',$e->getMessage());
              return redirect()->back();
          }            
      }

      $id=$request->session()->get("id");

      $od=new Ordermaster;
      $od->userid=$id;
      $od->payment="Online";
      $od->paymentstate="Paid";
      $od->paymentid=$input['razorpay_payment_id'];
      $od->orderstate="New";
      $od->save();

      $crtlist=DB::table('carts')->join("products","carts.productid","=","products.productid")->select('carts.*',"products.*")->where('carts.userid',"=",$id)->get();
      
      for($i=0;$i<count($crtlist);$i++)
      {
           $odd=new Orderdetails;
           $odd->orderid=$od->orderid;
           $odd->productid=$crtlist[$i]->productid;
           $odd->quantity=$crtlist[$i]->quantity;
           $odd->price=$crtlist[$i]->price;
           $odd->save();  
      }
      DB::table('carts')->where('carts.userid','=',$id)->delete();

     // \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
      return redirect('order');
  }
    
}

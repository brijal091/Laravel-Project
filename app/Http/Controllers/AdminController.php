<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Ordermaster;



class AdminController extends Controller
{

     
  public function adminlogin(Request $request)
  {
    $msg="";
      return view('adminlogin',compact('msg'));
  }
  
  
  public function adminwelcome(Request $request)
  {
      $prolist=Product::all();

      //$data=Ordermaster::all();
      $orderlist=DB::table('ordermasters')->select(DB::raw('count(orderid) as `data`'),DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
->groupby('year','month')
->get();

     //print_r($orderlist[0]->month);
     return view('adminwelcome',compact('prolist','orderlist'));
  }

    public function CheckAdminLogin(Request $request) 
    {
        $l=$request->post("t1");
        $p=$request->post("t2");
        
       $ad= Admin::where('loginid', $l)
                ->where('password', $p)
                ->get(['name','adminid']);
        if(count($ad)==0)
        {
            $msg="Invalid Loginid or Password";
          return redirect('adminlogin')->with('msg');

        }
        else{

            $request->session()->put('name',$ad[0]->name);
            $request->session()->put('id',$ad[0]->adminid);
            

          return redirect('adminwelcome');

        }
    
     }

    function adminupdatepassword(Request $request)
    {

        $op=$request->post("t1");
        $np=$request->post("t2");
        $id=$request->session()->get('id');
        $ad= Admin::where('adminid', $id)
                ->where('password', $op)
                ->get(['name','adminid']);

         if(count($ad)==0)
         {
            $msg="Invalid Old Password";
            return view('adminchangepassword',compact('msg'));
  
         }       
         else{
             $ad=Admin::find($id);
             $ad->password=$np;
             $ad->save();
            $msg="Your password changed successfully.";
            return view('adminchangepassword',compact('msg'));
  
         }
    }
    
    
    
    
}

<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\State;
use App\Models\City;
use App\Models\Registration;

use App\Models\Product;
use App\Models\Category;


class RegistrationController extends Controller
{


  public function viewuserwelcome(Request $request)
  {
  
    $calist=Category::all();
    if($request->get("x")!=null)
    {
          $cid=$request->get("x");
          $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->where('products.categoryid','=',$cid)->get();
   
    }
    else{
    $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->get();
    }


    return view('userwelcome',compact('calist','prlist'));
     
  }
  public function viewlogin()
{

  return view('login');
   
}

  
public function viewregistration()
{

  $stlist=State::all();
  $ctlist=City::all();
  
  return view('registration',compact('stlist','ctlist'));

   
}

public function userchangepassword(Request $request)
{

  
  
  return view('userchangepassword');

   
}


public function viewuserprofile(Request $request)
{

  $id=$request->session()->get('id');

  $stlist=State::all();
  $ctlist=City::all();
  $rg=Registration::find($id);
  
  return view('userprofile',compact('stlist','ctlist','rg'));

   
}

public function updateuserpassword(Request $request)
{
  $id=$request->session()->get('id');
  $r=Registration::find($id);
  
  $op=$request->post("t1");
  $np=$request->post("t2");
  
  if($r->password==$op)
  {
    $r->password=$np;
    $r->save();
    return redirect('userchangepassword?x=1');
  }
  else{
    return redirect('userchangepassword?x=0');
  }

  
  
  

}


public function updateprofile(Request $request)
{
  $id=$request->session()->get('id');
  $r=Registration::find($id);
  
  $fna=$request->post("t1");
  $lna=$request->post("t2");
  $ad=$request->post("t3");
  $sid=$request->post("t4");
  $cid=$request->post("t5");
  $pin=$request->post("t6");
  $ph=$request->post("t7");
  
  $r->firstname=$fna;
  $r->lastname=$lna;
  $r->address=$ad;
  $r->cityid=$cid;
  $r->pincode=$pin;
  $r->phone=$ph;
  
  $request->session()->put('name',$fna." ".$lna);
       
  
  $r->save();
  return redirect('userprofile');

}


public function AddRegistration(Request $request)
{
  $fna=$request->post("t1");
  $lna=$request->post("t2");
  $ad=$request->post("t3");
  $sid=$request->post("t4");
  $cid=$request->post("t5");
  $pin=$request->post("t6");
  $ph=$request->post("t7");
  $e=$request->post("t8");
  $ps=$request->post("t9");
 
  $r=new Registration;
  $r->firstname=$fna;
  $r->lastname=$lna;
  $r->address=$ad;
  $r->cityid=$cid;
  $r->pincode=$pin;
  $r->phone=$ph;
  $r->emailid=$e;
  $r->password=$ps;
  
  
  $r->save();
  return redirect('login');

}

    public function userchecklogin(Request $request) 
    {
        $l=$request->post("t1");
        $p=$request->post("t2");
        
       $ad= Registration::where('emailid', $l)
                ->where('password', $p)
                ->get(['firstname','lastname','userid']);
        if(count($ad)==0)
        {
            $msg="Invalid Loginid or Password";
          return redirect('login?x=0')->with('msg');

        }
        else{

            $request->session()->put('name',$ad[0]->firstname." ".$ad[0]->lastname);
            $request->session()->put('id',$ad[0]->userid);
            

          return redirect('userwelcome');

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

<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Registration;
use App\Models\City;
use DB;

use App\Models\Category;


class FeedbackController extends Controller
{
  
    public function viewfeedback(Request $request) 
    {
        $calist=Category::all();
        return view('feedback',compact('calist'));
     }
    
     public function insertfeedback(Request $request)
     {

        
         $f=new Feedback;
         $f->feedback=$request->post("t1");
         $f->userid=$request->session()->get("id");
         $f->save();

         $calist=category::all();

         return redirect('feedback?x=1')->with('calist');

     }

      public function deletefeedback(Request $request)
      {
        $id=$request->get("x");
          $f=Feedback::find($id);
          $f->delete();
          return redirect('viewfeedbackadmin');
          
      }

      public function viewfeedbackadmin(Request $request)
      {
          $flist=DB::table('feedback')->join('registrations','registrations.userid','=','feedback.userid')->select('registrations.*','feedback.*')->get();

          return view('viewfeedback',compact('flist'));
          
      }

    
}

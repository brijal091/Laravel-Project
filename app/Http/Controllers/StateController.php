<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
  
    public function viewstate(Request $request) 
    {
        $stlist=State::all();
        return view('state',compact('stlist'));
     }
    
     public function insertstate(Request $request)
     {
         $st=new State;
         $st->statename=$request->post("t1");
         $st->save();
         $stlist=State::all();
        
         return redirect('state')->with('stlist');
     }

      public function deletestate($id)
      {
          $st=State::find($id);
          $st->delete();
          $stlist=State::all();
          return redirect('state')->with('stlist');
      }

      public function editstate($id)
      {
          $stt=State::find($id);

          $stlist=State::all();
          return view('editstate',compact('stlist','stt'));
          
      }

      public function updatestate(Request $request)
      {
           $id=$request->post("id");
          $st=State::find($id);
          $st->statename=$request->post("t1");
          $st->save();
          $stlist=State::all();
         
          return redirect('state')->with('stlist'); 
      }
    
    
}

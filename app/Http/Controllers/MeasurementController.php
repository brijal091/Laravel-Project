<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Measurement;

class MeasurementController extends Controller
{
  
    public function viewmeaserment(Request $request) 
    {
        $mtlist=Measurement::all();
        return view('measurement',compact('mtlist'));
     }
    
     public function insertunit(Request $request)
     {
         $mt=new Measurement;
         $mt->unit=$request->post("t1");
         $mt->save();
         $mtlist=Measurement::all();
        
         return redirect('measurement')->with('mtlist');
     }

      public function deleteunit($id)
      {
          $mt=Measurement::find($id);
          $mt->delete();
          $mtlist=Measurement::all();
          return redirect('measurement')->with('mtlist');
          
      }

      
      public function editunit($id)
      {
          $met=Measurement::find($id);
          $mtlist=Measurement::all();
          return view('editmeasurement',compact('mtlist','met'));
          
      }

      public function updateunit(Request $request)
      {
          $id=$request->post("id");
          $mt=Measurement::find($id);
          $mt->unit=$request->post("t1");
          $mt->save();
          $mtlist=Measurement::all();
         
          return redirect('measurement')->with('mtlist');
        }

    
}
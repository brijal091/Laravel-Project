<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\City;
use App\Models\State;

class CityController extends Controller
{
  
    public function viewcity(Request $request) 
    {
        $stlist=State::all();
        $ctlist=City::all();
        $ctlist=DB::table('cities')->select('cities.*','states.*')->join('states', 'states.stateid', '=', 'cities.stateid')->get();
        return view('city',compact('stlist','ctlist'));
     }
    
     public function insertcity(Request $request)
     {
         $ct=new City;
         $ct->cityname=$request->post("t1");
         $ct->stateid=$request->post("t2");
         
         $ct->save();
         $stlist=State::all();
         $ctlist=DB::table('cities')->select('cities.*','states.*')->join('states', 'states.stateid', '=', 'cities.stateid')->get();
     
         return redirect('city')->with('stlist','ctlist');
        
        }

      public function deletecity($id)
      {
          $ct=City::find($id);
          $ct->delete();
          $stlist=State::all();
          $ctlist=DB::table('cities')->select('cities.*','states.*')->join('states', 'states.stateid', '=', 'cities.stateid')->get();
      
          return redirect('city')->with('stlist','ctlist');
          
      }

      public function editcity($id)
      {
          $ctt=City::find($id);

          $stlist=State::all();
          $ctlist=DB::table('cities')->select('cities.*','states.*')->join('states', 'states.stateid', '=', 'cities.stateid')->get();
      
          return view('editcity',compact('stlist','ctlist','ctt'));
          
      }

      public function updatecity(Request $request)
      {
           $id=$request->post("id");
          
          $ct=City::find($id);
          $ct->cityname=$request->post("t1");
          $ct->stateid=$request->post("t2");
          $ct->save();

          $stlist=State::all();
          $ctlist=DB::table('cities')->select('cities.*','states.*')->join('states', 'states.stateid', '=', 'cities.stateid')->get();
      
         
          return redirect('city')->with('stlist','ctlist');
          
      }
    
    
}

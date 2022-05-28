<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
  
    public function viewcategory(Request $request) 
    {
        $calist=Category::all();
        return view('category',compact('calist'));
     }
    
     public function insertcategory(Request $request)
     {

        $file = $request->file('t2');
        
        $file->move(public_path().'/images',$file->getClientOriginalName());

        $path="/images/".$file->getClientOriginalName();

         $ca=new Category;
         $ca->categoryname=$request->post("t1");
         $ca->categoryimage=$path;
         $ca->save();

         $calist=category::all();

         return redirect('category')->with('calist');

     }

      public function deletecategory($id)
      {
          $ca=Category::find($id);
          $ca->delete();
          $calist=category::all();
          return redirect('category')->with('calist');
          
      }

      public function editcategory($id)
      {
          $cat=Category::find($id);

          $calist=category::all();
          return view('editcategory',compact('calist','cat'));
          
      }

      public function updatecategory(Request $request)
      {
           $id=$request->post("id");

          $ct=Category::find($id);
          $ct->categoryname=$request->post("t1");


          $file = $request->file('t2');
         if($file!=null)
         {
            $file->move(public_path().'/images',$file->getClientOriginalName());
             $path="/images/".$file->getClientOriginalName();
             $ct->categoryimage=$path;
         }
        
          
          $ct->save();
          $calist=Category::all();
         
          return redirect('category')->with('calist');
          
      }
    
    
}

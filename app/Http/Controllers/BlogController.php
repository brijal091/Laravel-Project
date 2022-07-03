<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\BLog;

class BlogController extends Controller
{
  
    public function viewblog(Request $request) 
    {
    
        $blist=blog::all();
        return view('blog',compact('blist'));
     }
   
     public function viewbloguser(Request $request) 
     {
         $blist=blog::all();
         return view('viewblog',compact('blist'));
      }
    
      public function viewsinglebloguser(Request $request) 
      {
          $id=$request->get("x");
          $b=blog::find($id);
          return view('viewsingleblog',compact('b'));
       }
     

       public function viewblogloginuser(Request $request) 
     {
         $blist=blog::all();
         return view('loginviewblog',compact('blist'));
      }
    
      public function viewsingleblogloginuser(Request $request) 
      {
          $id=$request->get("x");
          $b=blog::find($id);
          return view('loginviewsingleblog',compact('b'));
       }
     

     public function insertblog(Request $request)
     {

        $file = $request->file('t3');
        
        $file->move(public_path().'/images',$file->getClientOriginalName());

        $path="/images/".$file->getClientOriginalName();

         $ca=new Blog;
         $ca->title=$request->post("t1");
         $ca->description=$request->post("t2");
         
         $ca->image=$path;
         $ca->save();

         $blist=blog::all();

         return redirect('blog')->with('blist');

     }

      public function deleteblog($id)
      {
          $b=blog::find($id);
          $b->delete();
          $blist=blog::all();
          return redirect('blog')->with('blist');
          
      }

      public function editblog($id)
      {
          $b=blog::find($id);

          $blist=blog::all();
          return view('editblog',compact('blist','b'));
          
      }

      public function updateblog(Request $request)
      {
           $id=$request->post("id");

          $b=blog::find($id);
          $b->title=$request->post("t1");
          $b->description=$request->post("t2");


          $file = $request->file('t3');
         if($file!=null)
         {
            $file->move(public_path().'/images',$file->getClientOriginalName());
             $path="/images/".$file->getClientOriginalName();
             $b->image=$path;
         }
        
          
          $b->save();
          $blist=blog::all();
         
          return redirect('blog')->with('blist');
          
      }
    
    
}

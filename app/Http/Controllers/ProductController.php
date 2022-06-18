<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Measurement;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
  
    public function viewproduct(Request $request) 
    {
        $calist=Category::all();
        $melist=Measurement::all();
        $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->get();
        
        
        return view('product',compact('calist','melist','prlist'));
     }
    
     public function insertproduct(Request $request)
     {

        $file = $request->file('t4');
        
        $file->move(public_path().'/images',$file->getClientOriginalName());

        $path="/images/".$file->getClientOriginalName();

         $p=new Product;
         $p->productname=$request->post("t1");
         $p->categoryid=$request->post("t2");
         $p->price=$request->post("t5");
         $p->description=$request->post("t3");
         $p->unitid=$request->post("t6");   
         
         $p->productimage=$path;
         $p->save();

         $calist=Category::all();
         $melist=Measurement::all();
         $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->get();
         
         return redirect('product')->with('calist','melist','prlist');

          }

      public function deleteproduct($id)
      {
          $p=Product::find($id);
          $p->delete();
      
          $calist=Category::all();
          $melist=Measurement::all();
          $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->get();
          
          
          return redirect('product')->with('calist','melist','prlist');

      }

      public function editproduct($id)
      {
          $p=Product::find($id);

          $calist=Category::all();
          $melist=Measurement::all();
          $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->get();
          
          
          return view('editproduct',compact('calist','melist','prlist','p'));
       
      }

      public function updateproduct(Request $request)
      {
           $id=$request->post("id");

          $p=Product::find($id);
          $p->productname=$request->post("t1");
         $p->categoryid=$request->post("t2");
         $p->price=$request->post("t5");
         $p->description=$request->post("t3");
         $p->unitid=$request->post("t6");   
         
         

          $file = $request->file('t4');
         if($file!=null)
         {
            $file->move(public_path().'/images',$file->getClientOriginalName());
             $path="/images/".$file->getClientOriginalName();
             $p->productimage=$path;
         }
        
          
          $p->save();
          $calist=Category::all();
          $melist=Measurement::all();
          $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->get();
          
          
          return redirect('product')->with('calist','melist','prlist');
       
      }
    


      public function userhomepage(Request $request)
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
        return view('userhomepage',compact('calist','prlist'));
      }
     

      public function productdetail(Request $request)
      {

        
              $cid=$request->get("x");
              $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->where('products.productid','=',$cid)->get();
       
        
        return view('productdetail',compact('prlist'));
      }
     

      public function userproductdetail(Request $request)
      {

        
              $cid=$request->get("x");
              $prlist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->where('products.productid','=',$cid)->get();
       
        
        return view('userproductdetail',compact('prlist'));
      }
     

      
public function productreport(Request $request)
{

  $calist=Category::all();

  if($request->get("t1")!=null)
  {
    $id=$request->get("t1");
    $prolist=DB::table('products')->select('products.*','categories.*','measurements.*')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->where('products.categoryid','=',$id)->get();
       
  }
  else{
  $prolist=[];
  }
  
  return view('productreport',compact('calist','prolist'));
   
}

    
}

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
use App\Models\Cart;
use DB;

class CartController extends Controller
{
  
    public function viewcart(Request $request) 
    {
        $uid=$request->session()->get('id');
    
        $crtlist=DB::table('products')->select('products.*','categories.*','measurements.*','carts.*')->join('carts', 'carts.productid', '=', 'products.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->where('carts.userid','=',$uid)->get();
        
        
        return view('cart',compact('crtlist'));
     }
    
     public function addtocart(Request $request)
     {

         $uid=$request->session()->get('id');
         $pid=$request->post("pid");

         $crtl=DB::table('carts')->select('carts.*')->where('userid','=',$uid)->where('productid','=',$pid)->get();
         if(count($crtl)==0)
         {

         $c=new Cart;
         $c->userid=$request->session()->get('id');
         $c->productid=$request->post("pid");
         $c->quantity=$request->post("quantity");
         
         $c->save();
         }
         else{
             $c=Cart::find($crtl[0]->cartid);

             $c->quantity=$c->quantity+$request->post("quantity");
             $c->save();
         }
         $crtlist=DB::table('products')->select('products.*','categories.*','measurements.*','carts.*')->join('carts', 'carts.productid', '=', 'products.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->where('carts.userid','=',$uid)->get();
         
         return redirect('cart')->with('crtlist');

          }

      public function deletecart(Request $request)
      {
        $uid=$request->session()->get('id');
      
        $cid=$request->get("x");
        $c=Cart::find($cid);
        $c->delete();
        $crtlist=DB::table('products')->select('products.*','categories.*','measurements.*','carts.*')->join('carts', 'carts.productid', '=', 'products.productid')->join('categories', 'categories.categoryid', '=', 'products.categoryid')->join('measurements', 'measurements.unitid', '=', 'products.unitid')->where('carts.userid','=',$uid)->get();
         
        return redirect('cart')->with('crtlist');

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
     

    
}

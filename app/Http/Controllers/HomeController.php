<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Durable;
use App\Models\Category;
use App\Models\Catagory;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  //  public function __construct()
  //  {
  //      $this->middleware('auth');
  //  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $cart=Session::get('cart');
        return view('home',['cartItems'=>$cart])
        ->with("durables",Durable::paginate(999999))
        ->with("categories",Category::all()->sortBy('category_name'));
    }

    public function find($id)
    {
        $cart=Session::get('cart');
        $category=Category::find($id);

        return view("process.find",['cartItems'=>$cart])

        ->with("categories",Category::all()->sortBy('category_name'))
        ->with("durables",$category->durables()->paginate(999999))
        ->with('feature',$category->category_name);
    }

    public function details($id)
    {
      return view("process.details")
      ->with("durable",Durable::find($id));

    }

    public function sentLine(){

      return view('process.lineToken');
        

        // return response()->json($logOtp,200);
    }

    public function LineToken(Request $request){

      $dataid = $request->id;
      $request->token;

      DB::table('linetoken')
                        ->where('id', $dataid)
                        ->update(['token' => $request->token]);

      return view('process.lineToken');
      

      // return response()->json($logOtp,200);
  }

    

}

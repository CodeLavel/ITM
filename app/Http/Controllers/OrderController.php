<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Orderitem;
use App\Models\Durable;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function orderPanel()
    {
      $orders=DB::table('orders')->orderByDesc('order_id')->paginate(10);
      return view('process.orderPanel',["orders"=>$orders]);
    }

    public function showOrderDetail(Request $request,$id)
    {
      $orderitems=DB::table('orders')
      ->join('orderitems','orders.order_id','=','orderitems.order_id')
      ->where('orders.order_id',$id)->get();

      return view('process.orderDetails',["orderitems"=>$orderitems]);
    }

    public function detailord($id)
    {

      return view('process.back')
      ->with("durables",Durable::find($id));
    }

    public function addQuantityToInventory(Request $request,$id)
    {
      $durable=Durable::find($id);
      $durable->use=$request->use;
      $durable->save();
      $addStatus = DB::table('orderitems')
                        ->where('item_id', $id)
                        ->update(['item_status' => 1]);
      return redirect('/orders')->with('success','บันทึกจำนวนคืนเรียบร้อยแล้ว');
    }

    public function searchOrder(Request $request)
    {
      $orders=DB::table('orders');
      $fname=$request->searchOrder;
      $orders=Order::where('fname',"LIKE","%{$fname}%")->paginate(100);
      return view("process.searchOrder",["orders"=>$orders]);
    }
    // public function Otp(Request $request)
    // {
    //   return "OTP";
    // }
    public function showorder(){

      $ordersall=DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->paginate(10);
      return view("process.showOrder",["ordersall"=>$ordersall]);
        //return "Show All Order";

    }
    public function showordermount(){
      $ordersmount=DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->whereMonth('orders.date', Carbon::now()->format('m'))->paginate(100);
      //print_r($ordersmount);
      return view("process.showOrderMount",["ordersmount"=>$ordersmount]);
    }
    
}
//->join('orderitems','orders.order_id','=','orderitems.order_id')
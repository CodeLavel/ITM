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
      // print_r($orderitems);
      return view('process.orderDetails',["orderitems"=>$orderitems]);
    }

    public function detailord(Request $request)
    {
      $data1 = $request->order_id;
      $data2 = $request->item_id;
       $data = DB::table('orderitems')->where('order_id', $data1)->where('item_id', $data2)->first();
      //  print_r($data->item_id);

      
      print_r($data1);
      // print_r($data2);

       
      
      return view('process.back')
      ->with("durables",Durable::find($data2))->with("Ordersall", $data);
    }

    public function addQuantityToInventory(Request $request,$id)
    {
      // print_r($request->use);
      // echo "<pre>";
      // print_r($request->amount);
      // echo "</pre>";
      // print_r($id);
      $durable=Durable::find($id)->increment('use',$request->amount);
      // $durable->use=$request->amount;
      // $durable->save();
      // DB::table('durablelog')->where('item_id', $item_id)->update(['total' => DB::raw('total+1')]);
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
      

      // if($datelist != null){
      //   
      // }else{
        $ordersmount=DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->whereMonth('orders.date', Carbon::now()->format('m'))->paginate(10);
      //}

      
      //print_r($ordersmount);
      return view("process.showOrderMount",["ordersmount"=>$ordersmount]);
    }
    public function showorderdate(Request $request){
      $datelist = $request->input('fromDate');
      $datelists = $request->input('toDate');
      $ordersall=DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->where('orders.date','>=', $datelist)->where('orders.date','<=', $datelists)->paginate(10);
      if($ordersall){
        return view("process.showOrder",["ordersall"=>$ordersall]);
      }else{
        return redirect('orders/showordermount');
      }
      
    }
    public function showorderlogs(){

      $orderlogs=DB::table('durablelog')->join('durables','durablelog.item_id','=','durables.id')->orderBy('total', 'desc')->paginate(10);
      return view("process.showOrderlogs",["orderlogs"=>$orderlogs]);
        //return "Show All Order";

    }
}
//->join('orderitems','orders.order_id','=','orderitems.order_id')
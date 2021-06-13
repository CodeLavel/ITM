<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Orderitem;
use App\Models\Durable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Elibyy\TCPDF\Facades\TCPDF as PDF;
use Illuminate\Support\Facades\View as View;

class OrderController extends Controller
{
    public function orderPanel()
    {
      $orders=DB::table('orders')->where('otp_status', 1)->orderByDesc('order_id')->paginate(10);
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

      $ordersall=DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->where('success' , 1)->paginate(10);
      return view("process.showOrder",["ordersall"=>$ordersall]);
        //return "Show All Order";

    }
    public function showordermount(){
      

      // if($datelist != null){
      //   
      // }else{
        $ordersmount=DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->where('success' , 1)->whereMonth('orders.date', Carbon::now()->format('m'))->paginate(10);
      //}

      
      //print_r($ordersmount);
      return view("process.showOrderMount",["ordersmount"=>$ordersmount]);
    }
    public function showorderdate(Request $request){
      $datelist = $request->input('fromDate');
      $datelists = $request->input('toDate');
      $ordersall=DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->where('orders.date','>=', $datelist)->where('orders.date','<=', $datelists)->where('success' , 1)->paginate(10);
      if($ordersall){
        return view("process.showOrder",["ordersall"=>$ordersall]);
      }else{
        return redirect('orders/showordermount');
      }
      
    }
    public function showorderlogs(){
      $orderlogs=DB::table('durablelog')->join('durables','durablelog.item_id','=','durables.id')->orderBy('total', 'desc')->paginate(10);
      return view("process.showOrderlogs",["orderlogs"=>$orderlogs]);
    }

    public function showordersuccess(){
      $ordersuccess=DB::table('orders')->join('orderitems','orderitems.order_id','=','orders.order_id')->where('item_status',1)->paginate(10);
      
      
      return view("process.showOrderSucess",["ordersuccess"=>$ordersuccess]);
    }
    
    public function showorderfailed(){
      $orderfailed=DB::table('orders')->join('orderitems','orderitems.order_id','=','orders.order_id')->where('item_status',null)->paginate(10);
      return view("process.showOrderFailed",["orderfailed"=>$orderfailed]);
    }

   public function pdf()
    {
      $day = Carbon::now()->format('d');
      $m = Carbon::now()->format('m');
      $thai_months = [
        '01' => 'มกราคม',
        '02' => 'กุมภาพันธ์',
        '03' => 'มีนาคม',
        '04' => 'เมษายน',
        '05' => 'พฤษภาคม',
        '06' => 'มิถุนายน',
        '07' => 'กรกฎาคม',
        '08' => 'สิงหาคม',
        '09' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤศจิกายน',
        '12' => 'ธันวาคม',
    ];
    $month = $thai_months[$m];
      $y = Carbon::now()->format('Y');
      $year = $y + 543;
      $logs = DB::table('orders')->join('orderitems','orders.order_id','=','orderitems.order_id')->where('success' , 1)->whereMonth('orders.date', Carbon::now()->format('m'))->paginate(9999);
      $view=view("process.pdf",["logs"=>$logs],compact('day','month','year'));
      $html=$view->render();
      $pdf = new PDF();
      $pdf::SetTitle('รายการยืมครุภัณฑ์ประจำเดือน');
      $pdf::AddPage();
      $pdf::SetFont('freeserif');
      $pdf::WriteHTML($html,true,false,true,false);
      $pdf::Output('report.pdf');
    }
    public function pdf2()
    {
      $day = Carbon::now()->format('d');
      $m = Carbon::now()->format('m');
      $thai_months = [
        '01' => 'มกราคม',
        '02' => 'กุมภาพันธ์',
        '03' => 'มีนาคม',
        '04' => 'เมษายน',
        '05' => 'พฤษภาคม',
        '06' => 'มิถุนายน',
        '07' => 'กรกฎาคม',
        '08' => 'สิงหาคม',
        '09' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤศจิกายน',
        '12' => 'ธันวาคม',
    ];
    $month = $thai_months[$m];
      $y = Carbon::now()->format('Y');
      $year = $y + 543;
      $logs2 = DB::table('durablelog')->join('durables','durablelog.item_id','=','durables.id')->orderBy('total', 'desc')->paginate(9999);
      $view=view("process.pdf2",["logs2"=>$logs2],compact('day','month','year'));
      $html=$view->render();
      $pdf = new PDF();
      $pdf::SetTitle('รายการยืมครุภัณฑ์ประจำเดือน');
      $pdf::AddPage();
      $pdf::SetFont('freeserif');
      $pdf::WriteHTML($html,true,false,true,false);
      $pdf::Output('report.pdf');
    }
    public function pdf3()
    {
      $day = Carbon::now()->format('d');
      $m = Carbon::now()->format('m');
      $thai_months = [
        '01' => 'มกราคม',
        '02' => 'กุมภาพันธ์',
        '03' => 'มีนาคม',
        '04' => 'เมษายน',
        '05' => 'พฤษภาคม',
        '06' => 'มิถุนายน',
        '07' => 'กรกฎาคม',
        '08' => 'สิงหาคม',
        '09' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤศจิกายน',
        '12' => 'ธันวาคม',
    ];
    $month = $thai_months[$m];
      $y = Carbon::now()->format('Y');
      $year = $y + 543;
      $logs3 = DB::table('orders')->join('orderitems','orderitems.order_id','=','orders.order_id')->where('item_status',1)->paginate(9999);
      $view=view("process.pdf3",["logs3"=>$logs3],compact('day','month','year'));
      $html=$view->render();
      $pdf = new PDF();
      $pdf::SetTitle('รายการยืมครุภัณฑ์คืนแล้ว');
      $pdf::AddPage();
      $pdf::SetFont('freeserif');
      $pdf::WriteHTML($html,true,false,true,false);
      $pdf::Output('report.pdf');
    }
    public function pdf4()
    {
      $day = Carbon::now()->format('d');
      $m = Carbon::now()->format('m');
      $thai_months = [
        '01' => 'มกราคม',
        '02' => 'กุมภาพันธ์',
        '03' => 'มีนาคม',
        '04' => 'เมษายน',
        '05' => 'พฤษภาคม',
        '06' => 'มิถุนายน',
        '07' => 'กรกฎาคม',
        '08' => 'สิงหาคม',
        '09' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤศจิกายน',
        '12' => 'ธันวาคม',
    ];
    $month = $thai_months[$m];
      $y = Carbon::now()->format('Y');
      $year = $y + 543;
      $logs4 = DB::table('orders')->join('orderitems','orderitems.order_id','=','orders.order_id')->where('item_status',null)->paginate(9999);
      $view=view("process.pdf4",["logs4"=>$logs4],compact('day','month','year'));
      $html=$view->render();
      $pdf = new PDF();
      $pdf::SetTitle('รายการยืมครุภัณฑ์ยังไม่คืน');
      $pdf::AddPage();
      $pdf::SetFont('freeserif');
      $pdf::WriteHTML($html,true,false,true,false);
      $pdf::Output('report.pdf');
    }



}
//->join('orderitems','orders.order_id','=','orderitems.order_id')
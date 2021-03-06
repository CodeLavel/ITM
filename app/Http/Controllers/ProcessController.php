<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Durable;
use App\Cart;
use Exception;
use Illuminate\Support\Facades\App;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Str;


class ProcessController extends Controller
{
    public function checkout(){
      return view('process.checkoutPage');
    }

    public function addQuantityToCart(Request $request,$id)
    {
      $id=$request->_id;
      $quantity=$request->quantity;

      $durable=Durable::find($id);
      $prevCart=$request->session()->get('cart');
      $cart=new Cart($prevCart);
      $cart->addQuantiy($id,$durable,$quantity);
      $cart->updateAmountQuantity();
      $request->session()->put('cart',$cart);

      $durable->use=$request->use;
      $durable->save();

      return redirect('/durables/cart');
    }

    public function showCart(){
      $cart=Session::get('cart');
      //print_r($cart);
      if($cart){
          return view('process.showCart',['cartItems'=>$cart]);
      }else{
          return redirect('/home');
      }
    }

    public function deleteFormCart(Request $request,$id){ //ฟังก์ชันคืนอุปกรณ์ขณะยืม
        $cart=$request->session()->get('cart');
       
          // print_r($cart->items[$id]['quantity']);
          $itemid = $cart->items[$id]['data']['id'];
          $totalorders = $cart->items[$id]['quantity'];
          // print_r($itemid);
          // print_r($totalorders);
          $datause = DB::table('durables')
                  ->select('use')
                  ->where('id', $itemid)->get();
           $usetotal = $datause[0]->use;
           $total_all = $totalorders+$usetotal;
          $update = DB::table('durables')
                        ->where('id', $itemid)
                        ->update(['use' => $total_all]);

         //----------ยังไม่ใช้----------
        //  if(array_key_exists($id,$cart->items)){
        //   unset($cart->items[$id]);
        // }
        //----------ยังไม่ใช้----------

        if($update){
          unset($cart->items[$id]);
        }
        
        $afterCart=$request->session()->get('cart');
        $updateCart=new Cart($afterCart);
        $updateCart->updateAmountQuantity();
        $request->session()->put('cart',$updateCart);

        return redirect('/durables/cart');
    }

    public function createOrder(Request $request){

      $request->validate([
          'rdate'=>'required',
          'fname'=>'required',
          'lname'=>'required',
          'userID'=>'required',
          'phone'=>'required',
          'place'=>'required',
        ]);
      

      // $cart=Session::get('cart');
      // print_r($cart);
      // dd($cart);
     
      // $create_Otp=DB::table('otp')->insert($newOrder);
      $cart=Session::get('cart');
        $rdate=$request->rdate;
        $fname=$request->fname;
        $lname=$request->lname;
        $userID=$request->userID;
        $address=$request->address;
        $phone=$request->phone;
        $place=$request->place;
        $status= '1';
        $borrow= '4';
        
        $numberphone = Str::substr($phone, 1);
        $otp = rand(1000,9999);
            Nexmo::message()->send([
              'to' => '66'.$numberphone,
              'from' => '66901837418',
              'text' => 'OTP : '.$otp.' ',
          ]);
          Log::info('otp ='." ".$otp);
        if($cart){
            $date=date('Y-m-d H:i:s'); //d-m-Y H:i:s
            $newOrder=array("date"=>$date,
            "otp"=>$otp,
            "rdate"=>$rdate,
            "fname"=>$fname,
            "lname"=>$lname,
            "userID"=>$userID,
            "address"=>$address,
            "phone"=>$phone,
            "place"=>$place,
            "status"=>"1",
            "borrow"=>"4"
            );
            
            
            Session::put('variableName', $newOrder);
            $data = Session::get('variableName');
            //เก็บ session
            // print_r($data['fname']);
            // dd($dataa);
            
            

            $create_Order=DB::table('orders')->insert($newOrder);
              $order_id=DB::getPDO()->lastInsertId();

              foreach ($cart->items as $item) {
                $item_id=$item['data']['id'];
                $photo=$item['data']['photo'];
                $item_name=$item['data']['du_name'];
                $item_category=$item['data']['category']['category_name'];
  //              $item_brand=$item['data']['brand'];
  //              $item_gen=$item['data']['gen'];
                $item_amount=$item['quantity'];
                $newOrderItem=array(
                  "item_id"=>$item_id,
                  "order_id"=>$order_id,
                  "photo"=>$photo,
                  "item_name"=>$item_name,
                  "item_category"=>$item_category,
          //        "item_brand"=>$item_brand,
          //        "item_gen"=>$item_gen,
                  "item_amount"=>$item_amount
                );
                $newOrderItemLog=array(
                  "item_id"=>$item_id,
                  "item_name"=>$item_name,
                  "item_category"=>$item_category,
                  "item_amount"=>$item_amount
                );
                
                $create_orderItem=DB::table("orderitems")->insert($newOrderItem);
                $selectlog = DB::table('durablelog')->where('item_id', '=', $item_id)->first();
                // print_r($selectlog->total);
                if($selectlog == null){
                  DB::table('durablelog')->insert($newOrderItemLog);
                }else{
                  DB::table('durablelog')->where('item_id', $item_id)->update(['total' => DB::raw('total+1')]);
                }
                
            }
            
            return redirect()->route('otp')->with( ['newOrderItem' => $newOrderItem] );
            //return redirect('/orders/otp');
        

  //           $api_url = 'https://notify-api.line.me/api/notify';
            
  //           $params = array(
  //                   'message'        => 'รายการยืมครุภัณฑ์', //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
  //                   'order_id'        => $order_id,
  //                   'item_name'        => $item_name,
  //                    'name'         => $fname,
  //                    'lname'         => $lname,
  //                    'userID'         => $userID,
  //                    'address'         => $address,
  //                    'phone'         => $phone,
  //                    'place'         => $place,
  //                    'date'         => $date,
  //   );
  //           //print_r($cart);
  //           $json = null;
  //           //line ส่วนตัว : EUmOSV8uC8prPWpumXZpV5rNW1O0T3riYMsW5wCOzWC
  //           //line กลุ่ม Codelavel : CBhrL0GWdt3mG8XgMoFQMkKWvMZ1lxxUvhEWtZYUENL
  //               $headers = [
  //                   'Authorization: Bearer ' . 'EUmOSV8uC8prPWpumXZpV5rNW1O0T3riYMsW5wCOzWC'
  //               ];
  //               $fields = array(
  //                   'message' => $params['message']."\n"
  //                   ."ลำดับ : ".$params['order_id']."\n"
  //                   ."ชื่ออุปกรณ์ : ".$params['item_name']."\n"
  //                   ."ชื่อ-นามสกุล : ".$params['name'] ." ". $params['lname']."\n"
  //                   ."รหัสพนักงาน : ".$params['userID']."\n"
  //                   ."สังกัด : ".$params['address']."\n"
  //                   ."เบอร์โทร : ".$params['phone']."\n"
  //                   ."สถานที่นำไปใช้ : ".$params['place']."\n"
  //                   ."วันที่ส่งคืน : ".$params['date'],
  //                 );
                
  //                   $ch = curl_init();
                
  //                   curl_setopt($ch, CURLOPT_URL, $api_url);
  //                   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  //                   curl_setopt($ch, CURLOPT_POST, count($fields));
  //                   curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  //                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //                   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                
  //                   $res = curl_exec($ch);
  //                   curl_close($ch);
                
  //                   if ($res == false)
  //                       throw new Exception(curl_error($ch), curl_errno($ch));
                
  //                   $json = json_decode($res);

  //           Session::forget("cart");
  //           $order_info=$newOrder;
  //           $order_info["order_id"]=$order_id;
  //           $request->session()->put("order_info",$order_info);

  //           Session()->flash("success","บันทึกข้อมูลเรียบร้อยแล้ว โปรดรอการอนุมัติจากผู้ดูแล");
  //           return redirect('/orders');

  //         }else{
  //           return redirect('/durables');

        }
    }

    public function insertOrder(Request $request){

      $order_ids=$request->order_id;

      $order = array(
        'order_id' => $order_ids
      );
      
      // print_r($order);
      $otps=$request->otp;
        $otptable = DB::table('orders')->where('order_id', $order_ids)->first();

      $linetoken = DB::table('linetoken')->where('id', 1)->first();

       if($otptable->otp == $otps){
          DB::table('orders')
                        ->where('order_id', $order_ids)
                        ->update(['otp_status' => 1]);
        $api_url = 'https://notify-api.line.me/api/notify';
            
                  $params = array(
                          'message'        => 'รายการยืมครุภัณฑ์', //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                          'order_id'        => $order_ids,
                          'names'         =>$otptable->fname." ".$otptable->lname,
                          'address' =>$otptable->address,
                          'detail'        => 'ต้องการขอยืมครุภัณท์! (รอการอนุมัติ)',
          );
                  //print_r($cart);
                  $json = null;
                  //line ส่วนตัว : EUmOSV8uC8prPWpumXZpV5rNW1O0T3riYMsW5wCOzWC
                  //line กลุ่ม Codelavel : CBhrL0GWdt3mG8XgMoFQMkKWvMZ1lxxUvhEWtZYUENL
                      $headers = [
                          'Authorization: Bearer ' . $linetoken->token
                      ];
                      $fields = array(
                          'message' => $params['message']."\n"
                          ."รายการที่ : ".$params['order_id']."\n"
                          ."ชื่อ : ".$params['names']."\n"
                          ."สังกัด : ".$params['address']."\n"
                          ."รายละเอียด : ".$params['detail']."\n"
                        );
                      
                          $ch = curl_init();
                      
                          curl_setopt($ch, CURLOPT_URL, $api_url);
                          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                          curl_setopt($ch, CURLOPT_POST, count($fields));
                          curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                      
                          $res = curl_exec($ch);
                          curl_close($ch);
                      
                          if ($res == false)
                              throw new Exception(curl_error($ch), curl_errno($ch));
                      
                          $json = json_decode($res);

          Session::forget("cart");
          Session()->flash("success","บันทึกข้อมูลเรียบร้อยแล้ว โปรดรอการอนุมัติจากผู้ดูแล");
          return redirect('/orders');
       }else{
          return redirect()->back()->with( ['newOrderItem' => $order] );
      }
      
    }



    public function deleteFormDetail(Request $request,$id){ //ฟังก์ชันคืนอุปกรณ์ขณะยืม
      
        
        $datause = DB::table('orderitems')
                ->where('order_id', $id)->get();
                
         $itemid = $datause[0]->item_id; 
         $itemamount = $datause[0]->item_amount; 
        
        $durable = DB::table('durables')
                ->where('id', $itemid)->get();

        $useaccess = $durable[0]->use;
                
         $total_all = $useaccess+$itemamount;

        $update = DB::table('durables')
                      ->where('id', $itemid)
                      ->update(['use' => $total_all]);
        if($update){
            $test = DB::table('orderitems')
                      ->where('item_id', $itemid)->where('order_id', $id)
                      ->update(['item_status' => 1]);
                      
           
        }

       //----------ยังไม่ใช้----------
      //  if(array_key_exists($id,$cart->items)){
      //   unset($cart->items[$id]);
      // }
      //----------ยังไม่ใช้----------

  //     if($update){
  //       unset($cart->items[$id]);
  //     }
      
  //     $afterCart=$request->session()->get('cart');
  //     $updateCart=new Cart($afterCart);
  //     $updateCart->updateAmountQuantity();
  //     $request->session()->put('cart',$updateCart);

  //     return redirect('/durables/cart');
  }
    

}

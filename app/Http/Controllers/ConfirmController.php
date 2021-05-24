<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class ConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $orders = \App\Order::findOrFail($id);
        $orders->status = $request->input('status');
        $orders->comment = $request->input('comment');
        $orders->save();
        
        DB::table('orderitems')
                        ->where('order_id', $id)
                        ->update(['success' => 1]);

        if($orders->status == 2){
            
            $params = array(
                    'id' => $id,
                    'message' => 'ได้รับการอนุมัติยืมครุภัณฑ์แล้ว', //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                    'status'  => $orders->status, 
                    'names'  => $orders->fname." ".$orders->lname, 
                    'address' => $orders->address,
                    'comment' => $orders->comment,
    );
        }else if($orders->status == 3){
            
            $params = array(
                    'id' => $id,
                    'message' => 'ไม่อนุมัติการยืมครุภัณฑ์', //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                    'status'  => $orders->status,
                    'names'  => $orders->fname." ".$orders->lname, 
                    'address' => $orders->address, 
                    'comment' => $orders->comment,
                );
        }
        $linetoken = DB::table('linetoken')->where('id', 1)->first();
        
            $api_url = 'https://notify-api.line.me/api/notify';
            $json = null;
            //line ส่วนตัว : EUmOSV8uC8prPWpumXZpV5rNW1O0T3riYMsW5wCOzWC
            //line กลุ่ม Codelavel : CBhrL0GWdt3mG8XgMoFQMkKWvMZ1lxxUvhEWtZYUENL
                $headers = [
                    'Authorization: Bearer ' . $linetoken->token
                ];
                $fields = array(
                    'message' => "ลำดับ : ".$params['id']."\n"
                    ."ชื่อ : ".$params['names']."\n"
                    ."สังกัด : ".$params['address']."\n"
                    ."การอนุมัติ : ".$params['message']."\n"
                    ."ความคิดเห็น : ".$params['comment'],
                  );
                
                //try {
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

        
        return redirect('orders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

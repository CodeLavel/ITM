<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
            //print_r($request);
            $users_add = array(
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            );
            

            User::create($users_add);


            // $data = $request->getData();
            
            //User::create($data);

            return redirect()->route('users.index')->with('success','เพิ่มข้อมูลสำเร็จ');
        // } catch (Exception $exception) {

            // return back()->withInput()
            //     ->with(['success_message' => 'บันทึกข้อมูลเรียบร้อยแล้ว.']);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $api_url = 'https://notify-api.line.me/api/notify';

        $params = array(
                "message"        => "รายการยืมครุภัณฑ์", //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                 "name"         => "A",
                 "userID"         => "400068",
                 "phone"         => "0901837418",
                //  "lname"         => $lname,
);
        $json = null;
        //line ส่วนตัว : EUmOSV8uC8prPWpumXZpV5rNW1O0T3riYMsW5wCOzWC
        //line กลุ่ม Codelavel : CBhrL0GWdt3mG8XgMoFQMkKWvMZ1lxxUvhEWtZYUENL
            $headers = [
                'Authorization: Bearer ' . 'EUmOSV8uC8prPWpumXZpV5rNW1O0T3riYMsW5wCOzWC'
            ];
            $fields = array(
                'message' => $params["message"]."\n"."ชื่อ-นามสกุล : ".$params["name"]."\n"."รหัสพนักงาน : ".$params["userID"]."\n"."เบอร์โทร : ".$params["phone"],
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
        
                //$status = $json->status;
            
                //var_dump($status);
            // } catch (Exception $e) {
            //     throw new Exception($e->getMessage);
            //}
        
        // return $this->render('notify', [
        //     'model' => $model,
        //     'json' => $json
        // ]);
        
        // return "This is show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return "This is edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        return "This is update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        
        //print_r($user);
        $users->delete();
        return redirect()->route('users.index')->with('success','ลบข้อมูลสำเร็จ');
    }
}

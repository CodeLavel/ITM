<?php

namespace App\Http\Controllers;

use App\Models\Otp as Model;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Ichtrojan\Otp\Models\Otp as ModelsOtp;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;




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
            $request->validate(
                [
                    'username'=>'required|unique:users|max:255',
                    'names'=>'required|unique:users|max:255',
                    'email'=>'required|unique:users|max:255',
                    'position'=>'required|max:255',
                ],
                [
                    'username.unique' => 'มีข้อมูลซ้ำกัน กรุณาเปลี่ยนชื่อผู้ใช้งานใหม่',
                    'names.unique' => 'มีข้อมูลซ้ำกัน กรุณาเปลี่ยนชื่อ-นามสกุลใหม่',
                    'email.unique' => 'มีข้อมูลซ้ำกัน กรุณาเปลี่ยนอีเมล์ใหม่',
                    'position.required' => 'โปรดระบุ ตำแหน่ง.',
                ]
                );
            $users_add = array(
                'username' => $request->username,
                'names' => $request->names,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'position' => $request->position,
            );
            
            
             User::create($users_add);

            return redirect()->route('users.index')->with('success','เพิ่มข้อมูลสำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $otp = rand(1000,9999);
        Log::info('otp =' . $otp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        return view('users.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
     
        $update = DB::table('users')->where('id', $id)->update(
            [
                'username' => $request->username,
                'email' => $request->email,
                'names' => $request->names,
            ]
        );
      
        if($update){
            return redirect()->route('users.index')->with('success','อัพเดทข้อมูลสำเร็จ');
        }else{
            return redirect()->route('users.index')->with('error','อัพเดทข้อมูลไม่สำเร็จ');
        }
        
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

        $users->delete();
        return redirect()->route('users.index')->with('success','ลบข้อมูลสำเร็จ');
    }


}

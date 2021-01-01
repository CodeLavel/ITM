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
        $otp = rand(1000,9999);
        Log::info('otp =' . $otp);
        // $user - User::where('mobile','=', $user->mobile)->update(['otp' => $otp]);
        print_r($otp);

        // return response()->json([$user], 200);
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

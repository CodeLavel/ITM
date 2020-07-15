<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return redirect('orders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

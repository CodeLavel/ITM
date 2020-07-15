<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function update(Request $request, $id)
  {

      $orders = \App\Order::findOrFail($id);
      $orders->borrow = $request->input('borrow');
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

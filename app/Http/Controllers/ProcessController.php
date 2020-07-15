<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Durable;
use App\Cart;

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

      if($cart){
          return view('process.showCart',['cartItems'=>$cart]);
      }else{
          return redirect('/home');
      }
    }

    public function deleteFormCart(Request $request,$id){
        $cart=$request->session()->get('cart');
        if(array_key_exists($id,$cart->items)){
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
        if($cart){
            $date=date("Y-m-d H:i:s");
            $newOrder=array("date"=>$date,
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
                $create_orderItem=DB::table("orderitems")->insert($newOrderItem);
            }
            Session::forget("cart");
            $order_info=$newOrder;
            $order_info["order_id"]=$order_id;
            $request->session()->put("order_info",$order_info);

            Session()->flash("success","บันทึกข้อมูลเรียบร้อยแล้ว โปรดรอการอนุมัติจากผู้ดูแล");
            return redirect('/orders');

          }else{
            return redirect('/durables');

        }
    }

}

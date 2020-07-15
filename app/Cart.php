<?php
namespace App;
use Illuminate\Support\Facades\DB;

class Cart{
  public $items;//Array
  public $totalQuantity;//จำนวนครุภัณฑ์ในตะกร้า

  public function __construct($prevCart){

    if($prevCart!=null){
      $this->items=$prevCart->items;
      $this->totalQuantity=$prevCart->totalQuantity;
    }else{
      $this->items=[];
      $this->totalQuantity=0;
    }

  }

  public function addQuantiy($id,$durable,$amount){

    if($amount>0){
      if(array_key_exists($id,$this->items)){
        $durableToAdd=$this->items[$id];
        $durableToAdd['quantity']+=$amount;

      }else{
        $durableToAdd=['quantity'=>$amount,'data'=>$durable];
      }
    }

    $this->items[$id]=$durableToAdd;
    $this->totalQuantity+=$amount;
  }

  public function updateAmountQuantity(){
      $totalQuantity=0;
      foreach ($this->items as $item) {
          $totalQuantity=$totalQuantity+$item['quantity'];
      }
      $this->totalQuantity=$totalQuantity;

  }

}
 ?>

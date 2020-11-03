<?php

namespace frontend\models;
use frontend\components\LanguageModel;

class BookCart extends LanguageModel
{

	public function addToCart($bookProduct, $qty = 1)
	{
      if(isset($_SESSION['bookCart'][$bookProduct->id])){
         $_SESSION['bookCart'][$bookProduct->id]['qty'] += $qty;
      }else{
         $_SESSION['bookCart'][$bookProduct->id] = [
            'qty' => $qty,
            'name' => $bookProduct->Name,
            'price' => $bookProduct->price, 
            'img' => $bookProduct->img, 
         ];
      }
      $_SESSION['bookCart.qty'] = isset($_SESSION['bookCart.qty']) ? $_SESSION['bookCart.qty'] + $qty : $qty;
      $_SESSION['bookCart.sum'] = isset($_SESSION['bookCart.sum']) ? $_SESSION['bookCart.sum'] + $qty * $bookProduct->price : $qty * $bookProduct->price;     
   }

   public function recalc($id){
      if(!isset($_SESSION['bookCart'][$id])) return false;
      $qtyMinus = $_SESSION['bookCart'][$id]['qty'];
      $sumMinus = $_SESSION['bookCart'][$id]['qty'] * $_SESSION['bookCart'][$id]['price'];
      $_SESSION['bookCart.qty'] -= $qtyMinus;
      $_SESSION['bookCart.sum'] -= $sumMinus;

      unset($_SESSION['bookCart'][$id]);
   }
}
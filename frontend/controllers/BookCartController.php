<?php

namespace frontend\controllers;
use frontend\models\BookProduct;
use frontend\models\BookCart;
use frontend\models\BookOrder;
use frontend\models\BookOrderItems;
use yii\helpers\Url;
use Yii;

class BookCartController extends BehaviorsController
{
	public function actionAdd()
	{
        $this->layout ='\mainBook';
		$id = Yii::$app->request->get('id');
		$qty = (int)Yii::$app->request->get('qty');
		$qty = !$qty ? 1 : $qty;
		$bookProduct = BookProduct::findOne($id);
		if(empty($bookProduct)) return false;
		$session = Yii::$app->session;
		$session->open();
		$bookCart = new BookCart();
		$bookCart->addToCart($bookProduct, $qty);
		if(!Yii::$app->request->isAjax ){
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this->layout = false; 
		return $this->render('cart-modal', compact('session'));	
	}

	public function actionClear()
	{
        $this->layout ='\mainBook';
		$session = Yii::$app->session;
		$session->open();
		$session->remove('bookCart');
		$session->remove('bookCart.qty');
		$session->remove('bookCart.sum');
		$this->layout = false; 
		return $this->render('cart-modal', compact('session'));	
	}

	public function actionDelItem()
	{
        $this->layout ='\mainBook';
		$id = Yii::$app->request->get('id');
		$session = Yii::$app->session;
		$session->open();
		$bookCart = new BookCart();
		$bookCart->recalc($id);
		$this->layout = false; 
		return $this->render('cart-modal', compact('session'));	
	}

	public function actionShow()
	{
        $this->layout ='\mainBook';
		$session = Yii::$app->session;
		$session->open();
		$this->layout = false; 
		return $this->render('cart-modal', compact('session'));	
	}

	public function actionView()
	{
        $this->layout ='\mainBook';
		$session = Yii::$app->session;
		$session->open();
		$this->setMeta(Yii::t('yii','Xaridni rasmiylashtirish'));
		$bookOrder = new BookOrder();
		if($bookOrder->load(Yii::$app->request->post())){
			$bookOrder->qty = $session['bookCart.qty'];
			$bookOrder->sum = $session['bookCart.sum'];
			if($bookOrder->save()){
				$this->saveBookOrderItems($session['bookCart'], $bookOrder->id);
				Yii::$app->session->setFlash('success', 'Sizning buyurtmangiz qabul qilindi. Tez orada menejer siz bilan bog\'lanadi.');
				$session->remove('bookCart');
				$session->remove('bookCart.qty');
				$session->remove('bookCart.sum');
				// return $this->refresh();
                return $this->redirect(['book-category/index']);
			}else{
				Yii::$app->session->setFlash('error', 'Buyurtmani yuklashda xato');
			}
		}
		return $this->render('view', compact('session', 'bookOrder'));
	}

	protected function saveBookOrderItems($items, $book_order_id)
	{
		foreach($items as $id => $item)
		{
			$book_order_items = new BookOrderItems();
			$book_order_items->book_order_id = $book_order_id;
			$book_order_items->book_product_id = $id;	
			$book_order_items->name = $item['name'];	
			$book_order_items->price = $item['price'];	
			$book_order_items->qty_item = $item['qty'];	
			$book_order_items->sum_item = $item['qty'] *  $item['price'];
			$book_order_items->save();	
		}
	}
}
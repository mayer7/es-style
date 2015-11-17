<?php

class AjaxController extends Controller
{

    public function actionGetEmail(){
//        echo json_encode(Yii::app()->params['email']);
        echo Yii::app()->params['email'];
        Yii::app()->end();
    }

    public function actionDeleteItemFromCart(){
        $cartItem = CartItem::model()->findByPk($_POST['item_id']);
        if($cartItem){
            $cartItem->delete();
            $this->renderPartial('../site/cart/_cart_total',array('model'=>$cartItem->cart));
        } else {
            echo false;
            Yii::app()->end();
        }
    }

    public function actionAddToCart(){
        $cart = null;
        if(Yii::app()->user->isGuest && !empty(Yii::app()->session['cartId']))
            $cart = Cart::model()->findByPk(Yii::app()->session['cartId']);
        elseif (!Yii::app()->user->isGuest)
            $cart = Cart::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));

        if($cart) {
            $cartItem = $cart->findAndAddCartItem($_POST);
            if ($cartItem)
                $this->renderPartial('../site/cart/_cart_popup', array('cartItem'=>$cartItem));
            else  return false;
            Yii::app()->end();
        } else {
            $cart = new Cart;
            if(!Yii::app()->user->isGuest)
                $cart->user_id = Yii::app()->user->id;
            if($cart->save()) {
                if(Yii::app()->user->isGuest)
                    Yii::app()->session['cartId'] = $cart->id;
                $cartItem = $cart->addCartItem($_POST);
                $this->renderPartial('../site/cart/_cart_popup', array('cartItem'=>$cartItem));
            } else return false;
            Yii::app()->end();
        }
    }

    public function actionChangeCount(){
        $cartItem = CartItem::model()->findByPk($_POST['item_id']);
        if($cartItem){
            if ($_POST['action_name'] == 'increase')
                $cartItem->count++;
            elseif ($_POST['action_name'] == 'decrease')
                $cartItem->count--;
            if ($cartItem->save())
                echo $cartItem->count;
            else
                echo 0;
            Yii::app()->end();
        } else {
            echo 0;
            Yii::app()->end();
        }
    }
}
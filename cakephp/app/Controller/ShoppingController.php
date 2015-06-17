<?php

APP::uses('AppController', 'Controller');

class ShoppingController extends AppController{

	// ログインページ-------------------------------------------------------------
	public function login(){

	}

	// ログイン処理
	public function run_login(){
		$this->redirect('shop');
	}

	// ログアウト処理
	public function run_logout(){
		$this->redirect('login');
	}

	// ショップページ--------------------------------------------------------------
	public function shop(){

	}

	// ショップ検索
	public function search_shop(){
		$this->render('shop');
	}

	// 商品ページ----------------------------------------------------------------
	public function item(){

	}

	// カートに商品入れる処理
	public function add_cart(){
		$this->redirect('cart');
	}

	// カートの商品購入ページ------------------------------------------------------
	public function cart(){

	}

	//購入処理
	public function buy_items(){
		$this->redirect('shop');
	}
}
?>

<?php

APP::uses('AppController', 'Controller');

class ShoppingController extends AppController{

	// ログインページ-------------------------------------------------------------
	public function login(){
		// セッションチェック
		$logged_in_id = CakeSession::read('account_id');
		$logged_in_pass = CakeSession::read('account_name');

		if (isset($logged_in_id) && isset($logged_in_pass)) {
			$this->redirect('shop');
		}

		if (isset($this->request->query)) {
			$res = $this->request->query;
			if ($res == null) {

			}elseif ($res['login'] == 'failed') {
				// ログイン失敗時
				$this->set('msg', 'ログインに失敗しました。');
			}elseif ($res['login'] == 'logout') {
				// ログアウト時
				$this->set('msg', 'ログアウトしました。');
			}
		}
	}

	// ログイン処理
	public function run_login(){
		// モデルロード
		$this->loadModel('account_tbs');
		// POSTデータ取得
		$login_data = $this->request->data;

		// ログインデータをＤＢと比較
		$where = array(
			'conditions' => array('id' => $login_data['login_id'],
			'pass' => $login_data['login_pass'])
		);
		$res = $this->account_tbs->find('first',$where);
		// ログインチェック
		if (count($res) > 0) {
			// ログイン成功
			// セッション保存
			CakeSession::write('account_id', $res['account_tbs']['id']);
			CakeSession::write('account_name', $res['account_tbs']['name']);
			$this->redirect('shop');
		}else {
			// ログイン失敗
			$this->redirect('login?login=failed');
		}
	}

	// ログアウト処理
	public function run_logout(){
		CakeSession::delete('account_id');
		CakeSession::delete('account_name');
		CakeSession::delete('in_cart');
		$this->redirect('login?login=logout');
	}

	// ショップページ--------------------------------------------------------------
	public function shop(){
		//セッションチェック
		$logged_in_id = CakeSession::read('account_id');
		$logged_in_pass = CakeSession::read('account_name');

		if (isset($logged_in_id) && isset($logged_in_pass)) {

		}else {
			$this->redirect('login');
		}

		if (isset($this->request->query)) {
			$res = $this->request->query;
			if ($res == null) {
				//通常時　何も処理しない。
			}elseif ($res['order'] == 'completed') {
				// 購入完了から飛んできたとき
				$this->set('msg', '購入完了');
			}
		}

		// モデルロード
		$this->loadModel('item_tbs');
		$this->loadModel('category_tbs');

		//カテゴリー一覧取得
		$res = $this->category_tbs->find('all');
		$this->set('categories', $res);

		// 商品一覧取得
		$sql = "
			SELECT
				item_tbs.id AS item_id,
				item_tbs.name AS item_name,
				category_tbs.name AS category_name
			FROM
				item_tbs
			LEFT JOIN
				category_tbs
			ON
				item_tbs.category_id = category_tbs.id
			";
		$res = $this->item_tbs->query($sql);
		$this->set('items', $res);
	}

	// ショップ検索
	public function search_shop(){
		//POSTデータ取得
		$search_data = $this->request->data;

		//モデルロード
		$this->loadModel('item_tbs');
		$this->loadModel('category_tbs');

		//カテゴリー一覧取得
		$res = $this->category_tbs->find('all');
		$this->set('categories', $res);

		//検索処理
		$sql = "
			SELECT
				item_tbs.id AS item_id,
				item_tbs.name AS item_name,
				category_tbs.name AS category_name
			FROM
				item_tbs
			LEFT JOIN
				stock_tbs
			ON
				stock_tbs.item_id = item_tbs.id
			LEFT JOIN
				category_tbs
			ON
				item_tbs.category_id = category_tbs.id
			";

		// WHERE文をくっつける
		// カテゴリ選択
		if ($search_data['category_select'] == 'all') {
			// 全ての場合
			$mode_where = 0;

		}else {
			$mode_where = 1;
			$sql .= "
				WHERE
					category_tbs.name = '".$search_data['category_select']."'
				";
		}
		//在庫有り無\\
		if ($search_data['stock'] == 'yes') {
			if ($mode_where == 0) {
				$sql .= "WHERE";
			}else {
				$sql .= ",";
			}
			$sql .= "
				stock_tbs.number > 0
				";
		} else {

		}

		$res = $this->item_tbs->query($sql);
		$this->set('items', $res);

		$this->render('shop');
	}

	// 商品ページ----------------------------------------------------------------
	public function item(){
		//セッションチェック
		$logged_in_id = CakeSession::read('account_id');
		$logged_in_pass = CakeSession::read('account_name');

		if (isset($logged_in_id) && isset($logged_in_pass)) {

		}else {
			$this->redirect('login');
		}


		// モデルロード
		$this->loadModel('item_tbs');

		// 商品情報取得
		$item_id = $this->request->query;

		// GETがなかったらshoppingに飛ばす
		if ($item_id == null) {
			$this->redirect('shop');
		}

		$sql = "
				SELECT
					item_tbs.id AS item_id,
					item_tbs.name AS item_name,
					item_tbs.price AS item_price,
					item_tbs.text AS item_text,
					stock_tbs.number AS item_stock
				FROM
					item_tbs
				LEFT JOIN
					stock_tbs
				ON
					stock_tbs.item_id = item_tbs.id
				WHERE
					item_tbs.id = ".$item_id['item']."
				";
		$res = $this->item_tbs->query($sql);
		$this->set('item_info', $res[0]);
	}

	// カートに商品入れる処理
	public function add_cart(){

		//POSTデータ取得
		$add_cart_info = $this->request->data;

		// カートに入れる個数が０ならセッションに入れない
		if ($add_cart_info['add_cart_number'] != 0) {

			//カートの中身を呼び、配列に追加
			$in_cart = CakeSession::read('in_cart');
			if($in_cart === null){
				$in_cart = array();
			}
			if (isset($in_cart[$add_cart_info['add_cart_id']])) {
				// すでにカートに入ってる商品は個数を足し算
				$in_cart[$add_cart_info['add_cart_id']]['number'] = $in_cart[$add_cart_info['add_cart_id']]['number'] + $add_cart_info['add_cart_number'];
			}else {
				// カートに入ってない商品は配列に新しく入れる
				$in_cart[$add_cart_info['add_cart_id']] = array(
					'item_id' => $add_cart_info['add_cart_id'],
					'item_name' => $add_cart_info['add_cart_name'],
					'item_price' => $add_cart_info['add_cart_price'],
					'number' => $add_cart_info['add_cart_number']
				);
			}

			CakeSession::write('in_cart', $in_cart);
		}

		$this->redirect('cart');

	}

	// カートの商品削除処理
	public function delete_cart(){
		$delete_info = $this->request->data;
		CakeSession::delete('in_cart.'.$delete_info['delete_item']);

		$this->redirect('cart');
	}

	// カートの商品購入ページ------------------------------------------------------
	public function cart(){
		//セッションチェック
		$logged_in_id = CakeSession::read('account_id');
		$logged_in_pass = CakeSession::read('account_name');

		if (isset($logged_in_id) && isset($logged_in_pass)) {

		}else {
			$this->redirect('login');
		}

		//カートの中身取得
		$in_cart = CakeSession::read('in_cart');
		$this->set('in_cart', $in_cart);

	}

	//購入処理
	public function buy_items(){

		$order_account = CakeSession::read('account_id');
		$order_items = CakeSession::read('in_cart');

		// オーダーの合計金額を出す
		$order_price = 0;
		foreach ($order_items as $order_item) {
			$order_price += $order_item['item_price'] * $order_item['number'];
		}

		$this->loadModel('account_tbs');
		$this->loadModel('stock_tbs');
		$this->loadModel('history_tbs');

		// 在庫の数＞オーダーの数
		foreach ($order_items as $order_item) {
			// 在庫の数取得
			$where = array(
					'conditions' => array('id' => $order_item['item_id'])
					);
			$res = $this->stock_tbs->find('all', $where);
			if ($res[0]['stock_tbs']['number'] >= $order_item['number']) {
				// 在庫の数減らす
				$sql1[] = "
					UPDATE
						stock_tbs
					SET
						stock_tbs.number = stock_tbs.number - ".$order_item['number']."
					WHERE
						stock_tbs.item_id = ".$order_item['item_id']."
				";

			}else {
			 	$msg[] = "
					在庫の数が足りません
					現在の在庫：".$res[0]['stock_tbs']['number']."
					購入個数：".$order_item['number']."
					";
			}
		}
		// ユーザー残金＞オーダー合計金額
		// ユーザー残金取得
		$where = array(
				'conditions' => array('id' => $order_account)
				);
		$res = $this->account_tbs->find('all',$where);

		if ($res[0]['account_tbs']['money'] >= $order_price) {
			// アカウントの残金減らす
			$sql2 ="
				UPDATE
					account_tbs
				SET
					account_tbs.money = account_tbs.money - ".$order_price."
				WHERE
					account_tbs.id = ".$order_account."
			";

		}else {
			$msg[] = "
				残金が足りません
				現在残金：".$res[0]['account_tbs']['money']."
				購入合計金額：".$order_price."
				";
		}

		if (isset($sql1) && isset($sql2)) {
			foreach ($sql1 as $sql) {
				$this->stock_tbs->query($sql);
			}
			$this->account_tbs->query($sql2);
			// ヒストリーにいれる
			foreach ($order_items as $order_item) {
				$sql = "
					INSERT INTO
						history_tbs
						(number, date, account_id, item_id)
					VALUES
						(".$order_item['number'].", NOW(), ".$order_account.", ".$order_item['item_id'].")
				";

				$this->history_tbs->query($sql);
			}
			// カートの中身を消す
			CakeSession::delete('in_cart');
			$this->redirect('shop?order=completed');
		}else {
			$this->set('msg', $msg);
			$this->render('order_failed');
		}
	}
}
?>

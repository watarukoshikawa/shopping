<?php

APP::uses('AppController', 'Controller');

class StockController extends AppController{

	public function index(){
		$this->loadModel('item_tb');
		$this->loadModel('stock_tb');
		$sql = "
				SELECT 
					item_tbs.id, 
					item_tbs.name, 
					stock_tbs.number 
				FROM 
					item_tbs 
				INNER JOIN 
					stock_tbs 
				ON
					item_tbs.id = stock_tbs.item_id
		";
		$this->set('table_data',$this->item_tb->query($sql));
		$this->render('stock');
		
	}

	public function run_regist(){
		echo "<pre>";
		var_dump($this->request->data);
		echo "</pre>";
		exit;
		/*
			POSTで入ってくる値を配列にし
			item_tbs.idとstock_tbs_item_id
			を関連つけられるように渡してあるので
			それを考慮しupdate文を発行

			DBへの接続回数を気にするか考慮が必要
		*/
	}
}
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
		$this->loadModel('stock_tb');
		foreach ($this->request->data as $data) {
			if(isset($data['number']) && $data['number'] != ""){

				$sqls[] =	"
						UPDATE
							stock_tbs
						SET
							stock_tbs.number = ".$data['number']."
						WHERE
							stock_tbs.item_id = ".$data['item_id'];
			}else{
				$err = "空白の項目があります";
			}
		}
		if(isset($err)){
			$this->set('msg',$err);
			$this->index();
		}else{
			foreach ($sqls as $sql ) {
				$this->stock_tb->query($sql);
				$this->set('msg',"変更しました");
			}
			$this->index();
		}

		
	}
}
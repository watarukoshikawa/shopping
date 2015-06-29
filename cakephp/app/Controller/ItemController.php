<?php

APP::uses('AppController', 'Controller');
App::uses('File', 'Utility');

class ItemController extends AppController{

	public function index(){
		$this->loadModel('item_tb');
		$this->set('table_data', $this->item_tb->find('all'));
		$this->render('item');
	}

	public function show_regist(){
		$this->loadModel('category_tb');
		$data = $this->category_tb->find('all',array('fields' => array('category_tb.name', 'category_tb.id')));
		$this->set('select',$data);
		$this->render('regist');

	}

	public function run_regist(){
		//item_tbs への登録
		$this->loadModel('item_tb');
		if( move_uploaded_file( $this->data['file']['tmp_name'], IMAGES.$this->data['file']['name']) ){
			
			$insert = 	array(
							'name' => $this->request->data['name'],
							'date' => date('Y-m-d H:i:s'),
							'text' => $this->request->data['text'],
							'img' => $this->request->data['file']['name'],
							'price' => $this->request->data['price'],
							'category_id' => $this->request->data['category_id']
						);
			$this->item_tb->set($insert);

			$this->item_tb->save();

			//stock_tbs への登録
			$this->loadModel('stock_tb');
			$insert =	array(
							'number' => 0,
							'item_id' => $this->item_tb->getLastInsertID(),
							'date' => date('Y-m-d H:i:s')
						);
			$this->stock_tb->set($insert);	
			$this->stock_tb->save();

			$this->set('msg', $this->request->data['name']."を登録しました");

			$this->index();
		} else {
		    $this->set('msg', "登録に失敗しました");
		    $this->index();
		}
	}

	public function update(){
		$this->loadModel('item_tb');
		$this->set('update_data', $this->item_tb->find('first',array('conditions' => array('item_tb.id' => $this->request->query['update']))));
		$this->loadModel('category_tb');
		$data = $this->category_tb->find('all',array('fields' => array('category_tb.name', 'category_tb.id')));
		$this->set('select',$data);
		$this->render('regist');

	}

	public function run_delete(){
		$this->loadModel('item_tb');
		$this->item_tb->delete($this->request->data('delete_id'));
		$this->set('msg',$this->request->data['delete_name'] ."を削除しました");

		$this->index();

	}
}
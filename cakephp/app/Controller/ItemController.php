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
		$flg = true;
		if($this->request->data['name'] != "" && $this->request->data['price'] != ""){
			$insert = 	array(
							'name' => $this->request->data['name'],
							'date' => date('Y-m-d H:i:s'),
							'text' => $this->request->data['text'],
							'price' => $this->request->data['price'],
							'category_id' => $this->request->data['category_id']
						);
			if( move_uploaded_file( $this->data['file']['tmp_name'], IMAGES.$this->data['file']['name']) ){
				
				$insert = $insert + array('img' => $this->request->data['file']['name']);

			}
		
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
		}else{
			$this->set('msg',"空欄があります");
			$this->show_regist();
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

	public function run_update(){

		$this->loadModel('item_tb');
		$data = array(	'id' => $this->data['item_id'],
						'name' => $this->data['name'],
						'text' => $this->data['text'],
						'date' => date('Y-m-d H:i:s'),
						'category_id' => $this->data['category_id'],
						'price' => $this->data['price']
			);
		if($this->data['file']['name'] != ""){
			if( move_uploaded_file( $this->data['file']['tmp_name'], IMAGES.$this->data['file']['name']) ){

				$data = $data + array('img' => $this->data['file']['name'] );
			}else{
				$this->set('msg',"画像の変更に失敗しました");
			}
		}
		var_dump($data);

		$this->item_tb->save($data);

		$this->index();

	}








}
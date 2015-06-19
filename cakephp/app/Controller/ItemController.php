<?php

APP::uses('AppController', 'Controller');

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
		$this->loadModel('item_tb');
		$insert = 	array(
						'name' => $this->request->data['name'],
						'date' => date('Y-m-d H:i:s'),
						'text' => $this->request->data['text'],
						'price' => $this->request->data['price'],
						'category_id' => $this->request->data['category_id']
					);
		$this->item_tb->set($insert);
		$this->item_tb->save();

		$this->set('msg', $this->request->data['name']."を登録しました");

		$this->index();
	}

	public function update(){
		$this->loadModel('item_tb');
		$this->set('update_data', $this->item_tb->find('first',array('conditions' => array('item_tb.id' => $this->request->query['update']))));
		$this->loadModel('category_tb');
		$data = $this->category_tb->find('all',array('fields' => array('category_tb.name', 'category_tb.id')));
		$this->set('select',$data);
		$this->render('regist');

	}
}
<?php

APP::uses('AppController', 'Controller');

class CategoryController extends AppController{

	//レンダリング用関数
	//処理後は必ず呼び出す
	public function index(){
		$this->loadModel('category_tb');
		$this->set('table_data' ,$this->category_tb->find('all'));
		$this->render('category');
		
	}

	//登録用関数
	public function run_regist(){
		$this->loadModel('category_tb');
		$data = array(
					'name' => $this->request->data['category_name'],
					'date' => date("Y-m-d H:i:s")
				 );
		$this->category_tb->set($data);
		$this->category_tb->save();

		$this->index();

	}

	//削除用関数
	//削除する範囲はどこまで？
	public function run_delete(){
		$this->loadModel('category_tb');
		$where = $this->request->data['delete_id'];
		$this->category_tb->delete($where);

		$this->index();

	}
}
<?php

APP::uses('AppController', 'Controller');

class UserController extends AppController{

	public function index(){
		$this->loadModel('account_tb');
		$this->set('table_data',$this->account_tb->find('all'));
		$this->render('user');
		
	}

	public function show_regist(){
		$this->render('regist');
	}

	public function run_regist(){
		$this->loadModel('account_tb');
		if ($this->account_tb->find('first',array('conditions' => array('account_tb.id' => $this->request->data['regist_id'])))) {
			$this->set('msg',"登録済みのIDです");
			$this->show_regist();
		}else{
			$data =	array(
						'id' => $this->request->data['regist_id'] ,
						'name' => $this->request->data['regist_name'] ,
						'pass' => $this->request->data['regist_pass'] ,
					);
			$this->account_tb->set($data);
			$this->account_tb->save();

			$this->set('msg',$this->request->data['regist_name']."を登録しました");
			$this->index();
		}
	}

	public function run_delete(){
		$this->loadModel('account_tb');
		var_dump($this->request->data);
		$this->account_tb->delete($this->request->data['delete_id']);
		$this->set('msg',$this->request->data['delete_name']."を削除しました");
		$this->index();
	}

	public function show_history(){
		$this->loadModel('history_tb');

		$sql = "
				SELECT 
					history_tbs.date, 
					item_tbs.name, 
					history_tbs.number, 
					item_tbs.price 
				FROM 
					history_tbs 
				INNER JOIN
					item_tbs
				ON
					history_tbs.item_id = item_tbs.id 
				WHERE 
					history_tbs.account_id = ".$this->request->data['history_id']."
				ORDER BY
					history_tbs.date
				DESC
		";
		$this->set('table_data', $this->history_tb->query($sql));
		$this->set('select_id',$this->request->data['history_id']);
		$this->render('history');
	}

	public function run_select(){
		$this->loadModel('history_tb');
		$sql = "
				SELECT 
					history_tbs.date, 
					item_tbs.name, 
					history_tbs.number, 
					item_tbs.price 
				FROM 
					history_tbs 
				INNER JOIN
					item_tbs
				ON
					history_tbs.item_id = item_tbs.id 
				WHERE 
					history_tbs.account_id = ".$this->request->data['select_id'];


		if (isset($this->request->data['select_from']) && isset($this->request->data['select_to'])) {
			
			if ($this->request->data['select_from'] != "" && $this->request->data['select_to'] != "") {
				$sql .= "
					AND 
						history_tbs.date
					BETWEEN
						'".$this->request->data['select_from']."'
					AND
						'".$this->request->data['select_to']."'
					ORDER BY
						history_tbs.date
					DESC
					";
			}else{

				if ($this->request->data['select_from'] != "") {
					$sql .="
						AND
							history_tbs.date >= '".$this->request->data['select_from']."'
						ORDER BY
							history_tbs.date
						DESC
					";
				}elseif ($this->request->data['select_to'] != "") {
					$sql .="
						AND
							history_tbs.date <= '".$this->request->data['select_to']."'
						ORDER BY
							history_tbs.date
						DESC
					";

				}else{
					$sql .= "
						ORDER BY
							history_tbs.date
						DESC					
					";
				}
			}
			$this->set('table_data', $this->history_tb->query($sql));
			$this->set('select_id',$this->request->data['select_id']);
			$this->render('history');

		}else{
			$this->show_history();
		}
	}
};









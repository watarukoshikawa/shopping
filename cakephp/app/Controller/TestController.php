<?php

APP::uses('AppController', 'Controller');
App::uses('File', 'Utility');

class TestController extends AppController{

		public function index(){
			$this->render('test');
		}

		public function run(){
			var_dump($this->data);
			if( move_uploaded_file( $this->data['file']['tmp_name'], IMAGES.$this->data['file']['name']) ){
				$this->redirect('index');
			} else {
			    echo 'move srr';
			    exit;
			}
			
		}
}
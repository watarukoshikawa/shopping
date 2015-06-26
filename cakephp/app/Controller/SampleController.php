<?php

APP::uses('AppController', 'Controller');
App::uses('File', 'Utility');

class SampleController extends AppController{

	public function index(){
	}

	public function upload(){
		var_dump($this->data);
	    if( move_uploaded_file( $this->data['File']['tmp_name'], IMAGES.$this->data['File']['name']) ){
	    	$this->redirect('index');
	    } else {
	        echo 'move srr';
	        exit;
	    }

	    
	}

}
<?php

APP::uses('AppController', 'Controller');
App::uses('File', 'Utility');

class SampleController extends AppController{

	public function index(){
		$this->render('index');
	}

	public function upload(){
		var_dump($this->data);
	    if( move_uploaded_file( $this->data['File']['tmp_name'], IMAGES.$this->data['File']['name']) ){
	    	$this->set('src',$this->data['File']['name']);
	    	$this->index();
	    } else {
	        echo 'move srr';
	        exit;
	    }

	    
	}

}
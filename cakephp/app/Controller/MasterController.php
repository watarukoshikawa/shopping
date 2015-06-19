<?php

APP::uses('AppController', 'Controller');

class MasterController extends AppController{

	public function index(){
		$this->render('master');
	}


}
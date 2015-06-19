<?php

APP::uses('AppController', 'Controller');

class UserController extends AppController{

	public function index(){
		$this->render('user');
		
	}
}
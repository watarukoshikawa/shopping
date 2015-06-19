<?php

APP::uses('AppController', 'Controller');

class CategoryController extends AppController{

	public function index(){
		$this->render('category');
		
	}
}
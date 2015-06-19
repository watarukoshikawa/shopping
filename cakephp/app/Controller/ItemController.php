<?php

APP::uses('AppController', 'Controller');

class ItemController extends AppController{

	public function index(){
		$this->render('item');

	}
}
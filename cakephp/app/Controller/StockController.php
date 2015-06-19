<?php

APP::uses('AppController', 'Controller');

class StockController extends AppController{

	public function index(){
		$this->render('stock');
		
	}
}
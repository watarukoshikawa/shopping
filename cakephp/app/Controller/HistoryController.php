<?php

APP::uses('AppController', 'Controller');

class HistoryController extends AppController{

	public function index(){
		$this->render('history');
		
	}
}
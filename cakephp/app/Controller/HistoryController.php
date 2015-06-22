<?php

APP::uses('AppController', 'Controller');

class HistoryController extends AppController{

	public function index(){

		$this->loadModel('history_tb');

		$sql = "
				SELECT
					history_tbs.date,
					item_tbs.name,
					history_tbs.number,
					item_tbs.price,
					history_tbs.account_name
				FROM
					(SELECT
						history_tbs.date AS date,
						history_tbs.number AS number,
						account_tbs.name AS account_name,
						history_tbs.item_id as item_id
					FROM
						history_tbs
					INNER JOIN
						account_tbs
					ON
						history_tbs.account_id = account_tbs.id
					)AS
						history_tbs
				INNER JOIN
					item_tbs
				ON
					history_tbs.item_id = item_tbs.id
				ORDER BY
					history_tbs.date
				DESC
		";
		$this->set('table_data', $this->history_tb->query($sql));
		$this->render('history');
	}

	public function run_select () {

		$this->loadModel('history_tb');
		$sql = "
				SELECT
					history_tbs.date,
					item_tbs.name,
					history_tbs.number,
					item_tbs.price,
					history_tbs.account_name
				FROM
					(SELECT
						history_tbs.date AS date,
						history_tbs.number AS number,
						account_tbs.name AS account_name,
						history_tbs.item_id as item_id
					FROM
						history_tbs
					INNER JOIN
						account_tbs
					ON
						history_tbs.account_id = account_tbs.id
					)AS
						history_tbs
				INNER JOIN
					item_tbs
				ON
					history_tbs.item_id = item_tbs.id
			";

			if (isset($this->request->data['select_from']) && isset($this->request->data['select_to'])) {

				if ($this->request->data['select_from'] != "" && $this->request->data['select_to'] != "") {
					$sql .= "
						WHERE
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
							WHERE
								history_tbs.date >= '".$this->request->data['select_from']."'
							ORDER BY
								history_tbs.date
							DESC
						";
					}elseif ($this->request->data['select_to'] != "") {
						$sql .="
							WHERE
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
				$this->render('history');

			}
	}
}

<?php

class Main extends Application
{
	public function __construct()
	{

	}

	public function index()
	{
//		require CTR_PATH.'/inc/head.php';
//		require CTR_PATH.'/inc/foot.php';

		$data_head = array(
			"result" => "finish_head",
		);

		$data = array(
			"result" => "finish",
		);

		$this->ctrl("inc/head", $data_head);
		$this->view("main", $data);
		//$this->ctrl("inc/foot");
	}
}
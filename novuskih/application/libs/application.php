<?php

class Application
{
	private $controller = null;
	private $action = null;

	public function __construct()
	{
		$cancontroll = false;
		$url = "";
		$this->controller = DFT_CTR;

		/*
		if (isset($_GET['url']))
		{
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
		}
		$params = explode('/', $url);
		$counts = count($params);
		*/

		$url = str_replace(BASE_PATH."/index.php", "", $_SERVER["PHP_SELF"]);
		$url = trim($url, '/');
		$params = explode('/', $url);
		$counts = count($params);

		if (isset($params[0]))
		{
			if($params[0]) $this->controller = $params[0];
		}

		if (file_exists(CTR_PATH.'/'.$this->controller.EXT_C))
		{
			require CTR_PATH.'/'.$this->controller.EXT_C;

			$this->controller = new $this->controller();
			$this->action = "index";

			if(isset($params[1]))
			{
				if($params[1]) $this->action = $params[1];
			}

			if (method_exists($this->controller, $this->action))
			{
				$cancontroll = true;
				switch ($counts)
				{
					case '0':
					case '1':
					case '2':
						$this->controller->{$this->action}();
						break;
					case '3':
						$this->controller->{$this->action}($params[2]);
						break;
					case '4':
						$this->controller->{$this->action}($params[2],$params[3]);
						break;
					case '5':
						$this->controller->{$this->action}($params[2],$params[3],$params[4]);
						break;
					case '6':
						$this->controller->{$this->action}($params[2],$params[3],$params[4],$params[5]);
						break;
					case '7':
						$this->controller->{$this->action}($params[2],$params[3],$params[4],$params[5],$params[6]);
						break;
					case '8':
						$this->controller->{$this->action}($params[2],$params[3],$params[4],$params[5],$params[6],$params[7]);
						break;
					case '9':
						$this->controller->{$this->action}($params[2],$params[3],$params[4],$params[5],$params[6],$params[7],$params[8]);
						break;
					case '10':
						$this->controller->{$this->action}($params[2],$params[3],$params[4],$params[5],$params[6],$params[7],$params[8],$params[9]);
						break;
				}
			}
		}

		if($cancontroll == false)
		{
			echo "<!DOCTYPE html><html><head><meta charset='utf-8'></head><body><h1>Oops!!! 잘못된 접근입니다.</h1></body></html>";
		}
	}

	public function ctrl($file, $get_ctrl_data="")
	{
		require CTR_PATH."/".$file.EXT_C;

		$class_name = end(explode("/", $file));

		if( $ctrl = new $class_name($get_ctrl_data) )
		{
			$ctrl->index();
		}
	}

	public function view($file, $get_view_data="")
	{
		if(is_array($get_view_data))
		{
			foreach($get_view_data AS $key=>$val) ${$key} = $val;
		}

		require VIW_PATH.VIEW."/".$file.EXT_V;
	}

	public function assign_libraries($get)
	{
		foreach($get AS $key=>$val)
		{
			$data[$key] = $val;
		}

		return $data;
	}
}


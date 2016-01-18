<?php

	class App

	{
		protected $controller = 'home';
		protected $method = 'index';
		protected $params = []; 


		public function __construct()
			{
				// echo "It's Working";

				//print_r imprime de forma legible
				$url = $this->parseURL();

				print_r($url);

				if(file_exists('..app/controllers'. $url[0]. '.php'))
					{
							$this->controller = $url[0];
							unset($url[0]);

					}

				require_once '../app/controllers/'. $this->controller. '.php';
				$this->controller  = new $this->controller;


				if(isset($url[1]))
				{
					if(method_exists($this->controller, $url[1]))
						{
							//echo 'ok!!';
							$this->method = $url[1];
							unset($url[1]);
						}
				}


			}
	
		public function parseURL()
		{
			if(isset($_GET['url']))
			{
				//rtrim elimina del lado derecho el simbolo "/" de la cadena obtenido con GET
				//filter_var y FILTER_SANITIZE_URL eliminan los valores ilegales en la cadena
				//explode Divide un string en varios string. La division esta indicada por /
				return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

			}
		}
}


?>
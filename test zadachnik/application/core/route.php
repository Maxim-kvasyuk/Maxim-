<?php
//Класс Маршрутизации
class Route
{

	static function start()
	{

		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{
			$controller_name = $routes[1];
		}

		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
			$action_f = explode("=", $action_name);
			$a = $action_f[0];
			$b = $action_f[1];
			if ($action_name == $a."=".$b) {
				$action_name = $a;
			}

		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}
		else {
		include "application/models/model_main.php";
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
			// создаем контроллер
			$controller = new $controller_name;
			$action = $action_name;
			if(method_exists($controller, $action))
			{
				// вызываем действие контроллера
				if (isset($b)) {
					$controller->$action($b);
				}
				else {
					$controller->$action();
				}

			}
		}
		else
		{
			include "application/controllers/controller_main.php";
			$controller_name = 'Controller_main';
			$controller = new $controller_name;
			$action = $action_name;
			if(method_exists($controller, $action))
			{
				// вызываем действие контроллера
				$controller->$action();
			}
			else{
				Route::ErrorPage404();
			}
		}
}

function ErrorPage404()
{
	$host = 'http://'.$_SERVER['HTTP_HOST'].'/404';
	}
}
?>

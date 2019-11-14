<?php

class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_admin();
		$this->view = new View();
	}

	function action_index()
	{
		session_start();

		if ( $_SESSION['admin'] == "123" )
		{
			$data = $this->model->get_data();
			$this->view->generate('admin_view.php', 'template_view.php', $data);
		}
		else
		{
			session_destroy();
			header('Location:/login');
		}
	}

  function action_page($b) {
		session_start();

		if ( $_SESSION['admin'] == "123" )
		{
			$data = $this->model->get_page($b);
			$this->view->generate('admin_view.php', 'template_view.php', $data);
		}
		else
		{
			session_destroy();
			header('Location:/login');
		}

	}

	function action_sort()
	{
		session_start();

		if ( $_SESSION['admin'] == "123" )
		{
			$data = $this->model->get_sort();
			$this->view->generate('admin_view.php', 'template_view.php', $data);
		}
		else
		{
			session_destroy();
			header('Location:/login');
		}
}
}
?>

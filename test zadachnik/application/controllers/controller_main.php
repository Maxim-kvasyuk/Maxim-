<?php

class Controller_Main extends Controller
{

	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->get_data();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_page($b) {
		$data = $this->model->get_page($b);
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_sort()
	{
		$data = $this->model->get_sort();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}

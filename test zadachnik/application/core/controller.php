<?php

class Controller {

	public $model;
	public $view;

	function __construct()
	{
		$this->view = new View();
	}

	// действие (action), вызываемое по умолчанию.
	function action_index()
	{
	}

	//действие (page), отвечает за пагинацию.
	function action_page($b)
	{
	}

	//действие (sort), отвечает за сортировку.
	function action_sort()
	{
	}
}

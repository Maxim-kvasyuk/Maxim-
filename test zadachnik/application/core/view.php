<?php

class View
{

	//public $template_view; //указать общий вид по умолчанию.

	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы.
	*/
	function generate($content_view, $template_view, $data = null)
	{
		include 'application/views/'.$template_view;
	}
}

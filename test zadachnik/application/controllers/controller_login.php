<?php
class Controller_Login extends Controller
{
	function action_index()
	{
		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password =$_POST['password'];
			if($login=="admin" && $password=="123")
			{
				session_start(); 
				$_SESSION['admin'] = $password;
				$data["login_status"] = "access_granted";
				header('Location:/admin/');
			}
			else
			{
				$data["login_status"] = "access_denied";
			}
		}
		else
		{
			$data["login_status"] = "";
		}

		$this->view->generate('login_view.php', 'template_view.php', $data);
	}

}

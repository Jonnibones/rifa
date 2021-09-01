<?php 

session_start();

require_once('..\..\..\autoload.php');

if(isset($_POST['btn_login']))
{
	if(!empty($_POST['inp_login']) and !empty($_POST['inp_senha'])) 
	{
		$login = filter_input(INPUT_POST, 'inp_login', FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, 'inp_senha', FILTER_SANITIZE_STRING);

		$user = new DB\User();
		$user->setEmail_user($login);
		$user->setSenha_user($senha);
		$_SESSION['msg-log'] = $user->login_User();

		if (password_verify($user->getSenha_user(), $_SESSION['msg-log'])) 
		{
			$_SESSION['msg-log'] = "Logado com sucesso!";
			$_SESSION['alert-log'] = "success";
			$_SESSION['entrou'] = "entrou";
			$_SESSION['nome'] = $user->getnome_Logged($user->getEmail_user());
			$_SESSION['hidden'] = "hidden";
			$_SESSION['dados_user'] = $user->getuserby_Login($user->getEmail_user());

		}
		else
		{
			$_SESSION['msg-log'] = "Login e(ou) senha incorretos.";
			$_SESSION['alert-log'] = "danger";
		}
		header('Location:http://localhost/rifa2/minha-conta');
	}
	else
	{
		$_SESSION['msg-log'] = "Campos não podem ser vazios";
		$_SESSION['alert-log'] = "primary";
		header('Location: http://localhost/rifa2/minha-conta');
	}
}

 ?>
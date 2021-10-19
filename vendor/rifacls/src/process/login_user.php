<?php 

//inicia a sessão
session_start();

//carrega as classes automaticamente
require_once('..\..\..\autoload.php');

//verifica se o botão de login está definido
if(isset($_POST['btn_login']))
{
	
	//verifica se os valores do formulário não estão vazios
	if(!empty($_POST['inp_login']) and !empty($_POST['inp_senha'])) 
	{
		//filtra os valores do formulário
		$login = filter_input(INPUT_POST, 'inp_login', FILTER_SANITIZE_STRING);
		$senha = filter_input(INPUT_POST, 'inp_senha', FILTER_SANITIZE_STRING);

		//instancia a classe User, atribui os valores e autentica a senha fornecida pelo usuário
		$user = new DB\User();
		$user->setEmail_user($login);
		$user->setSenha_user($senha);
		$_SESSION['msg-log'] = $user->login_User();

		//verifica se a senha fornecida pelo usuario confere com a registrada no banco de dados
		if (password_verify($user->getSenha_user(), $_SESSION['msg-log'])) 
		{
			$_SESSION['msg-log'] = "Logado com sucesso!";
			$_SESSION['alert-log'] = "success";
			$_SESSION['hidden'] = true;
			$_SESSION['dados_user'] = $user->getuserby_Login($user->getEmail_user());
			$_SESSION['msg-num'] = "Usuário logado!";
			$_SESSION['alert-num'] = "success";
			header('Location: http://localhost/rifa2/minha-conta');

		}
		else
		{
			$_SESSION['msg-log'] = "Login e(ou) senha incorretos.";
			//variável recebe o valor para o estilo da div
			$_SESSION['alert-log'] = "danger";
			header('Location: http://localhost/rifa2/minha-conta');
		}
		//Verifica se o usuário irá acessar a página com a rifa selecionada e faz o redirecionamento
		if (isset($_SESSION['redirect']))
			{
				$redirect = $_SESSION['redirect'];
				header("Location:$redirect");
			}
		
	}
	else
	{
		$_SESSION['msg-log'] = "Campos não podem ser vazios";
		//variável recebe o valor para o estilo da div
		$_SESSION['alert-log'] = "primary";
		header('Location: http://localhost/rifa2/minha-conta');
	}
}

 ?>
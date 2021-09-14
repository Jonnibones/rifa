<?php 

//inicia a sessão
session_start();

//Carregamento automático das classes
require_once('..\..\..\autoload.php');

//Verifica se o botão de cadastro está definido
if(isset($_POST['btn_cad']))
{
	//verifica se os valores passados no formulário não estão vazios 
	if(!empty($_POST['inp_nome']) and !empty($_POST['inp_email']) and !empty($_POST['inp_pass'])) 
	{
		//filtra os valores do formulário
		$nome = filter_input(INPUT_POST, 'inp_nome', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'inp_email', FILTER_SANITIZE_STRING);
		$pass = filter_input(INPUT_POST, 'inp_pass', FILTER_SANITIZE_STRING);

		//instancia a classe User, atribui os valores e criptografa a senha fornecida pelo usuário
		$user = new DB\User();
		$user->setNome_user($nome);
		$user->setEmail_user($email);
		$user->setSenha_user(password_hash($pass, PASSWORD_DEFAULT));

		// a variável $_SESSION['msg-cad'] recebe o valor do método insertUser
		$_SESSION['msg-cad'] = $user->insert_User();

		//verifica se o registro foi inserido
		if ($_SESSION['msg-cad'] == "Cadastrado com sucesso!") 
		{
			//variável recebe o valor para o estilo da div
			$_SESSION['alert-cad'] = "success";
		}else
		{
		//variável recebe o valor para o estilo da div
		$_SESSION['alert-cad'] = "warning";
		}
	//redireciona para mesma página	
	header('Location:http://localhost/rifa2/minha-conta');
	}else
	{
		//retorna mensagem que campos não podem ser vazios
		$_SESSION['msg-cad'] = "Campos não podem ser vazios";
		$_SESSION['alert-cad'] = "primary";
		header('Location: http://localhost/rifa2/minha-conta');
	}
}

?>
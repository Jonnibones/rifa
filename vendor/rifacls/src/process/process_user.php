<?php 

session_start();

require_once('..\..\..\autoload.php');

if(isset($_POST['btn_cad']))
{
	if(!empty($_POST['inp_nome']) and !empty($_POST['inp_email']) and !empty($_POST['inp_pass'])) 
	{
		$nome = filter_input(INPUT_POST, 'inp_nome', FILTER_SANITIZE_SPECIAL_CHARS);
		$email = filter_input(INPUT_POST, 'inp_email', FILTER_SANITIZE_EMAIL);
		$pass = filter_input(INPUT_POST, 'inp_pass', FILTER_SANITIZE_SPECIAL_CHARS);

		$user = new DB\User();
		$user->setNome_user($nome);
		$user->setEmail_user($email);
		$user->setSenha_user($pass);

		$_SESSION['msg-cad'] = $user->insert_User();
		if ($_SESSION['msg-cad'] == "Cadastrado com sucesso!") 
		{
			$_SESSION['alert'] = "success";
		}else{
		$_SESSION['alert'] = "warning";
		}

	header('Location:http://localhost/rifa2/minha-conta');
	}else
	{
		$_SESSION['msg-cad'] = "Campos não podem ser vazios";
		$_SESSION['alert'] = "primary";
		header('Location: http://localhost/rifa2/minha-conta');
	}
}

?>
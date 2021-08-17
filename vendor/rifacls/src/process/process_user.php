<?php 

session_start();
require __DIR__.'/vendor/autoload.php';
if(isset($_POST['btn_cad']))
{
	if(!empty($_POST['inp_nome']) and !empty($_POST['inp_email']) and !empty($_POST['inp_pass'])) 
	{
		if (is_numeric($_POST['inp_nome'])) {
			$_SESSION['msg-cad'] = "O campo nome não pode conter números";
			header('Location: http://localhost/rifa2/minha-conta');
		}

		$nome = filter_input(INPUT_POST, 'inp_nome', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'inp_email', FILTER_VALIDATE_EMAIL);
		$senha = filter_input(INPUT_POST, 'inp_pass', FILTER_SANITIZE_SPECIAL_CHARS);
		
		$teste = new User();

		$_SESSION['msg-cad'] = array($nome,$email,$senha);
		header('Location: http://localhost/rifa2/minha-conta');


	}else
	{
		$_SESSION['msg-cad'] = "Campos não podem ser vazios";
		header('Location: http://localhost/rifa2/minha-conta');
	}
}

?>
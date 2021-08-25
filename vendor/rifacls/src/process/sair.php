<?php 

session_start();

require_once('..\..\..\autoload.php');

if (isset($_SESSION['entrou'])) 
{

	unset($_SESSION['entrou']);
	unset($_SESSION['hidden']);
	unset($_SESSION['nome']);
	$_SESSION['msg-log'] = "Deslogado com sucesso!";
	$_SESSION['alert-log'] = "success";
	header('Location:http://localhost/rifa2/minha-conta');
}

 ?>
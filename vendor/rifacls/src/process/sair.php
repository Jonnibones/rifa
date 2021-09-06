<?php 

session_start();

require_once('..\..\..\autoload.php');

if (isset($_SESSION['dados_user'])) 
{
	unset($_SESSION['hidden']);
	unset($_SESSION['minhas_rifas']);
	unset($_SESSION['dados_user']);
	$_SESSION['msg-log'] = "Deslogado com sucesso!";
	$_SESSION['alert-log'] = "success";
	header('Location:http://localhost/rifa2/minha-conta');
}else
{
	$_SESSION['msg-log'] = "Acesso negado!";
	$_SESSION['alert-log'] = "danger";	
}

 ?>
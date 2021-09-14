<?php 

//inicia a sessão
session_start();

//carrega as classes
require_once('..\..\..\autoload.php');

//verifica se a variavel $_SESSION['dados_user'] está definida(se o usuario esta logado)
if (isset($_SESSION['dados_user'])) 
{
	//esvazia as variáveis
	unset($_SESSION['hidden']);
	unset($_SESSION['minhas_rifas']);
	unset($_SESSION['dados_user']);

	//mensagem de sucesso
	$_SESSION['msg-log'] = "Deslogado com sucesso!";
	//variável recebe o valor para o estilo da div
	$_SESSION['alert-log'] = "success";
	//redireciona para a mesma página
	header('Location:http://localhost/rifa2/minha-conta');
}else
{
	$_SESSION['msg-log'] = "Acesso negado!";
	$_SESSION['alert-log'] = "danger";	
}

 ?>
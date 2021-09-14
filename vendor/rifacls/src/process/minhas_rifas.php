<?php 

//inicia a sessão
session_start();

//carrega as classes
require_once('..\..\..\autoload.php');

//verifica se a váriavel $_SESSION['dados_user'] está definida(se o usuário está logado)
if (isset($_SESSION['dados_user'])) 
{
	//itera sobre os dados do usuário logado
	foreach ($_SESSION['dados_user'] as $id_rifa) 
	{
		//recebe o id do usuario logado
		$id_rifa = $_SESSION['dados_user'][0]['id_user'];	
	}
	//instancia a classe User
	$minharifa = new DB\User();
	//variável $_SESSION['minhas_rifas'] recebe os valores da rifa que o usuario escolheu 
	$_SESSION['minhas_rifas'] = $minharifa->getlist_Minharifa($id_rifa);
	//redireciona para a página minha conta
	header('Location:http://localhost/rifa2/minha-conta');
}
//verifica se a váriavel $_SESSION['dados_user'] está definida
if ($_GET['id']) 
{
	//esvazia a variável $_SESSION['minhas_rifas'] e redireciona para a página minha conta
	unset($_SESSION['minhas_rifas']);
	header('Location:http://localhost/rifa2/minha-conta');
}


 ?>
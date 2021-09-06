<?php 

session_start();

require_once('..\..\..\autoload.php');

if (isset($_SESSION['dados_user'])) 
{
	foreach ($_SESSION['dados_user'] as $value) 
	{
		$id_rifa = $_SESSION['dados_user'][0]['id_user'];	
	}
	$minharifa = new DB\User();
	$_SESSION['minhas_rifas'] = $minharifa->getlist_Minharifa($id_rifa);
	header('Location:http://localhost/rifa2/minha-conta');
}


 ?>
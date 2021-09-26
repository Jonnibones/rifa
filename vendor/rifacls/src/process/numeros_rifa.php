<?php 

session_start();

$id = $_GET['id'];
$cont = $_GET['cont'];

$_SESSION['numeros'][] = $_GET['num'];

$_SESSION['disabled'] =  "disabled";
unset($_GET['num']);
$_SESSION['msg-num'] = "Número selecionado!";
$_SESSION['alert-num'] = "success";
header("Location:http://localhost/rifa2/rifas?id=".$id."&cont=".$cont);

?>
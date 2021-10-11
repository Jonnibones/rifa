<?php

session_start();

if(isset($_SESSION['numeros']) and isset($_SESSION['dados_user']))
{
    header('Location:http://localhost/rifa2/pagamento');
}
if (!isset($_SESSION['numeros']) and !isset($_SESSION['dados_user'])) {
   $_SESSION['sweet'] = true;
   header("Location:http://localhost/rifa2/rifas?id=".$_GET['id']."&cont=".$_GET['cont']);
}
if (!isset($_SESSION['numeros'])) {
    $_SESSION['sweet'] = true;
    header("Location:http://localhost/rifa2/rifas?id=".$_GET['id']."&cont=".$_GET['cont']);
}
if (!isset($_SESSION['dados_user'])) {
    $_SESSION['sweet'] = true;
    header("Location:http://localhost/rifa2/rifas?id=".$_GET['id']."&cont=".$_GET['cont']);
}

?>
<?php
$id = $_GET['id'];
$cont = $_GET['cont'];
if(isset($_GET['delete']))
{
    unset($_SESSION['numeros']);
    header("Location:http://localhost/rifa2/rifas?id=".$id."&cont=".$cont);
}

?>
<?php 

$rifa = new DB\Rifa();

$_SESSION['rifas'] = $rifa->getlist_Rifa();


?>
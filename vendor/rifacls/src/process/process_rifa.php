<?php 

//instancia a classe Rifa
$rifa = new DB\Rifa();

//a variável $_SESSION['rifas'] recebe os dados do método getlist_Rifa()
$_SESSION['rifas'] = $rifa->getlist_Rifa();


?>
<?php 

require __DIR__.'/vendor/autoload.php';

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$teste = new DB\Rifa;
	$resultados = $teste->Getlist();

	echo json_encode($resultados);
	

});

$app->run();

 ?>
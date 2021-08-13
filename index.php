<?php 

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/vendor/rifacls/src/temps/header.html';
require __DIR__.'/vendor/rifacls/src/temps/index/mainindex.html';
require __DIR__.'/vendor/rifacls/src/temps/footer.html';

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$teste = new DB\Rifa;
	$resultados = $teste::Getlist();

	//echo json_encode($resultados);
	

});

$app->run();

 ?>
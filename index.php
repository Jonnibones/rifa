<?php 

require __DIR__.'/vendor/autoload.php';

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$teste = new DB\Sql;

	var_dump($teste);

});

$app->run();

 ?>
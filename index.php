<?php 

require __DIR__.'/vendor/autoload.php';

//Cabeçalho
require __DIR__.'/vendor/rifacls/src/temps/header.html';

//Instâcia do Slim
$app = new \Slim\Slim();

$app->get('/', function() {
	require __DIR__.'/vendor/rifacls/src/process/process_rifa.php';
	require __DIR__.'/vendor/rifacls/src/temps/index/mainindex.html';
});
$app->get('/minha-conta/', function() {
	require __DIR__.'/vendor/rifacls/src/temps/minha-conta/minha-conta.html';
});
$app->get('/user/', function() {
	require __DIR__.'/vendor/rifacls/src/temps/user/user.html';
});

$app->run();

require __DIR__.'/vendor/rifacls/src/temps/footer.html';



 ?>
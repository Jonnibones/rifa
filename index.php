<?php 
//Carregamento automático das classes
require __DIR__.'/vendor/autoload.php';

//carregar o cabeçalho
require __DIR__.'/vendor/rifacls/src/temps/header.html';

//Instâcia do Slim
$app = new \Slim\Slim();

//método para carregar os arquivos da index
$app->get('/', function() 
{
	require __DIR__.'/vendor/rifacls/src/process/process_rifa.php';
	require __DIR__.'/vendor/rifacls/src/temps/index/mainindex.html';
});

//método para carregar os arquivos da página minha conta
$app->get('/minha-conta', function() 
{
	require __DIR__.'/vendor/rifacls/src/temps/minha-conta/minha-conta.html';
});

$app->get('/rifas', function() 
{
	require __DIR__.'/vendor/rifacls/src/temps/rifas/rifas.html';
});

$app->get('/pagamento', function() 
{
	require __DIR__.'/vendor/rifacls/src/temps/pagamento/pagamento.html';
});

$app->run();

//carregar o rodapé
require __DIR__.'/vendor/rifacls/src/temps/footer.html';



 ?>
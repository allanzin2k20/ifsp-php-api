<?php
//importa o arquivo de configuracao
require 'config.php';
require HELPERS_FOLDER.'autoloaders.php';

$route = new Router();
$route->handleCORS();
$route->gateKeeper();

$output = new Output();
$output->notFound();
?>
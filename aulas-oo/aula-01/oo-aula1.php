<?php

require('Product.php');

$prod = new Product(null, null, "allan", 10);

$prod->setName("allan");
$prod->setPrice(20);
$prod->name = "allan gabriel";

echo "Valor = $ ";
$prod->getPrice();

echo "<br>nome = $ ";
$prod->getName();

echo '<br>Propriedades name: '.$prod->name;

echo
"<br>---------------------------------<br>";


$prod2 = new Product(null, null, "gabriel", 70);


echo "Valor = $ ";
$prod2->getPrice();

echo "<br>nome = $ ";
$prod2->getName();
?>
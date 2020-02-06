<?php

/******* DECLARATIONS *****/
/********TABLEAUX *******/

$disque1 = array(
    'artiste' => 'Claro Intelecto',
    'titre' => 'Peace Of Mind',
    'prix' => 14.99,
    'image' => 'media/claro.jpg',
    'id' => 0,
    'poids' => 100
);

$disque2 = array(
    'artiste' => 'Imperial Tiger Orchestra',
    'titre' => ' Mercato',
    'prix' => 24.99,
    'image' => 'media/mercato.jpg',
    'id' => 1,
    'poids' => 200

);

$disque3 = array(
    'artiste' => 'LCD Soundsystem',
    'titre' => ' American Dream ',
    'prix' => 24.99,
    'image' => 'media/lcd.jpg',
    'id' => 2,
    'poids' => 200

);

$Articles = array($disque1, $disque2, $disque3);
$quantite_article = count($Articles);
$panier_current = array();

?>
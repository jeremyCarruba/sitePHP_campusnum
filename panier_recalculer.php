<?php
include('includes/fonctions.php');
session_start();
var_dump($_POST);
$text = 'newQuantity_';
$newQuantity = array();

if(isset($_POST['delete']))
{
    foreach($_SESSION['panier'] as $key => $element) {
        foreach($element as $key1 => $element1) {
            if($key1 === 'id' && $element1 === (int)$_POST['delete']) {
                unset($_SESSION['panier'][$key]);
                echo 'zebiii';
            }
        }
    }
    header('Location: panier.php');
}

if(isset($_POST['action']) && $_POST['action'] === 'recalculate')
{

    foreach($_POST as $key => $element) {
        print_r($key);
        echo '<br/>';
        if(strpos($key, $text) !== FALSE) {
            $rest = substr($key, -1);
            print_r($rest);
            $newQuantity[$rest] = $element;
        }
    }

    print_r($newQuantity);

    foreach($_SESSION['panier'] as $key => $element) {
        foreach($element as $key1 => $element1) {
            foreach($newQuantity as $keyq => $elementq) {
                if($key === $keyq)
                $_SESSION['panier'][$key]['quantity'] = (int)$elementq;
            }
        }
    }

    $length = count($_SESSION['panier']);
    var_dump($length);
    var_dump($_SESSION['panier']);

            
        
    


   header('Location: panier.php');
}

?>
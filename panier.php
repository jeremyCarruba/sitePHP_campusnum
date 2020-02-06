<?php
include('includes/fonctions.php');
session_start();

/*** RECALCUL PANIER *****/

if (!isset($_SESSION['panier']) ) {
    $_SESSION['panier'] = array();
    $_SESSION['panier'] = creerPanier($_SESSION['panier'],  $Articles, $quantite_article, $_GET);
}

$panier_current = $_SESSION['panier'];

$total_panier = totalPanier($panier_current);
$frais = fraisDePort($panier_current, $total_panier);

if(isset($_GET['cart']) && $_GET['cart'] === 'empty') {
    viderPanier();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panier</title>
</head>
<body>

<?php include('includes/header.php'); ?>

<div class ="container">
<div class ="tableau_disque">

    <?php
    if(!empty($_SESSION['panier'])){
        ?>
        <form action="panier_recalculer.php" method="post">
        <?php 
        $quantite_art = array();
        listAllArticles_panier($panier_current);

        foreach($panier_current as $key => $element){
            foreach($element as $key1 => $element1) {
                if($key1 === 'quantity'){
                array_push($quantite_art, $element1);
                }
            }
        }
        
        ?>
        <div class="card text-white bg-primary mb-3 text-right float-right" style="max-width: 18rem;">
        <div class="card-header">Total</div>
        <div class="card-body">
            <h5 class="card-title">Prix des articles</h5>
            <p class="card-text"><?=$total_panier?> $</p>
            <p class="card-text"> Frais de port = <?= $frais ?> </p>
     

        </div>
        </div>
    

    
        <button type="submit" name="action" value="recalculate">Recalculer</button>
        </form>
        </div>

<?php
    } else {
        ?>
        <h1> Votre panier est vide </h1>

        <?php
        if(isset($_SESSION['panier'])) {
            session_destroy();
        }
    }

    ?>


    <a href="boutique.php"> Retour Accueil </a>


</body>

</html>
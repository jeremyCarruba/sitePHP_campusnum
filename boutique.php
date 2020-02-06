
<?php
include('includes/fonctions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title></title>
    <meta
            name="description"
            content="Homepage du site boutique"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
</head>

<body>

<?php include("includes/header.php"); ?>

<div class ="container">
    <div class ="tableau_disque">
    <form action="panier.php" method="get">
    
    <?php
    listAllArticles($Articles);
    ?>

    <button class ="btn-select btn btn-primary float-right" type="submit"> Sélectionner Articles</button>

    </form>

</div>


</div>

</body>

<?php

?>
</html>



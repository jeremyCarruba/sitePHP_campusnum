
<?php
include('includes/fonctions.php');

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
        content="Page d'ajout d'article"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
</head>

<body>

<?php include('includes/header.php') ?>


<div class ="container">


    <form method="post" action="displayArticle.php" enctype="multipart/form-data" class ="tableau_disque">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="artist">Artist</label>
                <input type="text" class="form-control" id="artiste" name="artiste">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Title</label>
                <input type="text" class="form-control" id="titre" name="titre">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="prix">Price</label>
                <input type="text" class="form-control" id="prix" name="prix">
                <input type="checkbox" id ="article_select" class="form-check-input" name="array[1]">
                <input type="checkbox" id ="article_select1" class="form-check-input" name="array[2]">
                <input type="checkbox" id ="article_select2" class="form-check-input" name="array[3]">
                <input type="checkbox" id ="article_select3" class="form-check-input" name="array[4]">


            </div>
        </div>
        <div class="form-row">
            Envoi de fichier :
        </div>
        <div class="form-row">
            <input type="file" class="form-control-file"  name="image_disk" /><br />
            <button type="submit" name="submit"> Submit </button>
        </div>




 <?php
            if(isset($_GET['signup'])) {
                switch($_GET['signup']) {
                    case 'empty':
                    echo '<h1>ENTREZ DES VALEURS ESTI </h1>';
                    break;

                    case 'prix_invalide':
                        echo '<h1>ENTREZ UN BON PRIX ESTI DE TABARNAK </h1>';
                    break;

                }
            }

            if(isset($_GET['upload']) && $_GET['upload'] === 'error') {
                echo '<h1> Dude t\' as pas chargé de fichier </h1>';
            }
            ?>



    </form>


    <a href="addArticle.php">Page vide</a>
    <a href="boutique.php">Page boutique</a>

    </div>


</div>
</div>

</body>
</html>





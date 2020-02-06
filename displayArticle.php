<?php
include('includes/fonctions.php');

var_dump($_POST);
var_dump($_FILES);

$error_signup = true;

if(isset($_POST['submit']))
{
    $artist = $_POST['artiste'];
    $title = $_POST['titre'];
    $prix =  $_POST['prix'];
    $prix_test = intval($_POST['prix'], $base = 10);
    $prix += 0;
//    print_r($artist);
//    print_r($_POST);


    if(empty($artist) || empty($_POST['prix']) || empty($title) ) {
        header("Location: addArticle.php?signup=empty&upload=success");
    } else {
        if($prix_test === 0 || !is_int($prix) ) {
            header("Location: addArticle.php?signup=prix_invalide&upload=success");
    } else {
        $error_signup = false;

        }
    }
} else {
//     header("Location: addArticle.php?signup=error&upload=success");
// }

var_dump($_POST);
}

if($error_signup===false) {

    if(isset($_FILES['image_disk']) && $_FILES['image_disk']['size'] !== 0){
        $file = $_FILES['image_disk'];
    
        $fileName=$_FILES['image_disk']['name'];
        $fileTmpName=$_FILES['image_disk']['tmp_name'];
        $fileSize=$_FILES['image_disk']['size'];
        $fileError=$_FILES['image_disk']['error'];
        $fileType=$_FILES['image_disk']['type'];
    
        $fileExt = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExt));
    
        $allowed = array('jpg', 'jpeg', 'png');
    
        if(in_array($fileActualExtension, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 1000000) {
                    $fileNameNew = "cover." . $fileActualExtension;
                    $fileDestination = 'media/uploads/'.$fileNameNew;
    
                    move_uploaded_file($fileTmpName, $fileDestination);
    
                } else {
                    echo "Your file is too big";
                }
            } else {
                echo "There was an error while uploading";
            }
        } else {
            echo "You cannot upload files of this type";
        }
    } else {
        header('Location: addArticle.php?upload=error');
    }

    $disque_new = array(
        'artiste' => $_POST['artiste'],
        'titre' => $_POST['titre'],
        'prix' => $_POST['prix'],
        'image' => 'media/uploads/cover.jpg',
        'id' => NULL
    );

    $disques = array($disque_new);


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

<?php include('includes/header.php') ?>

<div class ="container">
    <?php
    listAllArticles($disques);

    ?>

<a href="addArticle.php"> Retour à l'accueil</a>

</div>

<?php
}
?>

</body>
</html>



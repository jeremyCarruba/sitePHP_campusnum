<?php
include('includes/declarations.php');

/********* MES FONCTIONS **********/

/***** PAGE BOUTIQUE ***** */

function afficherArticle($article) {
    echo '
        <tr>
         <td class="col_cover"><img class="cover_disk" src =" ' . $article['image'] . '" alt ="blablabla"/> </td>
        <td>  ' . $article['artiste']  . '</td>
        <td>  ' . $article['titre'] . '</td>
        <td>   ' . $article['prix'] . ' Euros </td>
        <td>
            <div class="form-check">
            <input type="checkbox" id ="article_select" class="form-check-input" name="' . $article['id']  . '">
            <label class ="form-check-label" for="article_select">Acheter</label>
            </div>
            
        </td>

        </tr>
        <br/>';
}


function listAllArticles($liste)
{
?>
        <div class="tableau_article">
        <table class="table table-dark table-striped">
        <thead class = "thead-dark">
            <tr>
            <th scope="col"></th>
            <th scope="col">Artiste</th>
            <th scope="col">Titre</th>
            <th scope="col">Prix</th>
</tr>
</thead>

<?php
    foreach($liste as $element)
    {
        afficherArticle($element);
    }
    ?>
        </table>
        </div>
<?php }; ?>


 <!-- ZFZFJEZFOZEFOZEFOZHFE -->


<?php

/**********PAGE PANIER ******/

/**** VARIABLES **** */

function afficherArticle_panier($article, $quantity) {
    echo '
        <tr>
         <td class="col_cover"><img class="cover_disk" src =" ' . $article['image'] . '" alt ="blablabla"/> </td>
        <td>  ' . $article['artiste']  . '</td>
        <td>  ' . $article['titre'] . '</td>
        <td>   ' . $article['prix'] . ' Euros </td>
        <td>
        <div class="form-group">
        <label for="quantite_article"> Quantité </label>
        <input type ="number" id="quantite_article_' . $article['id'] . '" name="newQuantity_' . $article['id'] . '" value ="' . $quantity .'" min="1" class="col-3">
        </div>
        <div class="form-row">
        <button type="submit" name="delete" value ="'.$article['id'].'"> Supprimer </button>
        </div>    
        </td>


        </tr>
        <br/>';
}
?>

<!------- BOUCLE ----->
<?php 
function listAllArticles_panier($liste)
{ ?>

        <div class="tableau_article">
        <table class="table table-dark table-striped">
        <thead class = "thead-dark">
            <tr>
            <th scope="col"></th>
            <th scope="col">Artiste</th>
            <th scope="col">Titre</th>
            <th scope="col">Prix</th>
            <th scope="col"></th>
</tr>
</thead>

<?php
    foreach($liste as $element)
    {
        afficherArticle_panier($element, $element['quantity']);
    }
    ?>
        </table>
        </div>
<?php
}

/******* AUTRES ******/

function creerPanier($panier, $liste, $quantite, $id) {
    $compteur=0;
if(!empty($id)) {
while($compteur<$quantite){
  if(isset($id["$compteur"])){  
    if($id["$compteur"] === 'on') {
        $new_arr = $liste[$compteur];
        $new_arr['quantity'] = 1;        
        $panier[$compteur] =  $new_arr;
    }
}
$compteur++;
    }
}
    return $panier;
}

function totalPanier($panier) {
    $total = 0;

    foreach($panier as $key => $element) {
        $prix = 0;
        $quant = 0;
        foreach($element as $key1 => $element1) {
            if($key1 === 'prix') {
                $prix = $element1;
            }
            if($key1 === 'quantity') {
                $quant = $element1;
            }
            $total = $total + ($prix * $quant);
        }
    }
    return $total;
}

function fraisDePort($panier, $total)
{
    $poids = 0;
    $frais = 0;
    foreach($panier as $key => $element) {
        $poids = $poids + ($element['quantity'] * $element['poids']);
    }

    if($poids < 500) {
        $frais = '5 euros';
    } else if ($poids < 2000) {
        $frais = 0.1*$total;
        $frais = number_format($frais, 2);
        $frais = $frais . ' euros';
    } else  {
        $frais = 'gratuit';
    }
return $frais;
}

function viderPanier() {
    unset($_SESSION['panier']);
}

?>
<?php
session_start();
include ("../bdd/bdd.php");
require_once("../classes/chien.php");

// On récupère l'id de l'utilisateur connecté
$id_utilisateur = $_SESSION['id_utilisateur'];

if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    header('location: ../index.php');
    exit;
}

// L'id du chien sélectionné dans "gestion.php"
$idAnimal = $_GET['id'];

// Requête pour les données du chien sélectionné 
$sql = "SELECT * FROM Animaux WHERE id = $idAnimal AND idUtilisateurs = $id_utilisateur";
$resultat = $pdo->query($sql);


if ($resultat->rowCount() == 0) {
    echo "Animal non trouvé."; // En cas d'erreur, normalement impossible
  } 
  else {

    $animal = $resultat->fetch();

    // Requête pour récupérer (surtout l'image) de la Race du chien
    $sql3 = "SELECT Races.nom, Races.img FROM Animaux JOIN Races ON Animaux.idRaces = Races.id WHERE Races.id =".$animal['idRaces']." ";
    $resultat3 = $pdo->query($sql3);
    $race = $resultat3->fetch();

    // Requête pour récupérer (surtout l'image) du Terrain du chien
    $sql4 = "SELECT Terrains.nom, Terrains.img FROM Animaux JOIN Terrains ON Animaux.idTerrains = Terrains.id WHERE Terrains.id = ".$animal['idTerrains']." ";
    $resultat4 = $pdo->query($sql4);
    $terrain = $resultat4->fetch();

    // On crée l'objet Chien correspondant au chien sélectionné
    $chien = new Chien(
        $animal['id'],
        $animal['nom'],
        $race['nom'],
        $terrain['img'],
        $animal['Sante'],
        $animal['Bonheur'],
        $animal['Proprete'],
        $animal['Faim'],
        $animal['idUtilisateurs']
    );
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="puppy.css">
    <title><?php echo $animal['nom']; ?> - NintenPix</title>
</head>
<body>

<div class="background"> <!-- On vient afficher le Terrain -->
    <video autoplay loop muted>
        <source src="<?php echo $terrain['img']; ?>" type="video/mp4">
    </video>
</div>

<div class="bandeau"> <!-- On vient afficher le nom du chien -->
    <h1><?php echo $chien->getNom() ?></h1>
</div>


<div class="conteneur"> 
    <div class="imgrace"> <!-- On vient afficher l'image de la Race -->
        <img src="<?php echo $race['img']; ?>" alt="Image de la race" <?php echo $race['nom']; ?>>
    </div>

    <form method="POST">
		<input type="submit" name="nourrir" value="Nourrir">
	</form>
    <form method="POST">
		<input type="submit" name="brosser" value="Brosser">
	</form>
    <form method="POST">
		<input type="submit" name="jouer" value="Jouer">
	</form>
</div>

<div class="box_status">
    <div class="status_title">
        <p>Statistiques</br></p>
    </div>
    <h2> <?php echo " " . $chien->getSante() . "<br>"; ?> </h2>
    <h2> <?php echo " " . $chien->getBonheur() . "<br>"; ?> </h2>
    <h2> <?php echo " " . $chien->getProprete() . "<br>"; ?> </h2>
    <h2> <?php echo " " . $chien->getFaim() . "<br>"; ?> </h2>
</div>

<div class="icons">
    <div id="iconsante">
        <img src="../ressources/icons/sante.png" alt="Icone de la santé" width="50" height="50"></img>
    </div>
    <div id="iconbonheur">
        <img src="../ressources/icons/bonheur.png" alt="Icone du bonheur" width="40" height="40"></img>
    </div>
    <div id="iconproprete">
        <img src="../ressources/icons/proprete.png" alt="Icone de la propreté" width="50" height="50"></img>
    </div>
    <div id="iconfaim">
        <img src="../ressources/icons/faim.png" alt="Icone de la faim" width="50" height="50"></img>
    </div>
</div>

<div class="box_interact"></div>
    <div class="interact_title">
        <p>Interactions</br></p>
    </div>
</div>

<div class="interact_button">
    <?php 
    // Si bouton Nourrir
    if (isset($_POST['nourrir'])) {
        $chien->nourrir();
    }
    // Si bouton Brosser
    if (isset($_POST['brosser'])) {
        $chien->brosser();
    }   
    // Si bouton Jouer
    if (isset($_POST['Jouer'])) {
        $chien->jouer();
    }
    ?>
</div>



</body>
</html>



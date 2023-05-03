<?php
session_start();
include ("../bdd/bdd.php");
$id_utilisateur = $_SESSION['id_utilisateur'];

if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    header('location: ../index.php');
    exit;
}

// On récupère l'id du chien sélectionné dans "gestion.php"
$idAnimal = $_GET['id'];

// Requête élémentaire pour les informations du chien
$sql = "SELECT * FROM Animaux WHERE id = $idAnimal AND idUtilisateurs = $id_utilisateur";
$resultat = $pdo->query($sql);

if ($resultat->rowCount() == 0) {
  echo "Animal non trouvé.";
} else {

  $animal = $resultat->fetch();

  $sql2 ="SELECT Races.nom FROM Animaux JOIN Races ON Animaux.idRaces = Races.id WHERE Races.id =".$animal['idRaces']." ";
  $resultat2 = $pdo->query($sql2);
  $race = $resultat2->fetch();

  $sql3 = "SELECT Races.nom, Races.img FROM Animaux JOIN Races ON Animaux.idRaces = Races.id WHERE Races.id =".$animal['idRaces']." ";
  $resultat3 = $pdo->query($sql3);
  $race = $resultat3->fetch();

  // Requête SQL pour récupérer le nom du terrain associé à l'animal
  $sql4 ="SELECT Terrains.nom FROM Animaux JOIN Terrains ON Animaux.idTerrains = Terrains.id WHERE Terrains.id =".$animal['idTerrains']." ";
  $resultat4 = $pdo->query($sql4);
  $terrain = $resultat4->fetch();

  // Requête SQL pour récupérer à la fois le nom et l'image du terrain associé à l'animal
  $sql5 = "SELECT Terrains.nom, Terrains.img FROM Animaux JOIN Terrains ON Animaux.idTerrains = Terrains.id WHERE Terrains.id =".$animal['idTerrains']." ";
  $resultat5 = $pdo->query($sql5);
  $terrain = $resultat5->fetch();
?>


<!DOCTYPE HTML>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="puppy.css">
    <title><?php echo $animal['nom']; ?> - NintenPix</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body>

<div class="background-video">
  <video autoplay loop muted>
    <source src="<?php echo $animal['idTerrains']; ?>" type="video/mp4">
    <!-- Ajouter d'autres sources si nécessaire pour la compatibilité -->
  </video>

</div>
  <div class="overlay">
    <div class="info info-left">
      <span class="info-label">Faim :</span>
      <span class="info-value"><?php echo $animal['Faim']; ?>%</span>
      <span class="info-label">Propreté :</span>
      <span class="info-value"><?php echo $animal['Proprete']; ?>%</span>
    </div>
    <h1><?php echo $animal['nom']; ?></h1>
    <div class="info info-right">
      <span class="info-label">Bonheur :</span>
      <span class="info-value"><?php echo $animal['Bonheur']; ?>%</span>
      <span class="info-label">Santé :</span>
      <span class="info-value"><?php echo $animal['Sante']; ?>%</span>
    </div>
  </div>
</div>

<div class="doggo">
  <img src="<?php echo $race['img']; ?>" alt="Image de la race" <?php echo $race['nom']; ?>"></td>
</div>

<form method="POST">
  <input type="hidden" name="action" value="nourrir">
  <button type="submit">Nourrir</button>
</form>

<?php
if (isset($_POST['nourrir'])) {
  // Requête pour mettre à jour la faim et le bonheur de l'animal
  $sql4 = "UPDATE Animaux SET Faim = Faim - 1, Bonheur = Bonheur + 10 WHERE id = $idAnimal AND idUtilisateur = $id_utilisateur";
  $pdo->query($sql4);
}
?>

<?php } ?>
</body>
</html>




<?php
session_start();
include ("../bdd/bdd.php");
$id_utilisateur = $_SESSION['id_utilisateur'];

if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    
    header('location: ../index.php');
    exit;
}

$sql = "SELECT * FROM Animaux WHERE idUtilisateurs = $id_utilisateur";
$resultat = $pdo->query($sql);

?>


<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="gestion.css">
    <title>NintenPix - Gestion de vos animaux</title>
</head>


<body>
  <div class="filter-container"></div>
  <h1>Vos animaux</h1>


<?php
 // Vérification si la requête a retourné des résultats
if ($resultat->rowCount() == 0) {
  echo "Aucun animal trouvé pour cet utilisateur.";
} 
else {
  ?>
  <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Race</th>
          <th>Santé</th>
          <th>Bonheur</th>
          <th>Faim</th>
          <th>Propreté</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
      <?php
        while ($animal = $resultat->fetch()) {
          $sql2 ="SELECT Races.nom FROM Animaux JOIN Races ON Animaux.idRaces = Races.id WHERE Races.id =".$animal['idRaces']." ";
          $resultat2 = $pdo->query($sql2);
          $race = $resultat2->fetch();

          $sql3 = "SELECT Races.nom, Races.img FROM Animaux JOIN Races ON Animaux.idRaces = Races.id WHERE Races.id =".$animal['idRaces']." ";
          $resultat3 = $pdo->query($sql3);
          $race = $resultat3->fetch();
      ?>
        <tr class="display_animal">
          <td><?php echo " " . $animal['nom'] . ""; ?></td>
          <td><?php echo " " . $race['nom'] . ""; ?></td>
          <td><?php echo " " . $animal['Sante'] . ""; ?></td>
          <td><?php echo " " . $animal['Faim'] . ""; ?></td>
          <td><?php echo " " . $animal['Bonheur'] . ""; ?></td>
          <td><?php echo " " . $animal['Proprete'] . ""; ?></td>
          <td><a href="../puppy/puppy.php?id=<?php echo $animal['id'];?>">Accéder</a></td>
        </tr>
        </tbody>
    </table>
    <?php 
        }
}
?>

</body>
<script src='gestion.js'></script>
</html>

<?php
session_start();
include ("../bdd/bdd.php");
$id_utilisateur = $_SESSION['id_utilisateur'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="gestion.css">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>

<?php
if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    
    header('location: ../connexion/connexion.php');
    exit;
}

$sql = "SELECT * FROM Animaux WHERE idUtilisateurs = $id_utilisateur";
$resultat = $pdo->query($sql);


?>

<head>
  <title>acceuille</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Acceuille </h1>
   
    <div class="filter-container">
    </div>
  
  </div>
  <h1>Vos animaux</h1>
<?php
 // Vérification si la requête a retourné des résultats
if ($resultat->rowCount() == 0) {
  echo "Aucun animal trouvé pour cet utilisateur.";
} else {
  $animal = $resultat->fetch();
  $sql2 ="SELECT Races.nom FROM Animaux JOIN Races ON Animaux.idRace = Races.id WHERE Races.id =".$animal['idRace']." ";
  $resultat2 = $pdo->query($sql2);
  $race = $resultat2->fetch();

  $sql3 = "SELECT Races.nom, Races.img FROM Animaux JOIN Races ON Animaux.idRace = Races.id WHERE Races.id =".$animal['idRace']." ";
  $resultat3 = $pdo->query($sql3);
  $race = $resultat3->fetch();
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
          <th>Animal</th>
        </tr>
      </thead>
      <tr class="iPhone X">
      <td><?php  echo " " . $animal['nom'] . ""; ?></td>
      <td><?php  echo " " . $race['nom'] . ""; ?></td>
      <td><?php  echo " " . $animal['Sante'] . ""; ?></td>
      <td><?php  echo " " . $animal['Faim'] . ""; ?></td>
      <td><?php  echo " " . $animal['Bonheur'] . ""; ?></td>
      <td><?php  echo " " . $animal['Proprete'] . ""; ?></td>
      <td><img src="<?php echo $race['img']; ?>" alt="image de la race <?php echo $race['nom']; ?>"></td>


      <tbody>
       
        
          
       
      </tbody>
    </table>
<?php
}
?>


  </div>


  <form method="post" >
  </form>

</body>

</html>
</body>

</html>
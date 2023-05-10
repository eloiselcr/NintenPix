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
  	<title>Gestion - NintenPix</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	</head>


	<body>

	<video autoplay loop muted>
    <source src="../ressources/gestion_background.mov" type="video/mp4">
	</video>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Gestion</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4 class="text-center mb-4">Voici les animaux que vous possédez</h4>
					<div class="table-wrap">
					<?php
 					// Vérification si la requête a retourné des résultats
						if ($resultat->rowCount() == 0) {
							echo "Aucun animal trouvé pour cet utilisateur.";
						} 
						else {
							?>
						<table class="table">
					    <thead class="thead-primary">
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
							/*$sql2 ="SELECT Races.nom FROM Animaux JOIN Races ON Animaux.idRaces = Races.id WHERE Races.id =".$animal['idRaces']." ";
          					$resultat2 = $pdo->query($sql2);
          					$race = $resultat2->fetch();*/

							// Requête pour faire le lien avec la Race du chien
          					$sql3 = "SELECT Races.nom, Races.img FROM Animaux JOIN Races ON Animaux.idRaces = Races.id WHERE Races.id =".$animal['idRaces']." ";
          					$resultat3 = $pdo->query($sql3);
          					$race = $resultat3->fetch();
      						?>

					      <tr>
							<!-- Affichage des données du chiens dans un tableau -->
					        <th scope="row" class="scope" ><?php echo " " . $animal['nom'] . ""; ?></th>
					        <td><?php echo " " . $race['nom'] . ""; ?></td>
					        <td><?php echo " " . $animal['Sante'] . ""; ?></td>
					        <td><?php echo " " . $animal['Bonheur'] . ""; ?></td>
							<td><?php echo " " . $animal['Faim'] . ""; ?></td>
							<td><?php echo " " . $animal['Proprete'] . ""; ?></td>
					        <td><a href="../puppy/puppy.php?id=<?php echo $animal['id'];?>" class="btn btn-primary">Accéder</a></td>
					      </tr>
					    </tbody>
					  <?php 
        }
		?>
		</table>
		<?php
}
?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>


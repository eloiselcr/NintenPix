<?php
// STARTUP DE BASE 
include ("../connexion/connexion.php");

if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    header('location: ../connexion/connexion.php');
    exit;
}

$id_utilisateur = $_SESSION['id_utilisateur'];

?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NintenWish - Puppy</title>
</head>
<body>
<?php
$sql = "SELECT * FROM Animaux WHERE idUtilisateurs = $id_utilisateur";
$resultat = $pdo->query($sql);

// Vérification si la requête a retourné des résultats
if ($resultat->rowCount() == 0) {
    echo "Aucun animal trouvé pour cet utilisateur.";
} else {
    // Affichage des données de l'animal
    $animal = $resultat->fetch();
    echo "<h2>Mon chien :</h2>";
    echo "<ul>";
    echo "<li>Nom : " . $animal['nom'] . "</li>";
    echo "<li>Santé : " . $animal['Sante'] . "</li>";
    echo "<li>Propreté : " . $animal['Proprete'] . "</li>";
    echo "<li>Faim : " . $animal['Faim'] . "</li>";
    echo "<li>Bonheur : " . $animal['Bonheur'] . "</li>";
    echo "</ul>";
}
?>
</body>
</html>
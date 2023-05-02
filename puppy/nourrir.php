<?php
session_start();
include("../bdd/bdd.php");
$id_utilisateur = $_SESSION['id_utilisateur'];

if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'utilisateur est bien connecté
{
  header('location: ../connexion/connexion.php');
  exit;
}

$idAnimal = $_POST['idAnimal'];

// Requête pour récupérer les valeurs actuelles des statistiques
$sql = "SELECT * FROM Animaux WHERE id = $idAnimal AND idUtilisateurs = $id_utilisateur";
$resultat = $pdo->query($sql);
$animal = $resultat->fetch();

// Mettre à jour les valeurs des statistiques
$nouvelleSante = $animal['Sante'] + 5;
$nouveauBonheur = min(100, $animal['Bonheur'] + 10);
$nouvelleFaim = max(0, $animal['Faim'] - 15);
$nouvelleProprete = $animal['Proprete'] - 5;

// Requête pour mettre à jour les valeurs des statistiques
$sql2 = "UPDATE Animaux SET Sante = $nouvelleSante, Bonheur = $nouveauBonheur, Faim = $nouvelleFaim, Proprete = $nouvelleProprete WHERE id = $idAnimal AND idUtilisateurs = $id_utilisateur";
$resultat2 = $pdo->query($sql2);

?>

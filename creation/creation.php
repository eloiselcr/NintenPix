<?php
session_start();
include ("../bdd/bdd.php");

$id_utilisateur = $_SESSION['id_utilisateur'];


if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'utilisateur est bien connecté
{
    header('location: ../connexion/connexion.php');
    exit;
}

if(isset($_POST['creation']))
{
 

    // Requête SQL INSERT INTO pour ajouter un nouvel animal
    $requete3 = "INSERT INTO `Animaux`(`nom`, `idRace`, `idTerrains`, `Sante`, `Bonheur`, `Proprete`, `Faim`, `idUtilisateurs`) VALUES ('".$_POST['nom']."','".$_POST['race']."','".$_POST['terrain']."','100','100','100','100','".$_SESSION['id_utilisateur']."')";
    echo $requete3;
    // Exécution de la requête SQL
    $resultat3 = $pdo->exec($requete3);

    if($resultat3 === false){
        echo "Erreur lors de la création de l'animal";
    }
    else{
       
        header('location: ../gestion/gestion.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="creation.css">
    <title>Document</title>
</head>
<body>    
    <div class="container">
        <header class="header">
        <h1 
            id ="title" 
            class="text-center">Creation de votre chien
            <? echo $_SESSION['id']; ?>
        </h1>
        <p 
            id="description" 
            class="description text-center">Veuillez chosir les caractéristique de votre chien
        </p>
        </header>

        <form method="post" id="survey-form">
            <div class="form-group">
                <label 
                id="name-lable" 
                for="name">
                Nom
                </label>
                <input 
                type="text" 
                name="nom" 
                id="name" 
                class="form-control" 
                placeholder=" Nom" 
                required />
            </div>

            <div class="form-group">
              <p>
                Races
             </p>
            <select id="dropdown" name="race" class="role-control" >
                 <?php
                     $requete = "SELECT * FROM Races";
                     $resultat = $pdo->query($requete);
                     while ($race = $resultat->fetch()) 
                     {
                        echo '<option value="' . $race['id'] . '">' . $race['nom'] . '</option>';
                     }
                 ?>
            </select>
          </div>

          <div class="form-group">
            <p>
                Terrain
            </p>
            <select id="dropdown" name="terrain" class="role-control" required>
                <?php
                    $requete2 = "SELECT * FROM Terrains";
                    $resultat2 = $pdo->query($requete2);
                    while ($terrain = $resultat2->fetch()) {
                        echo '<option value="' . $terrain['id'] . '">' . $terrain['nom'] . '</option>';
                    }
                ?>
            </select>
          </div>
          <div class="form-group">
        <button 
        type="submit" 
        id="submit" 
        class="submit-button"
        name="creation"
        value="Créer">
          Créer
        </button>
      </div>
    </form>

</div>
</body>
</html>
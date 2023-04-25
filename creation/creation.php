<?php
session_start();
include ("../bdd/bdd.php");

$id_utilisateur = $_SESSION['id_utilisateur'];

if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    
    header('location: ../connexion/connexion.php');
    exit;
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
    
<head>
        <title>
            sample Survey Form
        </title>
        <link 
        href ="style2.css" 
        type ="text/css" 
        rel ="stylesheet">
    </head>
    <div class="container">
        <header class="header">
        <h1 
            id ="title" 
            class="text-center">Creation de votre chien
        </h1>
        <p 
            id="description" 
            class="description text-center">Veuillez chosir les caractéristique de votre chien
        </p>
        </header>

        <form id="survey-form">
            <div class="form-group">
                <label 
                id="name-lable" 
                for="name">
                Nom
                </label>
                <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                placeholder=" Nom" 
                required />
            </div>

            
            <div class="form-group">
                <p>
                    Races
                </p>
                <select
                id="dropdown"
                name="jobclass"
                class="role-control"
                required>
                <option disabled selected value>
                    Race
                </option>

                
                </select>
            </div>

           

          
           

            <div class="form-group">
                <button
                type="submit"
                id="submit"
                class="submit-button">
                Créer 
                </button>
            </div>

        </form>
    </div>

</html>
</body>
</html>
<?php
session_start();
include ("../bdd/bdd.php");

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
                <label 
                id="number-label" 
                for="number">
                Age
                </label>
                <input 
                type="number" 
                name="age" 
                id="number" 
                min="10" 
                max="99" 
                class="form-control" 
                placeholder="Age" />
            </div>
            <div class="form-group">
                <p>
                    Sexe
                </p>
                <label>
                    <input
                    name="gender"
                    value="male"
                    type="radio"
                    class="input-radio"
                    checked
                    />mâle
                </label>
                <label>
                    <input
                    name="gender"
                    value="female"
                    type="radio"
                    class="input-radio"
                    checked
                    />Femelle 
                </label>
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

                <option value="swordsman">
                    Swordsman
                </option>

                <option value="archer">
                    Archer
                </option>

                <option value="mage">
                    Mage
                </option>

                <option value="acolyte">
                    Acolyte
                </option>

                <option value="thief">
                    Thief
                </option>

                <optinon value="merchant">
                    Merchant
                </optinon>
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
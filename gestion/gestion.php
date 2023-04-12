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
    <link rel="stylesheet" type="text/css" href="gestion.css">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>

<?php

try // Connexion à la BDD sur PHPMyAdmin
    {
       
      include ("../bdd/bdd.php");


    if(isset($_POST['connexion']))
    {
      
      $requete1 = "SELECT * FROM `Utilisateurs` WHERE `login`='".$_POST['login']."'AND `password`= SHA2('".$_POST['password']."', 256);";


        $resultat=$pdo->query($requete1);

        if($resultat->rowCount()>0)
        {
          
        }
        else
        {
            
        }
    }
}catch(Exception $error)
{
    $error->getMessage();
}

?>

<head>
  <title>acceuille</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Acceuille</h1>
    <h1>Exemple</h1>
    <div class="filter-container">
    </div>
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Race</th>
          <th>Santé</th>
          <th>Bonheur</th>
          <th>Faim</th>
          <th>Propreté</th>
        </tr>
      </thead>
      <tbody>
        <tr class="iPhone X">
          <td>iPhone X</td>
          <td>Silver</td>
          <td>Silver</td>
          <td>Silver</td>
          <td>Silver</td>
          <td>Silver</td>
          
       
      </tbody>
    </table>
  </div>
  <h1>Vos animaux</h1>
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Race</th>
          <th>Santé</th>
          <th>Bonheur</th>
          <th>Faim</th>
          <th>Propreté</th>
        </tr>
      </thead>
      <tbody>
        <tr class="iPhone-X">
        <td>iPhone X</td>
          <td>Silver</td>
          <td>Silver</td>
          <td>Silver</td>
          <td>Silver</td>
          <td>Silver</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>

</html>
</body>

</html>
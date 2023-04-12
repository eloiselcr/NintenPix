<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>NintenWish - Inscription</title>
</head>
<body>

    <?php

    try
    {
        $ipserver="192.168.1.57";
        $base="nintendogs";
        $login="root";
        $password="root";
        $pdo = new PDO('mysql:host='.$ipserver.';dbname='.$base.'',$login,$password);
    
        if(isset($_POST['inscription'])){
    if($_POST['confpassword'] == $_POST['password'])
    {
    if(isset($_POST['inscription']))
    {
        
            $requete1 = "INSERT INTO `Utilisateurs`(`login`, `password`) VALUES ('".$_POST['login']."',SHA2('".$_POST['password']."', 256))";

            $resultat=$pdo->query($requete1);
        }
    }else
    {
        echo"Les entrées de password ne correspondent pas.";
    }
}
}catch(Exception $error)
{
    $error->getMessage();
}
if(isset($_POST['connexion']))
{
    header('location: ../connexion/connexion.php');
}
    ?>
<div class="center">
  <div class="ear ear--left"></div>
  <div class="ear ear--right"></div>
  <div class="face">
    <div class="eyes">
      <div class="eye eye--left">
        <div class="glow"></div>
      </div>
      <div class="eye eye--right">
        <div class="glow"></div>
      </div>
    </div>
    <div class="nose">
      <svg width="38.161" height="22.03">
        <path d="M2.017 10.987Q-.563 7.513.157 4.754C.877 1.994 2.976.135 6.164.093 16.4-.04 22.293-.022 32.048.093c3.501.042 5.48 2.081 6.02 4.661q.54 2.579-2.051 6.233-8.612 10.979-16.664 11.043-8.053.063-17.336-11.043z" fill="#243946"></path>
      </svg>
      <div class="glow"></div>
    </div>
    <div class="mouth">
      <svg class="smile" viewBox="-2 -2 84 23" width="84" height="23">
        <path d="M0 0c3.76 9.279 9.69 18.98 26.712 19.238 17.022.258 10.72.258 28 0S75.959 9.182 79.987.161" fill="none" stroke-width="3" stroke-linecap="square" stroke-miterlimit="3"></path>
      </svg>
      <div class="mouth-hole"></div>
      <div class="tongue breath">
        <div class="tongue-top"></div>
        <div class="line"></div>
        <div class="median"></div>
      </div>
    </div>
  </div>
  <div class="hands">
    <div class="hand hand--left">
      <div class="finger">
        <div class="bone"></div>
        <div class="nail"></div>
      </div>
      <div class="finger">
        <div class="bone"></div>
        <div class="nail"></div>
      </div>
      <div class="finger">
        <div class="bone"></div>
        <div class="nail"></div>
      </div>
    </div>
    <div class="hand hand--right">
      <div class="finger">
        <div class="bone"></div>
        <div class="nail"></div>
      </div>
      <div class="finger">
        <div class="bone"></div>
        <div class="nail"></div>
      </div>
      <div class="finger">
        <div class="bone"></div>
        <div class="nail"></div>
      </div>
    </div>
  </div>
  <div class="login">
    <form method="post" >
      <div class="fa fa-phone"></div>
      <input class="username" type="text" autocomplete="on" placeholder="Login" name="login"/>
      
      <div class="fa fa-commenting"></div>
      <input class="password" type="password" autocomplete="off" placeholder="Password" name="password" />
      <input class="password" type="password" autocomplete="off" placeholder="Confirmer Password" name="confpassword" />
      
    <input type="submit" class="login-button" name="connexion" value="Connexion"/>
    <input type="submit" class="login-button" name="inscription" value="Inscription"/>
  </form>
  
  
 
</body>
<script src='inscription.js'></script>
</html>
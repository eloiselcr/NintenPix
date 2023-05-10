<?php
    $ipserver="192.168.1.57";
    $basename="nintendogs";
    $login="root";
    $password="root";
    $pdo = new PDO('mysql:host='.$ipserver.';dbname='.$basename.'',$login,$password);
?>
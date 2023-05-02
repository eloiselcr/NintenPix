<?php
    $ipserver="192.168.1.57";
    $base="nintendogs";
    $login="root";
    $password="root";
    $pdo = new PDO('mysql:host='.$ipserver.';dbname='.$base.'',$login,$password);
?>
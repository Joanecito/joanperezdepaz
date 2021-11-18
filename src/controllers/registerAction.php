<?php

//establecer errores
//ini_set('display_errors', 'On');
require 'config.php';
require 'lib/conn.php';

if (isset($_POST['email']) and isset($_POST['passwd']) and isset($_POST['nom']) and isset($_POST['rol'])) {

    try {
        
        $email = $_POST['email'];
        $password = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        $nom = $_POST['nom'];
        $rol = $_POST['rol'];

        
        $gdb = getConnection($dsn, $dbuser, $dbpasswd);

       
        $stmt = $gdb->prepare("INSERT INTO usuaris(email,nom,contrasenya,rol) VALUES(:email,:nom,:contrasenya,:rol)");
        $stmt->execute([":email" => $email, ":nom" => $nom, ":contrasenya" => $password, ":rol" => $rol]);

        
        $stmt = $gdb->prepare("SELECT * FROM usuaris WHERE email=:email AND contrasenya=:contrasenya");
        $stmt->execute([":email" => $email, ":contrasenya" => $password]);

        
        $rows = $stmt->fetchAll();

        
        if ($rows != null) {
            if (!isset($_COOKIE["regCorrecte"])) {
                setcookie("regCorrecte", true, time()+60*60*24*30, "/");
            }
            
            header('location:?url=login');
        } else {
            
            header('location:?url=register');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    if (!isset($_COOKIE["errorReg"])) {
        setcookie("errorReg", true, time()+60*60*24*30, "/");
    }
    header('location:?url=register');
}
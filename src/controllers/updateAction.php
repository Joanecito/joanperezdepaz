<?php

//establecer errores
//ini_set('display_errors', 'On');
require 'config.php';
require 'lib/conn.php';


$email = $_SESSION["emailUser"];


if ($_POST['nomUpdate'] != "") {

    try {
      
        $newName = $_POST['nomUpdate'];

        
        $gdb = getConnection($dsn, $dbuser, $dbpasswd);

        
        $stmt = $gdb->prepare("UPDATE usuaris SET nom=:nom WHERE email=:email");
        $stmt->execute([":nom" => $newName, ":email" => $email]);

        
        setcookie("activeUser", $newName, time() + 60 * 60 * 24 * 30, "/");         

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else if ((isset($_POST['passwdUpdate']) and isset($_POST['passwdUpdateDoubleCheck']))
    and $_POST['passwdUpdate'] == $_POST['passwdUpdateDoubleCheck']
) {
    try {
   
        $newPasswd = $_POST['passwdUpdate'];
        $newPasswdHash = password_hash($newPasswd, PASSWORD_DEFAULT);

       
        $gdb = getConnection($dsn, $dbuser, $dbpasswd);

        
        $stmt = $gdb->prepare("UPDATE usuaris SET contrasenya=:contrasenya WHERE email=:email");
        $stmt->execute([":contrasenya" => $newPasswdHash, ":email" => $email]);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    
    if (!isset($_COOKIE["errorUpdate"])) {
        setcookie("errorAuth", true, time() + 60 * 60 * 24 * 30, "/");
    }
}
header('location:?url=perfil');
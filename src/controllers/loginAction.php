<?php

//establecer errores
//ini_set('display_errors', 'On');
require 'config.php';
require 'lib/conn.php';


if (isset($_POST['email']) and isset($_POST['passwd'])) {

    try {
       
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        $guardar = $_POST['guarda'];

        //em connecto a la BBDD
        $gdb = getConnection($dsn, $dbuser, $dbpasswd);

        
        $stmt = $gdb->prepare("SELECT * FROM usuaris WHERE email=?;");
        $stmt->execute([$email]);

        
        $rows = $stmt->fetchAll();

        
        $contrasenyacorrecta = password_verify($password, $rows[0]['contrasenya']);

        
        if ($contrasenyacorrecta) {
            
            if (!isset($_COOKIE["activeUser"])) {
                setcookie("activeUser", $rows[0]["nom"], time()+60*60*24*30, "/");
            }
            
            if (isset($_COOKIE["errorAuth"])) {
                
                setcookie("errorAuth", null, time()+60*60*24*30, "/");
            }
            if (!isset($_COOKIE["guarda"]) and $guardar) {
                setcookie("guarda", true, time()+60*60*24*90, "/");
                if (!isset($_COOKIE["passwdUser"])) {
                    setcookie("passwdUser", $rows[0]["contrasenya"], time()+60*60*24*30, "/");
                }
                if (!isset($_COOKIE["emailUser"])) {
                    setcookie("emailUser", $email, time()+60*60*24*90, "/");
                }
                
            } else  if(isset($_COOKIE["guarda"]) and !$guardar){
                
                setcookie("guarda", null, time()+60*60*24*90, "/");
            }
            if (!isset($_SESSION["emailUser"])) {
                $_SESSION["emailUser"] = $email;
            }
            if (!isset($_SESSION["idUser"])) {
                $_SESSION["idUser"] = $rows[0]["id"];
            }
            if (!isset($_SESSION["rolUser"])) {
                $_SESSION["rolUser"] = $rows[0]["rol"];
            }
            
            header('location:?url=dashboard');
        } else {
            
            if (!isset($_COOKIE["errorAuth"])) {
                setcookie("errorAuth", true, time()+60*60*24*30, "/");
            }
            header('location:?url=login');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    
    if (!isset($_COOKIE["errorAuth"])) {
        setcookie("errorAuth", true, time()+60*60*24*30, "/");
    }
    header('location:?url=login');
}
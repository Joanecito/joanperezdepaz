<?php
//esborrem les cookies que existeixen i enviem l'usuari al login

if (isset($_COOKIE["guarda"])) {
    
    $hoy = date("F j, Y, g:i a");
    if (!isset($_COOKIE["ultimaConexion"])) {
        setcookie("ultimaConexion", $hoy, time() + 60 * 60 * 24 * 30, "/");
    }
} else {
    
    if (isset($_COOKIE["passwdUser"])) {
        setcookie("passwdUser", null, time() + 60 * 60 * 24 * 30, "/");
    }
    if (isset($_COOKIE["emailUser"])) {
        setcookie("emailUser", null, time() + 60 * 60 * 24 * 30, "/");
    }
    if (isset($_COOKIE["activeUser"])) {
        setcookie("activeUser", null, time() + 60 * 60 * 24 * 30, "/");
    }
}

if (isset($_COOKIE["errorAuth"])) {
    
    setcookie("errorAuth", null, time() + 60 * 60 * 24 * 30, "/");
}

if (isset($_COOKIE["errorReg"])) {
    
    setcookie("errorReg", null, time() + 60 * 60 * 24 * 30, "/");
}

if (isset($_COOKIE["regCorrecte"])) {
    
    setcookie("regCorrecte", null, time() + 60 * 60 * 24 * 30, "/");
}
session_destroy();

header('location:?url=login');
<?php

//borramos las COOKIES

if (isset($_COOKIE["passwdUser"])) {
    setcookie("passwdUser", null, time() + 60 * 60 * 24 * 30, "/");
}
if (isset($_COOKIE["emailUser"])) {
    setcookie("emailUser", null, time() + 60 * 60 * 24 * 30, "/");
}
if (isset($_COOKIE["activeUser"])) {
    setcookie("activeUser", null, time() + 60 * 60 * 24 * 30, "/");
}
if (isset($_COOKIE["guarda"])) {
    setcookie("guarda", null, time() + 60 * 60 * 24 * 30, "/");
}
if (isset($_COOKIE["ultimaConexion"])) {
    setcookie("ultimaConexion", null, time() + 60 * 60 * 24 * 30, "/");
}

header('location:?url=login');
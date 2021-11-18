
<?php
require 'config.php';

    function getConnection(string $dsn, string $dbuser, string $dbpasswd){
        //code

        $gdb=new PDO($dsn,$dbuser,$dbpasswd);
        //$gbd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //$gbd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $gdb;
    }
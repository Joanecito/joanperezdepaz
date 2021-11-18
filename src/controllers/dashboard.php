<?php

//establecer errores
//ini_set('display_errors', 'On');
require APP . '/lib/render.php';
require 'config.php';
require 'lib/conn.php';


$user = $_SESSION["idUser"];
try {

    
    $gdb = getConnection($dsn, $dbuser, $dbpasswd);

    
    $stmt = $gdb->prepare("SELECT id FROM lists WHERE userId=?;");
    $stmt->execute([$user]);

    
    $rows = $stmt->fetchAll();

    
    $nLlistes = count($rows);

    
    $hiHaTasques = false;

    if ($rows != null) {
        if ($nLlistes == 1) {
            $llista = $rows[0];
            
            $gdb = getConnection($dsn, $dbuser, $dbpasswd);

            
            $stmt = $gdb->prepare("SELECT item, completed FROM taskItems WHERE listId=?;");
            $stmt->execute([$llista[0]]);

            
            $llistatTasques[0] = $stmt->fetchAll();

            
            if (count($llistatTasques[0]) != 0) {
                $hiHaTasques = true;
            }
        } else {
            
            for ($i = 0; $i < $nLlistes; $i++) {
                $llista = $rows[$i][0];
                
                $gdb = getConnection($dsn, $dbuser, $dbpasswd);

                
                $stmt = $gdb->prepare("SELECT item, completed FROM taskItems WHERE listId=?;");
                $stmt->execute([$llista]);

                
                $llistatTasques[$i] = $stmt->fetchAll();

                
                if (count($llistatTasques[$i]) != 0) {
                    $hiHaTasques = true;
                }
            }
        }
    } 

    //fem el render i enviem les dades de les tasques per realitzar
    echo render('dashboard', ['llistatTasques' => $llistatTasques, 'nom' => 'DASHBOARD', 'quedenTasques' => $hiHaTasques]);
} catch (PDOException $e) {
    echo $e->getMessage();
}
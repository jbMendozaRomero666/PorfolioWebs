<?php


function conectarDB() : mysqli
{
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices');

    if (!$db) { ///quito el true por que es implicita 
        echo 'error al conectarse a la base de datos';
        exit;
    }
    return $db;
}
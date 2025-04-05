<?php

//neue Instanz der Klasse PDO; dient zum Erstellen einer Verbindung 
try{
$pdo = new PDO('mysql:host=localhost;dbname=parkplatz-vermietung','root','');
}

catch(PDOException $e) {
    echo "Keine Verbindung zur Datenbank";
    die();
}
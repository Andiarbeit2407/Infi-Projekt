<?php

//neue Instanz der Klasse PDO; dient zum Erstellen einer Verbindung zur Datenbank
try {
$pdo = new PDO('mysql:host=localhost;dbname=Busfahrplan', 'root', '');
}
catch (PDOException $e) {
    echo "Keine Verbindung zur Datenbank (aber wieso???)";
    die();

}
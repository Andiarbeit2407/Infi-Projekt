<?php

require __DIR__ . '/../connect/connect.php';
/** @var TYPE_NAME $pdo */
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $standort = $_POST['standort'];
    $kapazitaet = $_POST['kapazitaet'];
    $preis_pro_stunde = $_POST['preis_pro_stunde'];
    $verfuegbar = $_POST['verfuegbar'];
    //Aufruf der Methode prepare()  auf das Objekt $pdo
    $stmt = $pdo->prepare('INSERT INTO `parkplatz` ( `standort`, `kapazitaet`, `preis_pro_stunde`, `verfuegbar`)
        VALUES ( :standort, :kapazitaet, :preis_pro_stunde, :verfuegbar)');

    $stmt->bindValue(':standort', $standort);
    $stmt->bindValue(':kapazitaet', $kapazitaet);
    $stmt->bindValue(':preis_pro_stunde', $preis_pro_stunde);
    $stmt->bindValue(':verfuegbar', $verfuegbar);

    //Sicherheitsfeature gegen MySQL-Injections
    //  $stmt->bindValue(':id', $_GET['id']);

    //Ausführen des SQL-Statements von oben
    $stmt->execute();
    header('location:./index.php');
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkoplatz Erstellen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../view/style.css">

</head>
<body>
    <div class="container">
        <h1>Parkoplatz Erstellen</h1>
        <form action="" method="POST">
            <label for="standort">location:</label>
            <input type="text" id="standort" name="standort" required>
            <br>
            <label for="kapazitaet">capaciti:</label>
            <input type="text" id="kapazitaet" name="kapazitaet" step="0.01" required>
            <br>
            <label for="preis_pro_stunde">price per hour:</label>
            <input type="date_time" id="preis_pro_stunde" name="preis_pro_stunde" step="0.01" required>
            <br>
            <label for="verfuegbar">availible:</label>
            <input type="date_time" id="verfuegbar" name="verfuegbar" step="0.01" required>
            <br>
            <button type="submit" class="button"><i class="fas fa-plus"></i>erstello :D</button>
        </form>
        <div class="action-buttons">
            <a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i> Zurück</a>
        </div>
    </div>
</body>
</html>
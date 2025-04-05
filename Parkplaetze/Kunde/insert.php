<?php

require __DIR__ . '/../connect/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $telefonnummer = $_POST['telefonnummer'];
    $registrierungsdatum = date("Y-m-d H:i:s");
    //Aufruf der Methode prepare()  auf das Objekt $pdo
    /** @var TYPE_NAME $pdo */
    $stmt = $pdo->prepare('INSERT INTO `kunde` (`vorname`, `nachname`, `email`, `telefonnummer`, `registrierungsdatum`)
    VALUES (:vorname, :nachname, :email, :telefonnummer, :registrierungsdatum)');


    $stmt->bindValue(':vorname', $vorname);
    $stmt->bindValue(':nachname', $nachname);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':telefonnummer', $telefonnummer);
    $stmt->bindValue(':registrierungsdatum', $registrierungsdatum);

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
    <title>Kundus Hinzufügus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../view/style.css">

</head>
<body>
<div class="container">
    <h1>add customer</h1>
    <form action="" method="POST">
        <label for="vorname">Vorname:</label>
        <input type="text" id="vorname" name="vorname" required>
        <br>
        <label for="nachname">Nachname:</label>
        <input type="text" id="nachname" name="nachname" step="0.01" required>
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" step="0.01" required>
        <br>
        <label for="telefonnummer">Telefonnummer:</label>
        <input type="text" id="telefonnummer" name="telefonnummer" step="0.01" required>
        <br>
        <button type="submit" class="button"><i class="fas fa-plus"></i> Kunde hinzufügen</button>
    </form>
    <div class="action-buttons">
        <a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i> Zurück</a>
    </div>
</div>
</body>
</html>
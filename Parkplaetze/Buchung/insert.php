<?php

require __DIR__ . '/../connect/connect.php';
/** @var TYPE_NAME $pdo */
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $kunde_id = $_POST['kunde_id'];
    $parkplatz_id = $_POST['parkplatz_id'];
    $startzeit = $_POST['startzeit'];
    $endzeit = $_POST['endzeit'];
    $buchungszeit = time();
    //Aufruf der Methode prepare()  auf das Objekt $pdo
    $stmt = $pdo->prepare('INSERT INTO `buchung` (`id`, `kunde_id`, `parkplatz_id`, `startzeit`, `endzeit`, `buchungszeit`)
        VALUES (:id, :kunde_id, :parkplatz_id, :startzeit, :endzeit, :buchungszeit)');

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':kunde_id', $kunde_id);
    $stmt->bindValue(':parkplatz_id', $parkplatz_id);
    $stmt->bindValue(':startzeit', $startzeit);
    $stmt->bindValue(':endzeit', $endzeit);
    $stmt->bindValue(':buchungszeit', $buchungszeit);

    //Sicherheitsfeature gegen MySQL-Injections
    //  $stmt->bindValue(':id', $_GET['id']);

    //Ausführen des SQL-Statements von oben
    $stmt->execute();
    header('location:./skiverleih.php');
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
        <h1>Buchungus Hinzufügus</h1>
        <form action="" method="POST">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required>
            <br>
            <label for="kunde_id">Kunden ID:</label>
            <input type="text" id="kunde_id" name="kunde_id" required>
            <br>
            <label for="parkplatz_id">Parkplatz ID:</label>
            <input type="text" id="parkplatz_id" name="parkplatz_id" step="0.01" required>
            <br>
            <label for="startzeit">Start Zeit:</label>
            <input type="date_time" id="startzeit" name="startzeit" step="0.01" required>
            <br>
            <label for="endzeit">End Zeit:</label>
            <input type="date_time" id="endzeit" name="endzeit" step="0.01" required>
            <br>
            <button type="submit" class="button"><i class="fas fa-plus"></i> Buchung erstellen</button>
        </form>
        <div class="action-buttons">
            <a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i> Zurück</a>
        </div>
    </div>
</body>
</html>
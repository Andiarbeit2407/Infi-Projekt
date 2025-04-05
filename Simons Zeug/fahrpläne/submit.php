<?php

require dirname(__DIR__) . '/connect/connect.php';
/** @var TYPE_NAME $pdo */
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $haltestelle_id = $_POST['haltestelle_id'];
    $fahrt_id = $_POST['fahrt_id'];
    $ankunftszeit = $_POST['ankunftszeit'];
    $abfahrtszeit = $_POST['abfahrtszeit'];
    
    //Aufruf der Methode prepare() auf das Objekt $pdo
    $stmt = $pdo->prepare('INSERT INTO `fahrzeit` (`id`, `haltestelle_id`, `fahrt_id`, `ankunftszeit`, `abfahrtszeit`) VALUES (:id,:haltestelle_id,:fahrt_id, :abfahrtszeit, :abfahrtszeit)');
    
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':haltestelle_id', $haltestelle_id);
    $stmt->bindValue(':fahrt_id', $fahrt_id);
    $stmt->bindValue(':ankunftszeit', $ankunftszeit);
    $stmt->bindValue(':abfahrtszeit', $abfahrtszeit);

    $stmt->execute();

    header('location:./index.php');
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haltestelle Hinzufügen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../view/style.css"></head>
<body>
    <form action="" method="POST">
    <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br><br>

    <label for="haltestelle_id">ID der Haltestelle:</label>
        <input type="text" id="haltestelle_id" name="haltestelle_id" required>
        <br><br>
        
        <label for="fahrt_id">ID der Fahrt:</label>
        <input type="number" id="fahrt_id" name="fahrt_id" step="1" required>
        <br><br>

        <label for="ankunftszeit">Ankunftszeit:</label>
        <input type="time" id="ankunftszeit" name="ankunftszeit" step="1" required>
        <br><br>

        <label for="abfahrtszeit">Abfahrtszeit:</label>
        <input type="time" id="abfahrtszeit" name="abfahrtszeit" step="1" required>
        <br><br>
        
        <button type="submit" class="btn btn-primary">Speichern</button>
    </form>
</body>
</html>

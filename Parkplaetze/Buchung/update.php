<?php

require __DIR__ . '/../connect/connect.php';
/** @var TYPE_NAME $pdo */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if updateId is set
    if (isset($_GET['updateId'])) {
        $id = $_GET['updateId'];
        $kunde_id = $_POST['kunde_id'];
        $parkplatz_id = $_POST['parkplatz_id'];
        $startzeit = $_POST['startzeit'];
        $endzeit = $_POST['endzeit'];

        try {
            // Prepare the SQL statement
            $stmt = $pdo->prepare('UPDATE `buchung` SET `kunde_id` = :kunde_id, `parkplatz_id` = :parkplatz_id, `startzeit` = :startzeit, `endzeit` = :endzeit WHERE `id` = :id');

            // Bind values
            $stmt->bindValue(':kunde_id', $kunde_id);
            $stmt->bindValue(':parkplatz_id', $parkplatz_id);
            $stmt->bindValue(':startzeit', $startzeit);
            $stmt->bindValue(':endzeit', $endzeit);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); // Ensure ID is treated as an integer

            // Execute statement
            if ($stmt->execute()) {
                header('Location: ./index.php'); // Redirect to the home page after update
                exit;
            } else {
                echo "Error updating the data.";
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buchung Ändern</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <div class="container">
        <h1>Buchung Ändern</h1>
        <form action="" method="POST">
            <label for="kunde_id">Kunden ID:</label>
            <input type="text" id="kunde_id" name="kunde_id" required>
            <br>
            <label for="parkplatz_id">Parkplatz ID:</label>
            <input type="text" id="parkplatz_id" name="parkplatz_id" required>
            <br>
            <label for="startzeit">Start Zeit:</label>
            <input type="date_time" id="startzeit" name="startzeit" required>
            <br>
            <label for="endzeit">End Zeit:</label>
            <input type="date_time" id="endzeit" name="endzeit" required>
            <br>
            <button type="submit" class="button"><i class="fas fa-save"></i> Buchung aktualisieren</button>
        </form>

        <div class="action-buttons">
            <a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i> Zurück</a>
        </div>
    </div>
</body>
</html>

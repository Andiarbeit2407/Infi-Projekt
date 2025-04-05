<?php

require __DIR__ . '/../connect/connect.php';
/** @var TYPE_NAME $pdo */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if updateId is set
    if (isset($_GET['updateId'])) {
        $id = $_GET['updateId'];
        $standort = $_POST['standort'];
        $kapazitaet = $_POST['kapazitaet'];
        $preis_pro_stunde = $_POST['preis_pro_stunde'];
        $verfuegbar = $_POST['verfuegbar'];

        try {
            // Prepare the SQL statement
            $stmt = $pdo->prepare('UPDATE `parkplatz` SET `standort` = :standort, `kapazitaet` = :kapazitaet, `preis_pro_stunde` = :preis_pro_stunde, `verfuegbar` = :verfuegbar WHERE `id` = :id');

            // Bind values
            $stmt->bindValue(':standort', $standort);
            $stmt->bindValue(':kapazitaet', $kapazitaet);
            $stmt->bindValue(':preis_pro_stunde', $preis_pro_stunde);
            $stmt->bindValue(':verfuegbar', $verfuegbar);
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
    <title>Parkplatz anpapassen</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <div class="container">
        <h1>Parkplatz anpapassen</h1>
        <form action="" method="POST">
            <label for="standort">Standort:</label>
            <input type="text" id="standort" name="standort" required>
            <br>
            <label for="kapazitaet">Kapazität:</label>
            <input type="text" id="kapazitaet" name="kapazitaet" required>
            <br>
            <label for="preis_pro_stunde">Preis pro Stunde:</label>
            <input type="text" id="preis_pro_stunde" name="preis_pro_stunde" required>
            <br>
            <label for="verfuegbar">Verfügbar:</label>
            <input type="checkbox" id="verfuegbar" name="verfuegbar" required>
            <br>
            <button type="submit" class="button"><i class="fas fa-save"></i> Parkplatz aktualisieren</button>
        </form>

        <div class="action-buttons">
            <a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i> Zurück</a>
        </div>
    </div>
</body>
</html>

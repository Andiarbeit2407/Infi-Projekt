<?php

require __DIR__ . '/../connect/connect.php';
/** @var TYPE_NAME $pdo */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if updateId is set
    if (isset($_GET['updateId'])) {
        $id = $_GET['updateId'];
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $email = $_POST['email'];
        $telefonnummer = $_POST['telefonnummer'];

        try {
            // Prepare the SQL statement
            $stmt = $pdo->prepare('UPDATE `kunde` SET `nachname` = :nachname, `vorname` = :vorname, `email` = :email, `telefonnummer` = :telefonnummer WHERE `id` = :id');

            // Bind values
            $stmt->bindValue(':nachname', $nachname);
            $stmt->bindValue(':vorname', $vorname);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':telefonnummer', $telefonnummer);
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
    <title>Kundus Änderus</title>
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <div class="container">
        <h1>Kundus Änderus</h1>
        <form action="" method="POST">
            <label for="nachname">Nachname:</label>
            <input type="text" id="nachname" name="nachname" required>
            <br>
            <label for="vorname">Vorname:</label>
            <input type="text" id="vorname" name="vorname" required>
            <br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <br>
            <label for="telefonnummer">Telefonnummer:</label>
            <input type="text" id="telefonnummer" name="telefonnummer" required>
            <br>
            <button type="submit" class="button"><i class="fas fa-save"></i> Kunde bearbeiten</button>
        </form>

        <div class="action-buttons">
            <a href="index.php" class="back-button"><i class="fas fa-arrow-left"></i> Zurück</a>
        </div>
    </div>
</body>
</html>

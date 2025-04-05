<?php

include('../Connect/connect.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>

<h1>Willkommen auf der Startseite!</h1>

<div class="container">
    <a href="../Kunde/index.php" class="action-buttons">Kunden</a>
    <a href="../Parkplatz/index.php" class="action-buttons">Parkplätze</a>
    <a href="../Buchung/index.php" class="action-buttons">Buchungen</a>
</div>

</body>
</html>


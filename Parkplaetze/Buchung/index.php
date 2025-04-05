<?php

require dirname(__DIR__) . '/Connect/connect.php';
/** @var TYPE_NAME $pdo */
//Aufruf der Methode prepare()  auf das Objekt $pdo
$stmt = $pdo->prepare("SELECT * FROM `buchung`");

//Sicherheitsfeature gegen MySQL-Injections
//  $stmt->bindValue(':id', $_GET['id']);

//Ausführen des SQL-Statements von oben
$stmt->execute();

//Hohlen der Datensätze (nur als key/value-Paare = assoziatives Array)
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//ausführen der Datehsätze
//  var_dump($results);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parkplatz-Vermietung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <div class="container">
        <h1>Buchung</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kunde_ID</th>
                    <th>Parkplatz_ID</th>
                    <th>Startzeit</th>
                    <th>Endzeit</th>
                    <th>Buchungszeit</th>
                    <th>Entfernen</th>
                    <th>Bearbeiten</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($results as $result): ?>
                    <tr>
                        <td><?php echo $result['id'] ?></td>
                        <td><?php echo $result['kunde_id'] ?></td>
                        <td><?php echo $result['parkplatz_id'] ?></td>
                        <td><?php echo $result['startzeit'] ?></td>
                        <td><?php echo $result['endzeit'] ?></td>
                        <td><?php echo $result['buchungszeit'] ?></td>
                        <td><a href="./delete.php?deleteId=<?php echo $result['id']?>" class="delete"><i class="fas fa-trash"></i></a></td>
                        <td><a href="./update.php?updateId=<?php echo $result['id']?>" class="update"><i class="fas fa-edit"></i></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="insert.php" class="add-button">Buchung erstellen</a>
        <a href="../Startseite/Startseite.php" class="back-button"><i class="fas fa-arrow-left"></i> Zurück</a>
    </div>
</body>
</html>

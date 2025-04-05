<?php

require dirname(__DIR__) . '/Connect/connect.php';
/** @var TYPE_NAME $pdo */
//Aufruf der Methode prepare()  auf das Objekt $pdo
$stmt = $pdo->prepare("SELECT * FROM `parkplatz`");

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
        <h1>Parkplatz</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Standort</th>
                    <th>Kapazität</th>
                    <th>Preis pro Stunde</th>
                    <th>Verfügbar</th>
                    <th>Entfernen</th>
                    <th>Bearbeiten</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($results as $result): ?>
                    <tr>
                        <td><?php echo $result['id'] ?></td>
                        <td><?php echo $result['standort'] ?></td>
                        <td><?php echo $result['kapazitaet'] ?></td>
                        <td><?php echo $result['preis_pro_stunde'] ?></td>
                        <td><?php echo $result['verfuegbar'] ?></td>
                        <td><a href="./delete.php?deleteId=<?php echo $result['id']?>" class="delete"><i class="fas fa-trash"></i></a></td>
                        <td><a href="./update.php?updateId=<?php echo $result['id']?>" class="update"><i class="fas fa-edit"></i></a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a href="insert.php" class="add-button">Parkplatz erstellen</a>
        <a href="../Startseite/Startseite.php" class="back-button">Zurück</a>
    </div>
</body>
</html>
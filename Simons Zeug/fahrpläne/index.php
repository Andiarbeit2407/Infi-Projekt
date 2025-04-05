<?php

require dirname(__DIR__) . '/connect/connect.php';

//Aufruf der Methode prepare() auf das Objekt $pdo
/** @var TYPE_NAME $pdo */
$stmt = $pdo->prepare("SELECT * FROM `fahrzeit`");

//Sicherheitsfeature gegen MySQL-Injections
//$stmt->bindValue(':id', $_GET['id']);

//Ausführen des SQL-Statements von oben (SELECT ...)
$stmt->execute();

//Holen der Datensätze (nur als key/value-Paare = assoziatives Array)
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Ausgabe der Datensätze
//var_dump($results);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busfarhplan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../view/style.css">
</head>
<body>
    <h1>Busfahrplan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Haltestelle</th>
                <th>Fahrt</th>
                <th>Ankunft</th>
                <th>Abfahrt</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($results as $result): ?>
            <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['haltestelle_id'] ?></td>  
                <td><?php echo $result['fahrt_id'] ?></td>
                <td><?php echo $result['ankunftszeit'] ?></td>
                <td><?php echo $result['abfahrtszeit'] ?></td>
                <td><a href="delete.php?deleteId=<?php echo $result['id'] ?>">Delete</a></td>
                <td><a href="update.php?updateId=<?php echo $result['id'] ?>">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button><a href="submit.php">Haltestelle Hinzufügen</a></button>
</body>
</html>
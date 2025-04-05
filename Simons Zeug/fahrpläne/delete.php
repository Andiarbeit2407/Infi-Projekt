<?php

require dirname(__DIR__) . '/connect/connect.php';
/** @var TYPE_NAME $pdo */
if(isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    echo "deleteId auf " . $id . " gesetzt";
    
    $stmt = $pdo->prepare('DELETE FROM `fahrzeit` WHERE `id`=:id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('location:./index.php');
}

?>
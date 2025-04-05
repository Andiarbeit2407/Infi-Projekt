<?php

require dirname(__DIR__) . '/Connect/connect.php';
/** @var TYPE_NAME $pdo */
if(isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    $stmt = $pdo->prepare("DELETE FROM `kunde` WHERE `id` = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    header('location:./index.php');
}

?>
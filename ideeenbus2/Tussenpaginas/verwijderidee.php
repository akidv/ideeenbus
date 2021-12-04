<?php

session_start();

//Check connectie met db.
$conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
if (!$conn) {
    header("location: ../Webpaginas/error.php");
    exit();
}

$ideeId = $_POST["id"];

$stmt = mysqli_prepare($conn, "DELETE FROM ideeen WHERE ideeId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $ideeId);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn, "DELETE FROM stemmen WHERE ideeId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $ideeId);
mysqli_stmt_execute($stmt);


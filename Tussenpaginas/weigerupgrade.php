<?php

session_start();

//Check connectie met db.
$conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
if (!$conn) {
    header("location: ../Webpaginas/home.php");
    exit();
}

$id = $_POST["id"];
$stmt = mysqli_prepare($conn, "UPDATE berichten SET berichtAntwoord = 2 WHERE berichtId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
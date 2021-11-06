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

$stmt = mysqli_prepare($conn, "SELECT verstuurderId FROM berichten WHERE berichtId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $resultVerstuurderId);
mysqli_stmt_fetch($stmt);

$stmt = mysqli_prepare($conn, "UPDATE gebruikers SET gebruikerProfielstatus = 2 WHERE gebruikerId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $resultVerstuurderId);
mysqli_stmt_execute($stmt);
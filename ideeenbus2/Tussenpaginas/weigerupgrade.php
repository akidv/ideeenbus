<?php

session_start();

//Check connectie met db.
$conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
if (!$conn) {
    header("location: ../Webpaginas/error.php");
    exit();
}

$id = $_POST["id"];

$stmt = mysqli_prepare($conn, "SELECT verstuurderId FROM berichten WHERE berichtId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $verstuurderId);
mysqli_stmt_fetch($stmt);

$stmt = mysqli_prepare($conn, "UPDATE berichten SET berichtHoeveelheidReacties = berichtHoeveelheidReacties + 1 WHERE verstuurderId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $verstuurderId);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn, "SELECT * FROM berichten WHERE berichtId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
mysqli_stmt_bind_result($stmt, $berichtId, $ontvangerId, $verstuurderId, $berichtTekst, $berichtDatum, $berichtAntwoord, $berichtHoeveelheidOntvangers, $berichtHoeveelheidReacties, $berichtScore);
mysqli_stmt_fetch($stmt);

if ($berichtHoeveelheidReacties != $berichtHoeveelheidOntvangers) {
} else if ($berichtHoeveelheidOntvangers == $berichtHoeveelheidReacties) {
    $stmt = mysqli_prepare($conn, "DELETE FROM berichten WHERE verstuurderId = ? ;");
    mysqli_stmt_bind_param($stmt, 'i', $verstuurderId);
    mysqli_stmt_execute($stmt);
} else {
    header("location: ../Webpaginas/error.php");
}

$stmt = mysqli_prepare($conn, "DELETE FROM berichten WHERE berichtId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);


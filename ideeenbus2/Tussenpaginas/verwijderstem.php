<?php

session_start();

//Check connectie met db.
$conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
if (!$conn) {
    header("location: ../Webpaginas/error.php");
    exit();
}

$stemId = $_POST["id"];
$stmt = mysqli_prepare($conn, "UPDATE ideeen SET ideeHoeveelheidStemmen = ideeHoeveelheidStemmen - 1 WHERE ideeId = ? ;");
mysqli_stmt_bind_param($stmt, 'i', $stemId);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn, "DELETE FROM stemmen WHERE gebruikerId = ? AND ideeId = ? ;");
mysqli_stmt_bind_param($stmt, 'ii', $_SESSION["gebruikerId"], $stemId);
mysqli_stmt_execute($stmt);

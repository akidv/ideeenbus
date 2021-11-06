<?php

session_start();

if (!isset($_SESSION["gebruikerId"])) {

} else {

    if (!isset($_POST["submitWachtwoordWijzigen"])) {

    } else {

        $oWachtwoord = htmlspecialchars($_POST["oudwachtwoord"]);
        $nWachtwoord = htmlspecialchars($_POST["nieuwwachtwoord"]);
        $nWachtwoordHerhaald = htmlspecialchars($_POST["nieuwherhaaldwachtwoord"]);

        $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
        if (!$conn) {
            header("location: ../Webpaginas/profielaanpassen.php?error=verbindingsfout");
            exit();
        }

        if (empty($oWachtwoord) || empty($nWachtwoord) || empty($nWachtwoordHerhaald)) {
            header("location: ../Webpaginas/wachtwoordwijzigen.php?error=leegVeld");
            exit();
        } else if ($nWachtwoord !== $nWachtwoordHerhaald) {
            header("location: ../Webpaginas/wachtwoordwijzigen.php?error=wachtwoordVerkeerd");
            exit();
        }

        $stmt = mysqli_prepare($conn, "SELECT gebruikerWachtwoord FROM gebruikers WHERE gebruikerId = ?;");
        mysqli_stmt_bind_param($stmt, 'i', $_SESSION["gebruikerId"] );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $resultWachtwoord);
        mysqli_stmt_fetch($stmt);
        $checkWachtwoord = password_verify($oWachtwoord, $resultWachtwoord);
        if ($checkWachtwoord === false) {
            header("location: ../Webpaginas/wachtwoordwijzigen.php?error=wachtwoordVerkeerd");
            exit();
        } else {
            $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
            $stmt = mysqli_prepare($conn, "UPDATE gebruikers SET gebruikerWachtwoord = ? WHERE gebruikerId = ?;");
            $hashedWachtwoord = password_hash($nWachtwoord, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, 'si', $hashedWachtwoord, $_SESSION["gebruikerId"]);
            mysqli_stmt_execute($stmt);

            header("location: ../Webpaginas/profielaanpassen.php");
            exit();
        }
    }
}

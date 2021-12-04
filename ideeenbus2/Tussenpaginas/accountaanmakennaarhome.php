<?php
session_start();

if (isset($_POST["submitAccAanmaken"])) {

    //Gegevens uit formulier.
    $voornaam = htmlspecialchars($_POST["voornaam"]);
    $achternaam = htmlspecialchars($_POST["achternaam"]);
    $email = htmlspecialchars($_POST["emailadres"]);
    $wachtwoord = htmlspecialchars($_POST["wachtwoord"]);
    $wachtwoordHerhaald = htmlspecialchars($_POST["wachtwoordHerhaald"]);
    $accAanmaakDatum = date("Y-m-d H:i:s");

    //Check connectie met db.
    $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
    if (!$conn) {
        header("location: ../Webpaginas/accountaanmaken.php?error=verbindingsfout");
        exit();
    }

    //Checken op foute input. 
    if ((preg_match("/[A-Z]/", $wachtwoord)) && (preg_match("/[a-z]/", $wachtwoord)) && 
    (preg_match("/\d/", $wachtwoord)) && (preg_match("/[-+_!@#$%^&*., ?]/", $wachtwoord))) {
        $strongpassword = true;
    } else {
        $strongpassword = false;
    }
    if (empty($voornaam) || empty($achternaam) || empty($email) || empty($wachtwoord) || empty($wachtwoordHerhaald)) {
        header("location: ../Webpaginas/accountaanmaken.php?error=leegVeld");
        exit();
    } else if (!preg_match("/^[a-zA-Z -]*$/", $voornaam)) {
        header("location: ../Webpaginas/accountaanmaken.php?error=ongeldigeNaam");
        exit();
    } else if (!preg_match("/[^ -]/", $voornaam)) {
        header("location: ../Webpaginas/accountaanmaken.php?error=ongeldigeNaam");
        exit();
    } else if (!preg_match("/^[a-zA-Z -]*$/", $achternaam)) {
        header("location: ../Webpaginas/accountaanmaken.php?error=ongeldigeNaam");
        exit();
    } else if (!preg_match("/[^ -]/", $achternaam)) {
        header("location: ../Webpaginas/accountaanmaken.php?error=ongeldigeNaam");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../Webpaginas/accountaanmaken.php?error=ongeldigeEmail");
        exit();
    } else if (strlen($wachtwoord) < 8) {
        header("location: ../Webpaginas/accountaanmaken.php?error=wachtwoordVerkeerd");
        exit();
    } else if ($strongpassword === false) {
        header("location: ../Webpaginas/accountaanmaken.php?error=wachtwoordVerkeerd");
        exit();
    } else if ($wachtwoord !== $wachtwoordHerhaald) {
        header("location: ../Webpaginas/accountaanmaken.php?error=wachtwoordVerkeerd");
        exit();
    }   else if (!isset($_POST["accepterenVoorwaarden"])) {
        header("location: ../Webpaginas/accountaanmaken.php?error=voorwaarden");
        exit();
    }

    //Checken of emailadres al in gebruik is.
    $stmt = mysqli_prepare($conn, "SELECT gebruikerEmail FROM gebruikers WHERE gebruikerEmail = ?;");
    mysqli_stmt_bind_param($stmt, 's', $email );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        header("location: ../Webpaginas/accountaanmaken.php?error=emailBestaat");
        exit();
    }

    //Gegevens toevoegen aan db.
    $stmt = mysqli_prepare($conn, "INSERT INTO 
    gebruikers(gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerWachtwoord, gebruikerProfielstatus, gebruikerProfielAanmaakDatum) VALUES(?, ?, ?, ?, ?, ?)");
    $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    $profielstatus = 1;
    mysqli_stmt_bind_param($stmt, "ssssis", $voornaam, $achternaam, $email, $hashedWachtwoord, $profielstatus, $accAanmaakDatum);
    mysqli_stmt_execute($stmt);

    //Gegevens ophalen uit db.
    $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
    gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
    gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerEmail = ?;");
    mysqli_stmt_bind_param($stmt, 's', $email );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultId, $resultVoornaam, $resultAchternaam, 
    $resultEmail, $resultProfielstatus, $resultProfielAanmaakDatum);
    mysqli_stmt_fetch($stmt);
    
    //Gegevens omzetten naar sessie waarden.
    $_SESSION["gebruikerId"] = $resultId;
    $_SESSION["gebruikerVoornaam"] = $resultVoornaam;
    $_SESSION["gebruikerAchternaam"] = $resultAchternaam;
    $_SESSION["gebruikerEmail"] = $resultEmail;
    $_SESSION["gebruikerProfielstatus"] = $resultProfielstatus;
    $_SESSION["gebruikerProfielAanmaakDatum"] = $resultProfielAanmaakDatum;

    header("location: ../Webpaginas/home.php");

} else {
    header("location: ../Webpaginas/start.php");
    exit();
}
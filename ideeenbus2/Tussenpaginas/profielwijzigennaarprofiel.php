<?php

session_start();

if (!isset($_SESSION["gebruikerId"])) {
    header("location: ../Webpaginas/error.php");
} else {

    $voornaam = htmlspecialchars($_POST["voornaam"]);
    $achternaam = htmlspecialchars($_POST["achternaam"]);

    $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
    if (!$conn) {
        header("location: ../Webpaginas/error.php");
        exit();
    }

    if (empty($voornaam) || empty($achternaam)) {
        header("location: ../Webpaginas/profielaanpassen.php?error=leegVeld");
        exit();
    } else if (!preg_match("/^[a-zA-Z -]*$/", $voornaam)) {
        header("location: ../Webpaginas/profielaanpassen.php?error=ongeldigeNaam");
        exit();
    } else if (!preg_match("/[^ -]/", $voornaam)) {
        header("location: ../Webpaginas/profielaanpassen.php?error=ongeldigeNaam");
        exit();
    } else if (!preg_match("/^[a-zA-Z -]*$/", $achternaam)) {
        header("location: ../Webpaginas/profielaanpassen.php?error=ongeldigeNaam");
        exit();
    } else if (!preg_match("/[^ -]/", $achternaam)) {
        header("location: ../Webpaginas/profielaanpassen.php?error=ongeldigeNaam");
        exit();
    }

    //Gegevens toevoegen aan db.
    $stmt = mysqli_prepare($conn, 'UPDATE gebruikers SET gebruikerVoornaam = ?, gebruikerAchternaam = ? WHERE gebruikerId = ?;');
    mysqli_stmt_bind_param($stmt, "ssi", $voornaam, $achternaam, $_SESSION["gebruikerId"]);
    mysqli_stmt_execute($stmt);

    //Gegevens ophalen.
    $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
    gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
    gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerEmail = ?;");
    mysqli_stmt_bind_param($stmt, 's', $_SESSION["gebruikerEmail"] );
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

    header("location: ../Webpaginas/profiel.php?id=".$_SESSION["gebruikerId"]);
    exit();
}

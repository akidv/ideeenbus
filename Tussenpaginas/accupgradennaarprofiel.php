<?php 
session_start();
if (!isset($_SESSION["gebruikerId"])) {

} else {

    //Check connectie met db.
    $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
    if (!$conn) {
        header("location: ../Webpaginas/home.php");
        exit();
    }

    if ($_SESSION["gebruikerProfielstatus"] == 1) {

        $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
        gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
        gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerProfielstatus = 2 LIMIT 1;");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $resultId, $resultVoornaam, $resultAchternaam, 
        $resultEmail, $resultProfielstatus, $resultProfielAanmaakDatum);

        while (mysqli_stmt_fetch($stmt)) {
            $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
            if (!$conn) {
                header("location: ../Webpaginas/home.php");
                exit();
            }

            $ontvanger = $resultId;
            $verstuurder = $_SESSION["gebruikerId"];
            $berichtDatum = date("Y-m-d H:i:s"); 
            $bericht = $_SESSION["gebruikerVoornaam"].' '.$_SESSION["gebruikerAchternaam"].
            ' wil administrator worden! Toestaan of weigeren?';
            $berichtAntwoord = 1;

            $stmt = mysqli_prepare($conn, "INSERT INTO 
            berichten(ontvangerId, verstuurderId, berichtTekst, berichtDatum, berichtAntwoord) VALUES(?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "iissi", $ontvanger, $verstuurder, $bericht, $berichtDatum, $berichtAntwoord);
            mysqli_stmt_execute($stmt);

        }

    } else if ($_SESSION["gebruikerProfielstatus"] == 2) {

        $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
        gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
        gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerProfielstatus = 3 LIMIT 3;");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $resultId, $resultVoornaam, $resultAchternaam, 
        $resultEmail, $resultProfielstatus, $resultProfielAanmaakDatum);

        while (mysqli_stmt_fetch($stmt)) {
            $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
            if (!$conn) {
                header("location: ../Webpaginas/home.php");
                exit();
            }

            $ontvanger = $resultId;
            $verstuurder = $_SESSION["gebruikerId"];
            $berichtDatum = date("Y-m-d H:i:s"); 
            $bericht = $_SESSION["gebruikerVoornaam"].' '.$_SESSION["gebruikerAchternaam"].
            ' wil superadministrator worden! Toestaan of weigeren?';
            $berichtAntwoord = 1;

            $stmt = mysqli_prepare($conn, "INSERT INTO 
            berichten(ontvangerId, verstuurderId, berichtTekst, berichtDatum, berichtAntwoord) VALUES(?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "iissi", $ontvanger, $verstuurder, $bericht, $berichtDatum, $berichtAntwoord);
            mysqli_stmt_execute($stmt);

        }

    } else {

    }
}
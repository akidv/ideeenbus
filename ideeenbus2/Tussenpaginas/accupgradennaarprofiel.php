<?php 
session_start();
if (!isset($_SESSION["gebruikerId"])) {

} else {

    //Check connectie met db.
    $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
    if (!$conn) {
        header("location: ../Webpaginas/error.php");
        exit();
    }

    if ($_SESSION["gebruikerProfielstatus"] == 1) {

        $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
        gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
        gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerProfielstatus = 2 LIMIT 3;");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $resultId, $resultVoornaam, $resultAchternaam, 
        $resultEmail, $resultProfielstatus, $resultProfielAanmaakDatum);
        mysqli_stmt_store_result($stmt);
        $berichtHoeveelheidOntvangers = mysqli_stmt_num_rows($stmt);

        while (mysqli_stmt_fetch($stmt)) {
            $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
            if (!$conn) {
                header("location: ../Webpaginas/error.php");
                exit();
            }

            $ontvanger = $resultId;
            $verstuurder = $_SESSION["gebruikerId"];
            $berichtDatum = date("Y-m-d H:i:s"); 
            $bericht = $_SESSION["gebruikerVoornaam"].' '.$_SESSION["gebruikerAchternaam"].
            ' wil administrator worden! Toestaan of weigeren?';
            $berichtAntwoord = 1;
            $berichtHoeveelheidReacties = 0;
            $berichtScore = 0;

            $stm = mysqli_prepare($conn, "INSERT INTO 
            berichten(ontvangerId, verstuurderId, berichtTekst, berichtDatum, berichtAntwoord, berichtHoeveelheidOntvangers, berichtHoeveelheidReacties) VALUES(?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stm, "iissiii", $ontvanger, $verstuurder, $bericht, $berichtDatum, $berichtAntwoord, $berichtHoeveelheidOntvangers, $berichtHoeveelheidReacties);
            mysqli_stmt_execute($stm);
            
        }

        header("location: ../Webpaginas/profiel.php?id=".$_SESSION["gebruikerId"]);

    } else if ($_SESSION["gebruikerProfielstatus"] == 2) {

        header("location: ../Webpaginas/error.php");
        exit();

    } else {
        header("location: ../Webpaginas/error.php");
        exit();
    }
}
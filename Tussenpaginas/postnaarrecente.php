<?php 
session_start();
if (isset($_POST["submitIdee"])) {
    //session_start();
    if (isset($_SESSION["gebruikerId"])) {

        //Gegevens uit formulier.
        //misschien specialcharsvar voor tekst idee!?!?
        $ideeTekst = $_POST["tekstIdee"];
        $ideeOnderwerp = $_POST["domeinIdee"];
        $ideeStemmen = 0;
        $ideeDatum = date("Y-m-d H:i:s");
        $ideeGebruikerId = $_SESSION["gebruikerId"];;

        //Check connectie met db.
        $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
        if (!$conn) {
            header("location: ../Webpaginas/accountaanmaken.php?error=verbindingsfout");
            exit();
        }

        //Gegevens toevoegen aan db.
        $stmt = mysqli_prepare($conn, "INSERT INTO 
        ideeen(ideeTekst, ideeOnderwerp, ideeHoeveelheidStemmen, ideeAanmaakDatum, 
        gebruikerId) VALUES(?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssisi", $ideeTekst, $ideeOnderwerp, $ideeStemmen, $ideeDatum, $ideeGebruikerId);
        mysqli_stmt_execute($stmt);

        header("location: ../Webpaginas/recenteideeen.php");
        exit();
    }
}
<?php
session_start();
if (isset($_POST["submitInloggen"])) {

    //Gegevens uit formulier.
    $emailInlog = htmlspecialchars($_POST["emailadresI"]);
    $wachtwoordInlog = htmlspecialchars($_POST["wachtwoordI"]);

    //Check connectie met db.
    $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
    if (!$conn) {
        header("location: ../Webpaginas/accountaanmaken.php?error=verbindingsfout");
        exit();
    }

    //Ingevulde wachtwoord checken met db.
    $stmt = mysqli_prepare($conn, "SELECT gebruikerWachtwoord FROM gebruikers WHERE gebruikerEmail = ?;");
    mysqli_stmt_bind_param($stmt, 's', $emailInlog );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultWachtwoord);
    mysqli_stmt_fetch($stmt);
    $checkWachtwoord = password_verify($wachtwoordInlog, $resultWachtwoord);
    if ($checkWachtwoord === false) {
        header("location: ../Webpaginas/inlog.php?error=loginverkeerd");
        exit();
    }
    else if ($checkWachtwoord === true) {

        $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
        if (!$conn) {
            header("location: ../Webpaginas/accountaanmaken.php?error=verbindingsfout");
            exit();
        }

        //Gegevens ophalen uit db.
        $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
        gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
        gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerEmail = ?;");
        mysqli_stmt_bind_param($stmt, 's', $emailInlog );
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
        exit();
    }

} else {
    header("location: ../Webpaginas/start.php");
    exit();
}
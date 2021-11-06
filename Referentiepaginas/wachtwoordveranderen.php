<?php

if (!isset($_SESSION["gebruikerId"])) {

} else {
    setlocale(LC_ALL, 'dutch');

    //Check connectie met db.
    $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
    if (!$conn) {
        header("location: ../Tussenpaginas/uitloggennaarstart.php");
        exit();
    }

    $wachtwoordwijzigen = '<div class="wachtwoordwijzigen"><p id="wijzigenwachtwoordTitelId">Wachtwoord wijzigen</p>'.

    '<form action="../Tussenpaginas/wachtwoordwijzigennaarprofiel.php" method="POST" id="formWachtwoordWijzigenId">
    <input type="password" class="standaardInput width100" name="oudwachtwoord" id="wachtwoordwijzigoud" placeholder="Huidige wachtwoord"><br>'.
    '<input type="password" class="standaardInput width100" name="nieuwwachtwoord" id="wachtwoordwijzignieuw" placeholder="Nieuw wachtwoord"><br>'.
    '<input type="password" class="standaardInput width100" name="nieuwherhaaldwachtwoord" id="wachtwoordwijzignieuwherhaald" placeholder="Herhaal nieuw wachtwoord"><br>'.
    '<input type="submit" class="standaardInput width100 hoverGroen" 
    name="submitWachtwoordWijzigen" value="Verander wachtwoord" id="submitWachtwoordWijzigenId"></form>';

    $wachtwoordwijzigen .= '<p class="margin0 padding10px"><a class="linkProfielAanpassen" href="../Webpaginas/profielaanpassen.php">Terug naar profiel aanpassen</a></p></div>';

    echo $wachtwoordwijzigen;
    
}
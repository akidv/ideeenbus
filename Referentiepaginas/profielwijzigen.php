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

    $profielwijzigen = '<div class="profielwijzigen"><p id="wijzigenTitelId">Profiel aanpassen</p>'.
    
    '<form action="../Tussenpaginas/profielwijzigennaarprofiel.php" method="POST" id="formProfielWijzigenId">
    <input type="text" class="standaardInput width100" name="voornaam" id="accWijzigenVoornaamId" placeholder="Voornaam" value="'.$_SESSION["gebruikerVoornaam"].
    '"><br><input type="text" class="standaardInput width100" name="achternaam" id="accWijzigenAchternaamId" placeholder="Achternaam" value="'.$_SESSION["gebruikerAchternaam"].'"><br>'.
    '<input type="submit" class="standaardInput width100 hoverGroen" 
    name="submitProfielWijzigen" value="Aanpassingen opslaan" id="submitProfielWijzigenId"></form>';

    $profielwijzigen .= '<p class="padding10px"><a class="linkProfielAanpassen" href="../Webpaginas/wachtwoordwijzigen.php">Wachtwoord wijzigen</a><br>';

    if (!isset($_SESSION["gebruikerProfielstatus"])) {
        exit();
    } else {
        if ($_SESSION["gebruikerProfielstatus"] == 1) {
            $profielwijzigen .= '<a class="linkProfielAanpassen" href="../Tussenpaginas/accupgradennaarprofiel.php" 
            onclick="return confirm(\'Weet u zeker dat u een verzoek wilt indienen voor een upgrade tot administrator?\')">Verzoek voor upgraden account</a><br>';

        } else {
            if ($_SESSION["gebruikerProfielstatus"] == 2) {
                $profielwijzigen .= '<a class="linkProfielAanpassen" href="../Tussenpaginas/accupgradennaarprofiel.php" 
            onclick="return confirm(\'Weet u zeker dat u een verzoek wilt indienen voor een upgrade tot administrator?\')">Verzoek voor upgraden account</a><br>';
                
            } else {
            }
        }
    }
    
    $profielwijzigen .= '<a class="linkProfielAanpassen" href="../Tussenpaginas/accverwijderennaarstart.php" 
    onclick="return confirm(\'Weet u zeker dat u uw account wil verwijderen?\')">Account verwijderen</a></p>'.'</div>';

    echo $profielwijzigen;
    
}
<?php

if (isset($_GET["error"])) {
    $error = $_GET["error"];
    if ($error == "leegVeld") {
        echo '<div class="error"><p id="leegVeldId">U moet alle velden invullen!</p></div>';
    } else if ($error == "ongeldigeNaam") {
        echo '<div class="error"><p id="ongeldigeNaamId">Ongeldige naam!</p></div>';
    } else if ($error == "ongeldigeEmail") {
        echo '<div class="error"><p id="ongeldigeEmailId">Ongeldige email!</p></div>';
    } else if ($error == "wachtwoordVerkeerd") {
        echo '<div class="error"><p id="wachtwoordVerkeerdId">Wachtwoord verkeerd!</p></div>';
    } else if ($error == "emailBestaat") {
        echo '<div class="error"><p id="emailBezetId">Email al in gebruik!</p></div>';
    } else if ($error == "loginverkeerd") {
        echo '<div class="error"><p id="loginVerkeerdId">Login gegevens kloppen niet!</p></div>';
    } /*else if ($error == "wachtwoordTeKort") {
        echo '<div class="error"><p id="loginVerkeerdId">Wachtwoord moet minimaal 8 tekens bevatten!</p></div>';
    } */
}
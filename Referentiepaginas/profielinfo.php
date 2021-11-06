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

    $id = $_GET["id"];
    
    //Hier moet nog veel gebeuren, voor vrijdag

    $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
    gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
    gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerId = ?;");
    mysqli_stmt_bind_param($stmt, 'i', $id );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultId, $resultVoornaam, $resultAchternaam, 
    $resultEmail, $resultProfielstatus, $resultProfielAanmaakDatum);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_fetch($stmt);

    if ($resultId != $id) {
        $profiel = '<p>ERROR</p>';
    } else {

        if ($resultProfielstatus == 1) {
            $status = 'Standaard profiel';
        } else if ($resultProfielstatus == 2) {
            $status = 'Administrator';
        } else {
            $status = 'onbekend';
        }

        $profiel = '<div class="profielGebruiker">'.
        '<p id="profielNaamId">'.$resultVoornaam.'&nbsp'.$resultAchternaam.'</p>';

        if (isset($_SESSION["gebruikerId"]) && ($_SESSION["gebruikerId"] == $id)) {
            $profiel .= '<p id="profielEmailId"><b>Email:</b> '.$resultEmail.'</p>';
        }

        $profiel .= '<p id="profielDatumId"><b>Account sinds:</b> '.ucwords(strftime("%d %B %Y", strtotime($resultProfielAanmaakDatum))).'</p>';

        if (isset($_SESSION["gebruikerId"]) && ($_SESSION["gebruikerId"] == $id)) {
            $profiel .= '<p id="profielType"><b>Account type:</b> '.$status.'</p>';
        }
        
        $profiel .= '</div>';
    }

    echo $profiel;

    if (isset($_SESSION["gebruikerId"]) && ($_SESSION["gebruikerId"] == $id)) {

        echo '<div class="berichtenGebruiker"><p id="profielBerichtenId">Berichten</p>';

        $stmt = mysqli_prepare($conn, "SELECT berichtId, ontvangerId, 
        verstuurderId, berichtTekst, berichtDatum, 
        berichtAntwoord FROM berichten 
        WHERE ontvangerId = ? ;");
        mysqli_stmt_bind_param($stmt, 'i', $_SESSION["gebruikerId"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $berichtId, $ontvangerId, $verstuurderId, $berichtTekst, $berichtDatum, $berichtAntwoord);
        mysqli_stmt_store_result($stmt);

        while (mysqli_stmt_fetch($stmt)) {
            if ($berichtAntwoord !== 1) {
                $b = "";
            } else {
                $sql = "SELECT gebruikerVoornaam, gebruikerAchternaam FROM gebruikers WHERE gebruikerId = ".$verstuurderId;
                $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $b = '<div class="bericht" id="bericht'.$berichtId
                .'"><p class="berichtenVerstuurder">Van: <b>'.$row["gebruikerVoornaam"].' '.$row["gebruikerAchternaam"].'</b></p>'.
                '<p class="berichtenTekst">'.$berichtTekst.'</p>'.
                '<p><button onclick="toestaanUpgradeAdministrator(this)" value="'.
                $berichtId.'">Toestaan</button></p><p><button onclick="weigerenUpgradeAdministrator(this)" value="'.
                $berichtId.'">Weigeren</button></p></div>';
            }
            echo $b;
        }


        echo '</div>';
    }

    echo '<div class="ideeenGebruiker"><p id="profielIdeeenId">Ideeën</p>';

    $stmt = mysqli_prepare($conn, "SELECT * FROM ideeen WHERE gebruikerId = ? ORDER BY ideeAanmaakDatum DESC LIMIT 10;");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ideeId, $ideeTekst, $ideeOnderwerp, $ideeHoeveelheidStemmen, $ideeAanmaakDatum, $gebruikerId );
    mysqli_stmt_store_result($stmt);

    while (mysqli_stmt_fetch($stmt)) {
        $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
        $sql = 'SELECT * FROM stemmen WHERE ideeId = '.$ideeId.' AND gebruikerId = '.$_SESSION["gebruikerId"].';';
        $stemmen = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($stemmen)>0) {
            $button = '<button class="stemKnop2" onclick="verwijderstem(this)" id="id'.
            $ideeId.'" value="'.
            $ideeId.'"><img class="stemAfbeelding" onmouseover="hoverStem(this)" onmouseout="unhoverStem(this)" 
            src="../Afbeeldingen/icoontjes/ideeenbusStemKlik.png" id="stemImg'.
            $ideeId.'"></img></button>';
        } else {
            $button = '<button class="stemKnop2" onclick="geefstem(this)" id="id'.
            $ideeId.'" value="'.
            $ideeId.'"><img class="stemAfbeelding" onmouseover="hoverStem(this)" onmouseout="unhoverStem(this)" 
            src="../Afbeeldingen/icoontjes/ideeenbusStemEmpty.png" id="stemImg'.
            $ideeId.'"></img></button>';
        }
        
        $achtergrondKleur = array('#ff891e', '#ff741e', '#ffb21e', '#ffa51e', '#ff531e', '#ff2d1e');
        $rand = rand(0, 5);
        $aKleur = $achtergrondKleur[$rand];
    
        $post = '<div style="background-color:'.$aKleur.'" class="post"><p class="width100 padding6px margin0">'.$ideeTekst.'</p><p class="widthFitContent paddingLeftRight6px displayInline margin0">'.
        $button.'</p><p class="widthFitContent floatRight paddingLeftRight6px displayInline margin0 colorLightGray">'.$ideeOnderwerp.'</p></div>';
        echo $post;
    }

    echo '</div>';

}

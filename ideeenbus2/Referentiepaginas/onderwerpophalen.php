<?php

//Verbinding checken
$conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
if (!$conn) {
    header("location: ../Webpaginas/error.php");
    exit();
}

if (isset($_GET["onderwerp"])) {

    $onderwerp = $_GET["onderwerp"];
    $onderwerpenArray = array('algemeen', 'fitness', 'gezondheid', 'catering', 'gebouw', 'roosters', 
    'activiteiten', 'studentenraad', 'afstandsleren', 'motivatie', 'docenten', 'lesinhoud');

    if (in_array($onderwerp, $onderwerpenArray)) {

        $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
        $stmt = mysqli_prepare($conn, "SELECT * FROM ideeen WHERE ideeOnderwerp = ? ORDER BY ideeAanmaakDatum DESC LIMIT 10;");
        mysqli_stmt_bind_param($stmt, 's', $onderwerp);
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

            if ($gebruikerId == $_SESSION["gebruikerId"]) {
                $buttonIdee = '<button class="verwijderIdeeKnop" onclick="verwijderIdee(this)" id="ideeId'.
                $ideeId.'" value="'.
                $ideeId.'">Verwijder</button>';
            } else if ($_SESSION["gebruikerProfielstatus"] == 2) {
                $buttonIdee = '<button class="verwijderIdeeKnop" onclick="verwijderIdee(this)" id="ideeId'.
                $ideeId.'" value="'.
                $ideeId.'">Verwijder</button>';
            } else if ($_SESSION["gebruikerProfielstatus"] == 3) {
                $buttonIdee = '<button class="verwijderIdeeKnop" onclick="verwijderIdee(this)" id="ideeId'.
                $ideeId.'" value="'.
                $ideeId.'">Verwijder</button>';
            } else {
                $buttonIdee = "";
            }
        
            if ($_SESSION["gebruikerProfielstatus"] == 2) {
                $buttonProfiel = '<button class="profielLinkPost" onclick="window.location.href=\'../Webpaginas/profiel.php?id='.$gebruikerId.'\'">Profiel</button>';
            } else if ($_SESSION["gebruikerProfielstatus"] == 3) {
                $buttonProfiel = '<button class="profielLinkPost" onclick="window.location.href=\'../Webpaginas/profiel.php?id='.$gebruikerId.'\'">Profiel</button>';
            } else {
                $buttonProfiel = "";
            }

            $achtergrondKleur = array('#ff891e', '#ff741e', '#ffb21e', '#ffa51e', '#ff531e', '#ff2d1e');
            $rand = rand(0, 5);
            $aKleur = $achtergrondKleur[$rand];

            $post = '<div style="background-color:'.$aKleur.'" class="post"><p class="width100 padding6px margin0">'.$ideeTekst.'</p><p class="widthFitContent floatLeft paddingLeftRight6px displayInline margin0">'.
            $button.'</p><p class="widthFitContent clearFloat lineheight30 paddingLeftRight6px displayInline margin0" id="'.$ideeId.'">'.
            $ideeHoeveelheidStemmen.'</p><p class="widthFitContent paddingLeftRight6px displayInline margin0">'.$ideeOnderwerp.'</p>'.
            '<p class="widthFitContent floatRight paddingLeftRight6px displayInline margin0">'.$buttonProfiel.'</p>'.
            '<p class="widthFitContent floatRight paddingLeftRight6px displayInline margin0">'.$buttonIdee.'</p>'.'</div>';
            echo $post;
        }
    } else {
        header("location: ../Webpaginas/error.php");
        exit();
    }
} else {
    header("location: ../Webpaginas/error.php");
    exit();
}
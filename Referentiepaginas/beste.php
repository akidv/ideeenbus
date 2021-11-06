<?php

//Verbinding checken
$conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
if (!$conn) {
    header("location: ../Webpaginas/accountaanmaken.php?error=verbindingsfout");
    exit();
}

//Meest gestemde posts ophalen.
$stmt = mysqli_prepare($conn, "SELECT * FROM ideeen ORDER BY ideeHoeveelheidStemmen DESC LIMIT 10;");
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $ideeId, $ideeTekst, $ideeOnderwerp, $ideeHoeveelheidStemmen, $ideeAanmaakDatum, $gebruikerId );
mysqli_stmt_store_result($stmt);

//Loopen door resultaten en meegeven opmaak.
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
    $button.'</p><p class="widthFitContent paddingLeftRight6px displayInline margin0" id="'.$ideeId.'">'.
    $ideeHoeveelheidStemmen.'</p><p class="widthFitContent floatRight paddingLeftRight6px displayInline margin0 colorLightGray">'.$ideeOnderwerp.'</p></div>';
    echo $post;
}
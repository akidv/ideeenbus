<?php

if (!isset($_SESSION["gebruikerId"])) {

} else {
    if (!isset($_GET["zoekopdracht"]) || $_GET["submitZoeken"] != "Zoek") {

    } else {
        if (empty($_GET["zoekopdracht"]) || empty($_GET["submitZoeken"])) {
            header("Location: javascript:history.back(-1)");
            exit();
        } else {

            $conn = mysqli_connect('localhost', 'root', '', 'ideeenbus2');
            if (!$conn) {
                header("location: ../Webpaginas/accountaanmaken.php?error=verbindingsfout");
                exit();
            }

            $zoek = htmlspecialchars($_GET["zoekopdracht"]);
            $zoekDatum = date("Y-m-d H:i:s");

            $stmt = mysqli_prepare($conn, 'INSERT INTO 
            zoekopdrachten(zoekTekst, zoekDatumOpdracht, gebruikerId) VALUES(?, ?, ?)');
            mysqli_stmt_bind_param($stmt, "sss", $zoek, $zoekDatum, $_SESSION["gebruikerId"]);
            mysqli_stmt_execute($stmt);

            $zoekStmt = '%'.$zoek.'%';
            $stmt = mysqli_prepare($conn, "SELECT gebruikerId, 
            gebruikerVoornaam, gebruikerAchternaam, gebruikerEmail, gebruikerProfielstatus, 
            gebruikerProfielAanmaakDatum FROM gebruikers WHERE gebruikerVoornaam LIKE ? OR gebruikerAchternaam LIKE ? LIMIT 3;");
            mysqli_stmt_bind_param($stmt, 'ss', $zoekStmt, $zoekStmt );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $resultId, $resultVoornaam, $resultAchternaam, 
            $resultEmail, $resultProfielstatus, $resultProfielAanmaakDatum);
            mysqli_stmt_store_result($stmt);
            echo '<div class="zoekGebruikers"><p id="zoekGebruikersId">Profielen op ideeënbus</p>';

            while (mysqli_stmt_fetch($stmt)) {
                $profielAanmaakDatum = ucwords(strftime("%d %B %Y", strtotime($resultProfielAanmaakDatum)));
                //gebruikers post 
                $post = '<div class="postGebruiker"><p><a href="profiel.php?id='.
                $resultId.'">'.$resultVoornaam.' '.$resultAchternaam.'</a></p><p>Account sinds: '.
                $profielAanmaakDatum.'</p></div>';
                echo $post;
            }

            echo '</div>';

            //Posts ophalen met gelijkenis.
            $stmt = mysqli_prepare($conn, "SELECT * FROM ideeen WHERE ideeTekst LIKE ? LIMIT 10;");
            mysqli_stmt_bind_param($stmt, 's', $zoekStmt);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $ideeId, $ideeTekst, $ideeOnderwerp, $ideeHoeveelheidStemmen, $ideeAanmaakDatum, $gebruikerId );
            mysqli_stmt_store_result($stmt);

            //Loopen door resultaten en meegeven opmaak.
            echo '<div class="zoekIdeeen"><p id="zoekIdeeenId">Ideeën</p>';

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
    }
}
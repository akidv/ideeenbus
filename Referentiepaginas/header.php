<div class="paginaFlexHeader">
    <div class="gridHeader"> 
        <div class="linksGridHeader">
            <?php
                if (isset($_SESSION["gebruikerId"])) {
                    echo '<a href="../Webpaginas/home.php"><img src="../Afbeeldingen/logo/LogoIdeeenbusOffZonderPunt.png" alt="logo Ideeënbus" class="logoIdeeenbus margin4px" "></a>';
                } else {
                    echo '<a href="../Webpaginas/start.php"><img src="../Afbeeldingen/logo/LogoIdeeenbusOffZonderPunt.png" alt="logo Ideeënbus" class="logoIdeeenbus margin4px" "></a>';
                }
            ?>
        </div>
        <div class="centerGridHeader">
            <?php
                if (isset($_SESSION["gebruikerId"])) {
                    echo '<form action="../Webpaginas/zoek.php" method="GET" id="formZoekenId">
                            <input type="text" class="" name="zoekopdracht" id="zoekbalkId" placeholder="Zoek">
                            <!--<input type="image" src="../Afbeeldingen/icoontjes/ideeenbusSearch.png" class="hoverGroen" name="submitZoeken" id="submitZoekenId" value="Zoek">-->
                            <input type="submit" class="hoverGroen" name="submitZoeken" id="submitZoekId" value="Zoek">
                          </form>';
                } else {
                    echo '<h1 class="ideeenbusTitel">Ideeënbus</h1>';
                }
            ?>
        </div>
        <div class="rechtsGridHeader">
            <?php
                if (isset($_SESSION["gebruikerId"])) {
                    echo '<p class="displayInline">'.$_SESSION["gebruikerEmail"].'</p>
                    <a href="../Tussenpaginas/uitloggenNaarStart.php" class="displayInline colorBlack" id="uitloggenHeaderId">Uitloggen</a>';
                } else {
                    echo '<a href="inlog.php" class="linkHeader" id="inloggenHeaderId">Inloggen</a>
                    <a href="accountAanmaken.php" class="linkHeader" id="accountAanmakenHeaderId">Account aanmaken</a>';
                }
            ?>
        </div>
        <?php  
            if (isset($_SESSION["gebruikerId"])) {
                echo '  <div class="mobielButtonsHeader">
                        <p class="linkMobielHeader fontSize9">'.$_SESSION["gebruikerEmail"].'</p>
                        <p class="linkMobielHeader fontWeightBold fontSize9"><a href="../Tussenpaginas/uitloggenNaarStart.php" id="uitloggenHeaderMobielId">Uitloggen</a></p>
                        </div>';
            } else {
                echo '<div class="mobielButtonsHeader"><a href="inlog.php" class="linkHeader fontSize9" id="inloggenHeaderMobielId">Inloggen</a>
                <a href="accountAanmaken.php" class="linkHeader fontSize9" id="accountAanmakenHeaderId">Account aanmaken</a></div>';
            }
        ?>
    </div>
</div>
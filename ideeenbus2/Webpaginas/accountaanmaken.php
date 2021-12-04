<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0">
        <div class="" id="accountAanmakenContainer">
            <p class="fontSize9 margin2px">Account aanmaken</p>
            <form action="../Tussenpaginas/accountaanmakennaarhome.php" method="POST" id="formAccAanmaken">
                <input type="text" class="standaardInput width100" name="voornaam" id="accAanmakenVoornaamId" placeholder="Voornaam" onkeydown="checknaam(this)" onkeyup="checknaam(this)"><br>
                <input type="text" class="standaardInput width100" name="achternaam" id="accAanmakenAchternaamId" placeholder="Achternaam" onkeydown="checknaam(this)" onkeyup="checknaam(this)"><br>
                <input type="email" class="standaardInput width100" name="emailadres" id="accAanmakenEmailId" placeholder="E-mailadres" onkeydown="checkemail(this)" onkeyup="checkemail(this)"><br>
                <input type="password" class="standaardInput width100" name="wachtwoord" id="accAanmakenWachtwoordId" placeholder="Wachtwoord" onkeydown="sterktewachtwoord(this)" onkeyup="sterktewachtwoord(this)"><br>
                <p class="margin0 fontSize9 colorGray widthFitContent displayInline">Uw wachtwoord is: </p><p class="margin0 fontSize9 widthFitContent displayInline colorGray" id="wachtwoordSterkteId"></p>
                <input type="password" class="standaardInput width100" name="wachtwoordHerhaald" id="accAanmakenWachtwoordherhaaldId" placeholder="Herhaal wachtwoord" onkeydown="sterktewachtwoordherhaald(this)" onkeyup="sterktewachtwoordherhaald(this)"><br>
                <input type="checkbox" class="standaardInput" name="accepterenVoorwaarden" id="accAanmakenAccepterenVoorwaardenId">
                <label for="accAanmakenAccepterenVoorwaardenId" class="fontSize9 colorGray">
                    Ik accepteer de <a href="gebruikersvoorwaarden.php" target="_blank" class="colorGray">gebruikersvoorwaarden</a>, de <a href="privacy.php" target="_blank" class="colorGray">privacyverklaring</a> en ben ouder dan 13 jaar.</label><br>
                <input type="submit" class="standaardInput width100 hoverGroen" 
                name="submitAccAanmaken" value="Account aanmaken" id="accAanmakenSubmitId"><br><br>
            </form>
            <?php include_once '../Referentiepaginas/errorsformulieren.php' ?>
        </div>
    </div>
</div>
    
<?php include_once '../Referentiepaginas/footer.php' ?>
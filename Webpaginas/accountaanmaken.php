<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0">
        <div class="" id="accountAanmakenContainer">
            <p class="fontSize9 margin2px">Account aanmaken</p>
            <form action="../Tussenpaginas/accountaanmakennaarhome.php" method="POST" id="formAccAanmaken">
                <input type="text" class="standaardInput width100" name="voornaam" id="accAanmakenVoornaamId" placeholder="Voornaam"><br>
                <input type="text" class="standaardInput width100" name="achternaam" id="accAanmakenAchternaamId" placeholder="Achternaam"><br>
                <input type="email" class="standaardInput width100" name="emailadres" id="accAanmakenEmailId" placeholder="E-mailadres"><br>
                <input type="password" class="standaardInput width100" name="wachtwoord" id="accAanmakenWachtwoordId" placeholder="Wachtwoord"><br>
                <input type="password" class="standaardInput width100" name="wachtwoordHerhaald" id="accAanmakenWachtwoordherhaaldId" placeholder="Herhaal wachtwoord"><br>
                <input type="submit" class="standaardInput width100 hoverGroen" 
                name="submitAccAanmaken" value="Account aanmaken" id="accAanmakenSubmitId"><br><br>
            </form>
            <?php include_once '../Referentiepaginas/errorsformulieren.php' ?>
        </div>
    </div>
</div>
    
<?php include_once '../Referentiepaginas/footer.php' ?>
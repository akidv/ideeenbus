<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="margin0">
        <div class="" id="inlogContainer">
            <p class="fontSize9 margin2px">Inloggen</p>
            <form action="../Tussenpaginas/inlognaarhome.php" method="POST" id="formInlog">
                <input type="email" class="standaardInput width100" name="emailadresI" id="inlogEmailId" placeholder="E-mailadres"><br>
                <input type="password" class="standaardInput width100" name="wachtwoordI" id="inlogWachtwoordId" placeholder="Wachtwoord"><br>
                <input type="submit" name="submitInloggen" 
                class="standaardInput hoverGroen width100" value="Inloggen" id="inlogSubmitId"><br><br>
            </form>
            <?php include_once '../Referentiepaginas/errorsformulieren.php' ?>
        </div>
    </div>
</div>

<?php include_once '../Referentiepaginas/footer.php' ?>
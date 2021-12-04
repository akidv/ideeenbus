<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0"> 
        <div class="" id="overonsContainer">
            <?php 
                if (isset($_SESSION["gebruikerId"])) {
                    include_once '../Referentiepaginas/navigatie.php'; 
                    echo '<div class="overonspagina margin4px">
                    <p class="overonstitel">Website voor ideeën en studenten</p>
                    <p class="overonstekst">Op deze website kunnen studenten hun ideeën posten. Ideeën om het onderwijs te verbeteren.</p>
                    <p class="">Deze website is gemaakt door Arend Kijk in de Vegte, als opdracht voor het Deltion.</p>
                    </div>';
                } else {
                    echo '<div class="overonspagina margin4px">
                    <p class="overonstitel">Website voor ideeën en studenten</p>
                    <p class="overonstekst">Op deze website kunnen studenten hun ideeën posten. Ideeën om het onderwijs te verbeteren.</p>
                    <p class="">Deze website is gemaakt door Arend Kijk in de Vegte, als opdracht voor het Deltion.</p>
                    </div>';
                }
            ?>
        </div>
    </div> 
</div>
        
<?php include_once '../Referentiepaginas/footer.php' ?>
<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0"> 
        <div class="" id="contactContainer">
            <?php 
                if (isset($_SESSION["gebruikerId"])) {
                    include_once '../Referentiepaginas/navigatie.php'; 
                    echo '<div class="contactpagina margin4px">
                    <p class="contacttitel">Contactgegevens</p>
                    <p class="contacttekst">Arend Kijk in de Vegte<br>
                    Email: xxx@xxx.nl<br>
                    Mobiel: 060011223344</p>
                    </div>';
                } else {
                    echo '<div class="contactpagina margin4px">
                    <p class="contacttitel">Contactgegevens</p>
                    <p class="contacttekst">Arend Kijk in de Vegte<br>
                    Email: xxx@xxx.nl<br>
                    Mobiel: 060011223344</p>
                    </div>';
                }
            ?>
        </div>
    </div> 
</div>
        
<?php include_once '../Referentiepaginas/footer.php' ?>
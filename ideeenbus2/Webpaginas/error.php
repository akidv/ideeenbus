<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0"> 
        <div class="" id="errorContainer">
            <?php 
                if (isset($_SESSION["gebruikerId"])) {
                    include_once '../Referentiepaginas/navigatie.php'; 
                } 
                echo '<div class="errorpagina margin4px"><p class="errorpaginabericht">Er is iets fout gegaan!</p></div>';
            ?>
        </div>
    </div> 
</div>

<?php include_once '../Referentiepaginas/footer.php' ?>
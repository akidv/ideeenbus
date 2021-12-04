<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0"> 
        <div class="" id="homeContainer">
            <?php include_once '../Referentiepaginas/navigatie.php'; ?>
            <div id="homeOnderwerpenId">
                <div class="homeOnderwerpenGridContainer" id="homeOnderwerpenGridContainerId">
                    <script src="../JS/homeonderwerpen.js"></script>
                    <script>onderwerpen();</script>
                </div>
            </div>
        </div>
    </div> 
</div>
        
<?php include_once '../Referentiepaginas/footer.php' ?>
<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0"> 
        <div class="" id="gebruikersvoorwaardenContainer">
            <?php 
                if (isset($_SESSION["gebruikerId"])) {
                    include_once '../Referentiepaginas/navigatie.php';   
                } 

                echo '<div class="gebruikersvoorwaardenpagina margin4px">
                <p class="gebruikersvoorwaardentitel">Gebruikersvoorwaarden</p>

                <p class="gebruikersvoorwaardentitel">Geen account, geen toegang</p>
                <p class="gebruikersvoorwaardentekst">Heeft u geen account, dan kan u geen Ideeënbus gebruiken. 
                Maakt u een account dan accepteert u de gebruikersvoorwaarden bij onze dienst. 
                Mocht u uw account gegevens kwijtraken of vergeten, dan moet u een nieuw account aanmaken. 
                Is uw account gestolen, neem dan zo snel mogelijk <a class="linkgebruikersvoorwaarden" href="../Webpaginas/contact.php">contact</a> op met Ideeënbus.</p>

                <p class="gebruikersvoorwaardentitel">Goede ideeën en slechte ideeën</p>
                <p class="gebruikersvoorwaardentekst">Ideeenbus is plek waar studenten ideeën kunnen delen. Gebruik dat niet het delen van ideeën is, wordt niet toegestaan.
                Toegestaan gebruik is het delen van een idee dat past bij het onderwijs en bij het toegewezen onderwerp. 
                Niet toegestaan gebruik omvat:
                <ul>
                    <li>Ideeën delen met verkeerd toegewezen onderwerp.</li>
                    <li>Ideeën delen die geen betrekking hebben op het onderwijs.</li>
                    <li>Ideeën delen die oproepen tot geweld of haat.</li>
                    <li>Ideeën delen die persoonsgegevens bevatten van mensen.</li>
                    <li>Ideeën delen die al eerder zijn gedeeld.</li>
                    <li>Ideeën delen die aansporen tot foutief gedrag.</li>
                    <li>Ideeën delen die producten of diensten promoten.</li>
                </ul> 
                Wanneer u toch een idee deelt dat niet is toegestaan, dan wordt u idee verwijderd en kan ook uw account worden verwijderd. 
                Uw profielgegevens zijn ook gebonden aan de genoemde eisen voor toegestaan en niet-toegestaan gebruik. 
                Ideeënbus mag op ieder moment uw ideeën en/of uw account verwijderen.
                </p>

                <p class="gebruikersvoorwaardentitel">Schade en aansprakelijkheid</p>
                <p class="gebruikersvoorwaardentekst">Ideeënbus is niet aansprakelijk voor enige schade die men oploopt door of tijdens het gebruik van zijn dienst.</p>

                <p class="gebruikersvoorwaardentitel">Data en privacy</p>
                <p class="gebruikersvoorwaardentekst">Voor onze privacyverklaring kunt u gaan naar: <a class="linkgebruikersvoorwaarden" href="../Webpaginas/privacy.php">privacyverklaring</a>.</p>

                <p class="gebruikersvoorwaardentekst">De gebruikersvoorwaarden van Ideeënbus kunnen op ieder moment worden gewijzigd en de meest recente versie van de gebruikersvoorwaarden geldt. 
                Mocht u vragen hebben of een andere opmerking dan kan u <a class="linkgebruikersvoorwaarden" href="../Webpaginas/contact.php">contact</a> opnemen met Ideeenbus.</p>

                </div>';
            ?>
        </div>
    </div> 
</div>
        
<?php include_once '../Referentiepaginas/footer.php' ?>

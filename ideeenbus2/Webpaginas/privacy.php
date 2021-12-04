<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0"> 
        <div class="" id="privacyContainer">
            <?php 
                if (isset($_SESSION["gebruikerId"])) {
                    include_once '../Referentiepaginas/navigatie.php'; 
                }
                echo '<div class="privacypagina margin4px">
                <p class="privacytitel">Privacy</p>

                <p class="privacytekst">Privacy is ontzettend belangrijk voor u en voor Ideeënbus. 
                Wij beschermen onze data en gaan verantwoord om met uw gegevens.</p>

                <p class="privacytitel">Uw gegevens</p>
                <p class="privacytekst">Wij slaan uw gegevens op in onze database. 
                Welke gegevens wij exact opslaan en waarom wij deze opslaan kan u vinden in ons <a href="verwerkingsregisterideeenbus.pdf" target="_blank" class="linkprivacy">verwerkingsregister</a>. 
                Ideeënbus gebruikt uw gegevens voor uw identificatie, het publiceren en ordenen van uw ideeën en voor het verbeteren van de gebruikerservaring. 
                Wij delen onze data niet met andere partijen. 
                Wij bewaren uw data voor 6 maanden tot één jaar na uw laatste login. 
                </p>

                <p class="privacytitel">Uw rechten</p>
                <p class="privacytekst">Als u een account heeft bij Ideeënbus, dan heeft u een aantal rechten. 
                Deze rechten zijn:
                <ul>
                    <li>Recht op rectificatie</li>
                    <li>Recht op vergetelheid</li>
                    <li>Recht op inzage</li>
                    <li>Recht op overdraagbaarheid</li>
                    <li>Recht op beperking van verwerking</li>
                    <li>Recht op stopzetten van verwerking.</li>
                </ul>
                U kan uw gegevens op ieder moment aanpassen en verwijderen. 
                Bij profiel aanpassen kunt u uw profielgegevens aanpassen en uw account verwijderen. 
                Wanneer uw account wordt verwijderd dan worden al uw gegevens bij Ideeënbus verwijderd.
                </p>

                <p class="privacytekst">
                Mocht u toch nog vragen of opmerkingen hebben over uw privacy? 
                Of wilt u uw gegevens laten aanpassen of verwijderen? 
                Dan kan u <a href="contact.pdf" class="linkprivacy">contact</a> opnemen met Ideeënbus.
                </p>

                <p class="privacytekst">
                Mocht u een klacht willen indienen bij de autoriteit persoonsgegevens, klik dan <a href="https://autoriteitpersoonsgegevens.nl/nl/zelf-doen/gebruik-uw-privacyrechten/klacht-melden-bij-de-ap" target="_blank" class="linkprivacy">hier</a>.
                </p>

                </div>';
            ?>
        </div>
    </div> 
</div>
        
<?php include_once '../Referentiepaginas/footer.php' ?>
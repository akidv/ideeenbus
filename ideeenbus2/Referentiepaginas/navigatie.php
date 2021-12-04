<div class="navGridContainer">
    <div class="linksGridNav ">
        <!--<button class="" onclick="naarLinksNav()" id="linksNavButtonId">L</button>-->
        <img id="linksNavButtonId" onclick="naarLinksNav()" src="../Afbeeldingen/icoontjes/ideeenbusLinks.png"></img>
    </div>
    <div class="centerGridNav overflowHidden" id="linksHome">
        <ul class="carouselLinks" id="lijstLinksNav">
            <li class="marginLeft0"><a href="home.php" >Home</a></li>
            <li class=""><a href="postidee.php" >Post idee</a></li>
            <li class=""><a href="recenteideeen.php" >Recente ideeën</a></li>
            <li class=""><a href="besteideeen.php" >Beste ideeën</a></li>
            <li class=""><a href="profiel.php?id=<?php echo $_SESSION["gebruikerId"]; ?>" >Profiel</a></li>
            <li class=""><a href="profielaanpassen.php" >Profiel aanpassen</a></li>
        </ul>
    </div>
    <div class="rechtsGridNav">
        <!--<button onclick="naarRechtsNav()" id="rechtsNavButtonId">R</button>-->
        <img id="rechtsNavButtonId" onclick="naarRechtsNav()" src="../Afbeeldingen/icoontjes/ideeenbusRechts.png"></img>
    </div>
</div>
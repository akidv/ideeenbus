let achtergrondStartAfbeeldingen = ['../Afbeeldingen/start/annie-spratt-QckxruozjRg-unsplash.jpg', 
'../Afbeeldingen/start/brooke-cagle--uHVRvDr7pg-unsplash.jpg', 
'../Afbeeldingen/start/skye-studios-NDLLFxTELrU-unsplash.jpg', 
'../Afbeeldingen/start/susan-q-yin-2JIvboGLeho-unsplash.jpg' ];

function achtergrondStart() {
    let index = Math.floor(Math.random() * 4);
    document.getElementById('afbeeldingStartId').
    innerHTML = '<img class="afbeeldingStart" src="'+achtergrondStartAfbeeldingen[index]+'" alt="Afbeelding startpagina"></img>';
}
 
function hoverStem(img) {
    let imgsrc = img.getAttribute('src');
    if (imgsrc == "../Afbeeldingen/icoontjes/ideeenbusStemEmpty.png") {
        img.setAttribute('src', '../Afbeeldingen/icoontjes/ideeenbusStemHover.png');
    }
}

function unhoverStem(img) {
    let imgsrc = img.getAttribute('src');
    if (imgsrc == '../Afbeeldingen/icoontjes/ideeenbusStemHover.png') {
        img.setAttribute('src', '../Afbeeldingen/icoontjes/ideeenbusStemEmpty.png');
    }
}

function geefstem(btn) {
    var stemImg = "stemImg"+btn.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        btn.setAttribute( "onclick", "verwijderstem(this)");
        document.getElementById(stemImg).src = "../Afbeeldingen/icoontjes/ideeenbusStemKlik.png";
    }
    xmlhttp.open("POST", "../Tussenpaginas/stem.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+btn.value);
}

function verwijderstem(btn) {
    var stemImg = "stemImg"+btn.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
        btn.setAttribute( "onclick", "geefstem(this)");
        document.getElementById(stemImg).src = "../Afbeeldingen/icoontjes/ideeenbusStemEmpty.png";
    }
    xmlhttp.open("POST", "../Tussenpaginas/verwijderstem.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+btn.value);
}

function toestaanUpgradeAdministrator(btn) {
    var bericht = "bericht"+btn.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {

        document.getElementById(bericht).parentNode.removeChild(document.getElementById(bericht));
    }
    xmlhttp.open("POST", "../Tussenpaginas/toestaanupgrade.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+btn.value);
}

function weigerenUpgradeAdministrator(btn) {
    var bericht = "bericht"+btn.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {

        document.getElementById(bericht).parentNode.removeChild(document.getElementById(bericht));
    }
    xmlhttp.open("POST", "../Tussenpaginas/weigerupgrade.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+btn.value);
} 
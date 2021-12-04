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
        document.getElementById(btn.value).innerHTML++;
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
        document.getElementById(btn.value).innerHTML--;
    }
    xmlhttp.open("POST", "../Tussenpaginas/verwijderstem.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+btn.value);
}

function toestaanUpgradeAdministrator(btn) {
    var bericht = "bericht"+btn.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {

        window.location.reload();
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

function verwijderIdee(btn) {
    var bevestig = confirm("Weet u zeker dat u dit idee wilt verwijderen?");
    if (bevestig == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            window.location.reload();
        }
        xmlhttp.open("POST", "../Tussenpaginas/verwijderidee.php");
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+btn.value);
    }
}

function verwijderProfiel(btn) {
    var bevestig = confirm("Weet u zeker dat u dit profiel wilt verwijderen?");
    if (bevestig == true) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            window.location.reload();
        }
        xmlhttp.open("POST", "../Tussenpaginas/verwijderprofiel.php");
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+btn.value);
    }
}

function sterktewachtwoord(i) {
    var input = i.value;
    if ((/^(?=.*[a-z])/.test(input)) && (/^(?=.*[A-Z])/.test(input)) 
        && (/^(?=.*\d)/.test(input)) && (/^(?=.*[-+_!@#$%^&*., ?])/.test(input))) {
        document.getElementById("wachtwoordSterkteId").innerHTML = "Voldoende";
        if (input.length >= 8) {
            if (input.length >= 12) {
                document.getElementById("wachtwoordSterkteId").innerHTML = "Sterk";
                i.style.border = "1px solid green";
            } else {
                document.getElementById("wachtwoordSterkteId").innerHTML = "Voldoende";
                i.style.border = "1px solid green";
            }
        }  else {
            document.getElementById("wachtwoordSterkteId").innerHTML = "onvoldoende";
            i.style.border = "1px solid red";
        }
    } else if ((/^(?=.*[a-z])/.test(input)) || (/^(?=.*[A-Z])/.test(input)) 
    || (/^(?=.*\d)/.test(input)) || (/^(?=.*[-+_!@#$%^&*., ?])/.test(input))) {
        document.getElementById("wachtwoordSterkteId").innerHTML = "onvoldoende";
        i.style.border = "1px solid red";
    } else {
        document.getElementById("wachtwoordSterkteId").innerHTML = "";
        i.style.border = "1px solid red";
    }
}

function sterktewachtwoordherhaald(i) {
    var input = i.value;
    if ((/^(?=.*[a-z])/.test(input)) && (/^(?=.*[A-Z])/.test(input)) 
        && (/^(?=.*\d)/.test(input)) && (/^(?=.*[-+_!@#$%^&*., ?])/.test(input)) 
        && (input === document.getElementById("accAanmakenWachtwoordId").value)) {
        if (input.length >= 8) {
            if (input.length >= 12) {
                i.style.border = "1px solid green";
            } else {
                i.style.border = "1px solid green";
            }
        }  else {
            i.style.border = "1px solid red";
        }
    } else if ((/^(?=.*[a-z])/.test(input)) || (/^(?=.*[A-Z])/.test(input)) 
    || (/^(?=.*\d)/.test(input)) || (/^(?=.*[-+_!@#$%^&*., ?])/.test(input)) 
    || (input !== document.getElementById("accAanmakenWachtwoordId").value)) {
        i.style.border = "1px solid red";
    } else {
        i.style.border = "1px solid red";
    }
}

function checknaam(i) {
    var input = i.value;
    if ((!input) && (input.length == 0)) {
        i.style.border = "1px solid red";
    } else if ((/^(?=.*[+_!@#$%^&*.,?])/.test(input)) || (/^(?=.*\d)/.test(input)) || (!(/[^ -]/.test(input)))) {
        i.style.border = "1px solid red";
    } else {
        i.style.border = "1px solid green";
    }
}

function checkemail(i) {
    var input = i.value;
    if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]/.test(input)) {
        i.style.border = "1px solid green";
    } else if ((!input) && (input.length == 0)) {
        i.style.border = "1px solid red";
    } else {
        i.style.border = "1px solid red";
    }
}
var numberTranslateX = 0;

function naarLinksNav() {

    let nav = document.getElementById("lijstLinksNav");
    var x = nav.scrollWidth;
    var xx = nav.clientWidth;
    var transformNav = (xx / 1.5);

    numberTranslateX += transformNav;
    if (numberTranslateX > transformNav) {
        numberTranslateX -= transformNav;
    } else {
        nav.setAttribute("style", "transform:translateX("+numberTranslateX+"px);");
    }
    
    // hier moet nog wat worden verbeterd.
    numberTranslateX += transformNav;
    if (numberTranslateX > (transformNav / 2)) {
        document.getElementById("linksNavButtonId").style.display = "none";
        nav.setAttribute("style", "transform:translateX(0px);");
    }
    numberTranslateX -= transformNav;
    
    if (numberTranslateX > (x*-1)) {
        document.getElementById("rechtsNavButtonId").style.display = "block";
    }

    if (numberTranslateX > 0) {
        nav.setAttribute("style", "transform:translateX(0px);");
    }

    //console.log(numberTranslateX);
}
function naarRechtsNav() {

    let nav = document.getElementById("lijstLinksNav");
    var x = nav.scrollWidth;
    var xx = nav.clientWidth;
    var transformNav = (xx / 1.5);

    numberTranslateX -= transformNav;
    if (numberTranslateX < (x*-1)) {
        numberTranslateX += transformNav;
    } else {
        nav.setAttribute("style", "transform:translateX("+numberTranslateX+"px);");
    }

    numberTranslateX -= transformNav;
    if (numberTranslateX < ((x*-1)/*+(transformNav*-1)*/)) {
        document.getElementById("rechtsNavButtonId").style.display = "none";
    }
    numberTranslateX += transformNav;

    if (numberTranslateX < transformNav) {
        document.getElementById("linksNavButtonId").style.display = "block";
    }

    if (numberTranslateX < (-1*x)) {
        nav.setAttribute("style", "transform:translateX("+x+"px);");
    }

    //console.log(numberTranslateX);
    
}
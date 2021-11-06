var onderwerpenArray = ['algemeen', 'fitness', 'gezondheid', 'catering', 'gebouw', 'roosters', 
'activiteiten', 'studentenraad', 'afstandsleren', 'motivatie', 'docenten', 'lesinhoud'];

function onderwerpen() {
    for (let i = 0; i < onderwerpenArray.length; i++) {
        let str = onderwerpenArray[i];
        document.getElementById("homeOnderwerpenGridContainerId").innerHTML += '<a href="../Webpaginas/onderwerp.php?onderwerp='+onderwerpenArray[i]+'" '+
        'class="linkOnderwerpenPage" id="id'+onderwerpenArray[i]+'"><p class="center margin0">'+str.toUpperCase()+'</p></a>'
    }
}
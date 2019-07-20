const urlGET = 'https://lolshark.es/';

var peticionHttp = new XMLHttpRequest();
peticionHttp.addEventListener('load', cargarSelectorVersiones);
peticionHttp.open('GET', '/getVersions');
peticionHttp.send();

function cargarSelectorVersiones() {
    var selectorVersiones = document.getElementById('selectorVersiones');
    var versiones = this.responseText;
    var listaVersiones = versiones.split("\n");


    for (index in listaVersiones) {
        selectorVersiones.options[selectorVersiones.options.length] = new Option(listaVersiones[index], index);
    }

}


var Comenzar = document.getElementById('Comenzar');
Comenzar.addEventListener('click',
    function () {
        var selectorVersiones = document.getElementById('selectorVersiones');
        var enlace = document.getElementById('Enlace');
        var selectedOption = selectorVersiones.options[selectorVersiones.selectedIndex].innerHTML;
        enlace.href = '/mgp/' + selectedOption;
    });




$(document).ready(function() {
    proveraProizvod();
    });
    function proveraProizvod () {
    var naziv = $("#naziv")
    var opis = $("#opis")
    var slika = $("#slika")
    var cena = $("#cena")
    var aktivan = $("#aktivan")
    // regularni
    // console.log(naziv.val())
    // return false;
    var nazivRi = /^[A-Z][a-z0-9\s]+$/
    var opisRi = /^[A-Z][a-z0-9\s]+$/
    var slikaRi = /^[a-z0-9]+\.(jpg|jpeg)$/
    var cenaRi = /^[0-9]{4,7}$/
    if(!nazivRi.test(naziv.val())){
    console.log('greska naziv')
    return false;
    }
    if(!opisRi.test(opis.val())){
    console.log('greska opis')
    return false;
    }
    if(!slikaRi.test(slika.val())){
    console.log('greska slika')
    return false;
    }
    if(!cenaRi.test(cena.val())){
    console.log('greska cena')
    return false;
    }
    return true;
    }
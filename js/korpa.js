$(document).ready(function() {
    var proizvodi = JSON.parse(localStorage.getItem("proizvodi"));
    if(!proizvodi){
    praznaKorpa();
    }
    else{
    prikazProivoda()
    }
    document.querySelector("#dugme-baza").addEventListener("click", posalji)
    console.log($("#dugme-baza"))
    });
    function prikazProivoda(){
    var proizvodi = JSON.parse(localStorage.getItem("proizvodi"))
    console.log(proizvodi.length)
    var filtrirani = [] // idProizvoda u localStorage
    for (let proizvod of proizvodi) {
    filtrirani.push(proizvod.idProizvod)
    }
    // console.log(filtrirani)
    // ------------------------ZAHTEV ZA DOHVATANJE SVIH PROIZVODA IZ BAZE-------------
    $.ajax({
    url: "sviproizvodi.php",
    method: "post",
    dataType: "json",
    data: {
    idProizvod: filtrirani
    },
    success: function (data) {
    console.log(data) // svi proizvodi iz baze
    // ispisProizvoda(data)
    var nizelement = []
    data = data.filter(x => {
    for (pro of proizvodi) {
    if(x.id == pro.idProizvod){
    x.kolicina = pro.kolicina
    return true;
    }
    }
    })
    // --------------------RADJENO SA PROIZVODIMA SAMO KOJI ZADOVOLJAVAJU IZBAZE
    // data.forEach( function(element) {
    // console.log(element)
    // element.forEach( function(el) {
    // for (let pro of proizvodi) {
    // if(el.id == pro.idProizvod){
    // el.kolicina = pro.kolicina
    // nizelement.push(el); // niz sa proizvodima iz baze
    // }
    // }
    // });
    // nizelement = element.filter(p => {
    // for(let pro of proizvodi){
    // console.log(p.id)
    // if(p.id == pro.idProizvod){
    // console.log('jeste')
    // p.kolicina = pro.kolicina;
    // return true;
    // }
    // }
    // })
    // });
    ispisProizvoda(data)
    },
    error: function (x,y,z) {
    // console.log(x,y,z)
    praznaKorpa()
    $("#dugme-baza").hide()
    }
    })
    function ispisProizvoda (data) {
    let ispis = `
     <table class="timetable_sub">
    <thead>
    <tr>
    <th>Slika</th>
    <th>Naziv</th>
     <th>Cena</th>
     <th>Kolicina</th>
    <th>Ukupna cena</th>
    <th>Obrisi</th>
    </tr>
    </thead>
    <tbody>`
    data.forEach( function(pro) {
    ispis += ispisRedova(pro);
    });
    $("#ispisKorpe").html(ispis);
    }
    function ispisRedova (pro) {
    return `
    <tr class="rem1">
    <td class="invert-image">
    <a href="single.html">
    <img src="${pro.slika}" alt=" "
    class="img-responsive">
    </a>
    </td>
    <td class="invert">${pro.naziv}</td>
    <td class="invert">${pro.cena}</td>
    <td class="invert">${pro.kolicina}</td>
    <td class="invert">${pro.cena * pro.kolicina}
    RSD</td>
    <td class="invert">
    <div class="rem">
    <div class=""><button
    onclick='izbrisiIzKorpe(${pro.id})'>Remove</button> </div>
    </div>
    </td>
    </tr>`
    }
    }
    function praznaKorpa () {
    var ispis = `<h3>Nemate proizvode u vasoj korpi</h3>`
    $("#ispisKorpe").html(ispis);
    }
    function izbrisiIzKorpe(id) {
     var proizvodi = JSON.parse(localStorage.getItem("proizvodi"));
     console.log(proizvodi)
     let filtered = proizvodi.filter(p => p.idProizvod != id);
     localStorage.setItem("proizvodi", JSON.stringify(filtered));
     prikazProivoda();
    }
    // -----------------------------------SLANJE BAZI---------------------------------------------
    function posalji(e){
    e.preventDefault()
    console.log("radi")
    var proizvodi = JSON.parse(localStorage.getItem("proizvodi"))
    console.log(proizvodi)
    proizvodi.forEach( function(pro, index) {
    var idKorisnik = pro.idKorisnik
    var idProizvod = pro.idProizvod
    var kolicina = pro.kolicina
    console.log("poslato");
    console.log(idKorisnik + " / " + idProizvod + " / " + kolicina);
    $.ajax({
    url: "slanjeizkorpebazi.php",
    method: "post",
    dataType: "json",
    data:{
    upis: "poslato",
    idKor: idKorisnik,
    idPro: idProizvod,
    kolicina: kolicina
    },
    success: function(data){
    alert(data);
    },
    error: function (xhr, statusText ,err) {
    console.log(xhr.status, statusText, err);
    }
    })
    });
    localStorage.removeItem("proizvodi")
    }
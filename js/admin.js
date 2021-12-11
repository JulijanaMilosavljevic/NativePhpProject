$(document).ready(function() {
    console.log("Radi");
    $("#sviKorisnici").click(sviKorisnici);
    $("#dodKor").click(formaZaDodavanjeKorisnika);
    $("#sviProizvodi").click(sviProizvodi);
    $("#dodPro").click(formaZaDodavanjeProizvoda);
    });
    function sviKorisnici () {
    var id = $(this).data("id");
    $.ajax({
    url: "admin2.php",
    method: "post",
    dateType: "json",
    data: {
    id: id
    },
    success: function(data, textStatus, xhr){
    tabela(data);
    },
    error: function (err) {
    console.log(err);
    }
    })
    }
    function dodajKorisnika () {
    var id = $(this).data("id");
    console.log(id);
    var ime = $('#ime').val();
    var prezime = $('#prezime').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var uloga = $('#uloga').val();
    console.log("Ime: "+ime+", prezime: "+prezime+", email: "+email+", password:"+password+", uloga: "+uloga)
    $.ajax({
    url: "admin2.php",
    method: "post",
    dateType: "json",
    data: {
    // validacija podataka
    // slanje podataka bazi
    id: id,
    ime: ime,
    prezime: prezime,
    email: email,
    password: password,
    uloga: uloga
    },
    success: function(data, textStatus, xhr){
    console.log(data);
    if(xhr.status == 200){
    alert(data.message)
    }
    },
    error: function (err) {
    console.log(err);
    }
    })
    }
    function sviProizvodi () {
    var id = $("#sviProizvodi").data("id");
    console.log(id);
    $.ajax({
    url: "admin2.php",
    method: "post",
    dateType: "json",
    data: {
    id: id
    },
    success: function(data){
    console.log(data);
    tabelaProizvoda(data);
    },
    error: function (x,y,z) {
    console.log(x,y,z);
    }
    })
    }
    function tabelaProizvoda (proizvodi) {
    var ispis = "";
    ispis += `
    <table border="1px" cellpadding='2'>
    <tr>
    <th>Id</th>
    <th>Naziv</th>
    <th>Opis</th>
    <th>Slika</th>
    <th>Alt</th>
    <th>Cena</th>
    <th>Aktivan</th>
    <th>Operacije</th>
    <th></th>
    </tr>`
    proizvodi.forEach( function(p) {
    ispis += `
    <tr>
    <td>${p.id}</td>
    <td>${p.naziv}</td>
    <td>${p.opis}</td>
    <td>${p.slika}</td>
    <td>${p.alt}</td>
    <td>${p.cena}</td>
    <td>${p.aktivan}</td>
    <td><a href='#' class='proizvodi-izmena' dataid='${p.id}'>Izmeni</a></td>
    <td><a href='#' class='proizvodi-brisanje' dataid='${p.id}'>Obrisi</a></td>
    </tr>`
    });
    ispis += `</table>`;
    $("#ispis").html(ispis);
    // klik na link izmeni / update
    $(".proizvodi-izmena").click(function() {
    var idProizvod = $(this).data("id")
    console.log(idProizvod)
    $.ajax({
    url: "admin2.php",
    method: "post",
    dateType: "json",
    data: {
    idUpdate: idProizvod
    },
    success: function(data){
    console.log(data.id)
    popunjavanjeProizvoda(data.id, data.naziv, data.opis,
    data.slika, data.alt, data.cena, data.aktivan)
    },
    error: function (x,z,y) {
    console.log(x,z,y);
    }
    })
    });
    // slanje id za brisanje
    $(".proizvodi-brisanje").click(function () {
    var idBrisanje = $(this).data("id")
    console.log(idBrisanje)
    $.ajax({
    url: "proizvodifunkc.php",
    method: "post",
    dateType: "json",
    data: {
    idBrisanje: idBrisanje
    },
    success: function(data){
    // console.log(data)
    alert(data)
    },
    error: function (x,z,y) {
    console.log(x,z,y);
    }
    })
    })
    // update
    function popunjavanjeProizvoda (idP, nazivP, opisP, slikaP, altP, cenaP,
    aktivanP) {
    let aktivan = ["Nije", "Jeste"]
    var ispis = "";
    ispis += `
    <form action='proizvodifunkc.php' method='post'
    enctype='multipart/form-data'>
    <span class='i-name'>Id:</span> <input type="text"
    class='forma' name="id" value='${idP}' id="id" readonly><br>
    <span class='i-name'>Naziv:</span> <input
    type="text" class='forma' name="naziv" value='${nazivP}' id="naziv"><br>
    <span class='i-name'>Opis:</span> <input type="text"
    class='forma' name="opis" value='${opisP}' id="opis"><br>
    <span class='i-name'>Slika:</span> <input type="file"
    class='forma' name="slika" value='${slikaP}' id="slika"><br>
    <span class='i-name'>Alt:</span> <input type="text"
    class='forma' name="alt" value='${altP}' id="alt"><br>
    <span class='i-name'>Cena:</span> <input
    type="text" class='forma' name="cena" value='${cenaP}' id="cena"><br>
    <select id='aktivan'
    name='aktivan'><option>Aktivan?</option>`
    aktivan.forEach( function(el, index) {
    if(index == aktivanP){
    ispis += `<option selected
    value='${index}'>${el}</option>`
    }
    else
    ispis += `<option
    value='${index}'>${el}</option>`
    });
    ispis += `</select>
    <input type='submit' id='izmenaBtn'
    name='updateProizvod' value='Izmeni proizvod'/>
    </form>
    `
    $("#ispis").html(ispis);
    }
    }
    function tabela (data) {
    var ispis = "";
    ispis += `
    <table border="1px" cellpadding='2'>
    <tr>
    <th>Id</th>
    <th>Ime</th>
    <th>Prezime</th>
    <th>email</th>
    <th>password</th>
    <th>uloga</th>
    </tr>`
    data.forEach( function(element) {
    ispis += `
    <tr>
    <td>${element.id_korisnik}</td>
    <td>${element.ime}</td>
    <td>${element.prezime}</td>
    <td>${element.email}</td>
    <td>${element.password}</td>
    <td>${element.id_uloga}</td>
    </tr>`
    });
    ispis += `
    </table>`
    $("#ispis").html(ispis);
    }
    // -------------------------------INSERT PROIZVODA-------------------------------------
    function formaZaDodavanjeProizvoda () {
    var ispis = "";
    ispis += `
    <form action='proizvodifunkc.php' enctype='multipart/form-data'
    method='post'>
    <span class='i-name'>Naziv:</span> <input class='forma'
    type="text" name="naziv" id="naziv">
    <span class='i-name'>Opis:</span> <input class='forma' type="text"
    name="opis" id="opis"><br>
    <span class='i-name'>Slika:</span> <input class='forma' type="file"
    name="slika" id="slika"><br>
    <span class='i-name'>Alt:</span> <input class='forma' type="text"
    name="alt" id="alt"><br>
    <span class='i-name'>Cena:</span> <input class='forma'
    type="text" name="cena" id="cena"><br>
    <select id='aktivan' name='aktivan'>
    <option value=''>Aktivan?</option>
    <option value='0'>Nije</option>
    <option value='1'>Jeste</option>
    </select><br/>
    <div id='brendovi'></div>
    <input type='submit' name='insertProizvod' value='Dodaj
    proizvod'/>
    </form>`
    $("#ispis").html(ispis);
    $.ajax({
    url: "brendovi.php",
    method: "post",
    dateType: "json",
    data: {
    brend: "brend"
    },
    success: function(data, textStatus, xhr){
    console.log(data);
    console.log(xhr.status)
    console.log(ispisBrendova(data))
    ispisBrendova(data)
    },
    error: function (err) {
    console.log(err);
    }
    })
    }
    function ispisBrendova (data) {
    let ispis = "<select name='brend'><option value='0'>Brendovi</option>"
    data.forEach( function(el) {
    ispis += `
    <option value='${el.id}'>${el.naziv}</option>
    `
    });
    ispis += `</option>`
    $("#brendovi").html(ispis)
    }
    function formaZaDodavanjeKorisnika () {
    var ispis = "";
    ispis += `
    <form>
    <span class='i-name'>Ime:</span> <input class='forma' type="text"
    name="ime" id="ime"><br>
    <span class='i-name'>Prezime:</span> <input class='forma'
    type="text" name="prezime" id="prezime"><br>
    <span class='i-name'>Email:</span> <input class='forma'
    type="text" name="email" id="email"><br>
    <span class='i-name'>Password:</span> <input class='forma'
    type="text" name="password" id="password"><br>
    <select id='uloga'>
    <option value='0'>Uloga</option>
    <option value='1'>Admin</option>
    <option value='2'>Korisnik</option>
    </select>
    </form><br/>
    <a href='#' id='unosKorisnika' class='admin-btn' data-id='2'>Dodaj
    korisnika</a>
    `
    $("#ispis").html(ispis);
    $("#unosKorisnika").click(dodajKorisnika);
    }
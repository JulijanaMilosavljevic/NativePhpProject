$(document).ready(function() {
    // drop lista
    // var x = $("#lista").change(function() {
    // console.log($(this).val())
    // });
    $(".dodaj-u-korpu").click(dodajUKorpu);
    });
    function proizvodiIzLocal () {
     return JSON.parse(localStorage.getItem("proizvodi"));
    }
    function dodajUKorpu () {
    var id = $(this).data("id"); // id proizvoda
    console.log(id)
    $.ajax({
    url: "korpaobrada.php",
    method: "post",
    dataType: "json",
    data: {
    zahtev: "poslato"
    },
    success: function (data) {
    console.log(data)
    console.log(data.id_korisnik)
    var idKorisnik = data.id_korisnik
    var proizvod = proizvodiIzLocal();
    if(proizvod){
    if(daLiPostojiUNizu()){
    uvecajKolicinu()
    }
    else{
    dodavanjeNovogProizvoda();
    }
    }
    else{
    dodavanjePrvogProizvoda();
    }
    function daLiPostojiUNizu () {
    return proizvod.filter(x => x.idProizvod == id).length // vraca 1 ili 0
    }
    function dodavanjeNovogProizvoda () {
    var proizvodi = proizvodiIzLocal();
    proizvodi.push({
    idProizvod: id,
    idKorisnik: idKorisnik,
    kolicina: 1
    })
    localStorage.setItem("proizvodi", JSON.stringify(proizvodi));
    }
    function uvecajKolicinu () {
    var proizvodi = proizvodiIzLocal();
    console.log(proizvodi)
    for (let proizvod of proizvodi) {
    console.log(proizvod.idProizvod)
    if(proizvod.idProizvod == id){
    proizvod.kolicina++;
    break;
    }
    }
    localStorage.setItem("proizvodi", JSON.stringify(proizvodi));
    }
    function dodavanjePrvogProizvoda () {
     var proizvodi = [];
     proizvodi[0] = {
     idProizvod: id,
     idKorisnik: idKorisnik,
     kolicina: 1
     };
     localStorage.setItem("proizvodi", JSON.stringify(proizvodi));
     }
     },
    error: function (err) {
    console.log(err)
    }
    })
    }
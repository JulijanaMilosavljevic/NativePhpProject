// REGULARNI IZRAZI
document.querySelector("#cf-submit").addEventListener("click", proveraPodataka);
// document.querySelector("#cf-submit").addEventListener("onmouseover", function(){
// document.querySelector("#cf-submit").style.backgroundColor = '#ce3232';
// })
function proveraPodataka () {
var ime = document.querySelector("#cf-fname");
var prezime = document.querySelector("#cf-lname");
// var korisnickoIme = document.querySelector("#cf-userName");
var email = document.querySelector("#cf-email");
var rEmail = document.querySelector("#cf-repEmail");
var sifra = document.querySelector("#pass")
var imeRi = /^[A-Z][a-z]{2,25}$/;
var prezimeRi = /^[A-Z][a-z]{2,25}$/;
// var korisnickoImeRi = /^[a-z][a-z0-9]+$/; // radi
var emailRi = /^(([a-z\d]+\.{1}){2}\d{1,3}\.\d{2}@ict.edu.rs)|(([az\d]+\.*)+@(gmail|hotmail|yahoo)\.com)$/;
var passRi = /^[\w\d\S]{8,25}$/
if(!imeRi.test(ime.value)){
document.querySelector("#cf-fname").style.borderBottomColor =
'#ce3232';
return false
}
else{
document.querySelector("#cf-fname").style.borderBottomColor = '#ddd';
}
if(!prezimeRi.test(prezime.value)){
document.querySelector("#cf-lname").style.borderBottomColor =
'#ce3232';
return false
}
else{
document.querySelector("#cf-lname").style.borderBottomColor = '#ddd';
}
// if(!korisnickoImeRi.test(korisnickoIme.value)){
// document.querySelector("#cf-userName").style.borderBottomColor =
'#ce3232';
// return false
// }
// else{
// document.querySelector("#cf-userName").style.borderBottomColor =
'#ddd';
// }
if(!emailRi.test(email.value)){
document.querySelector("#cf-email").style.borderBottomColor =
'#ce3232';
return false
}
else{
document.querySelector("#cf-email").style.borderBottomColor = '#ddd';
}
if(!emailRi.test(rEmail.value)){
document.querySelector("#cf-repEmail").style.borderBottomColor =
'#ce3232';
return false
}
else{
document.querySelector("#cf-repEmail").style.borderBottomColor =
'#ddd';
}
if(!passRi.test(pass.value)){
document.querySelector("#pass").style.borderBottomColor = '#ce3232';
return false
}
else{
document.querySelector("#pass").style.borderBottomColor = '#ddd';
}
return true
}
jQuery(document).ready(function($) {
    console.log('radi')
    $("#cf-submit").click(provera)
    });
    function provera (argument) {
    let greske = []
    let ime = document.querySelector("#cf-name")
    let email = document.querySelector("#cf-email")
    let poruka = document.querySelector("#cf-message")
    // regularni
    let imeRi = /^[A-Z][a-z]{2,25}$/
    let emailRi = /^(([a-z\d]+\.{1}){2}\d{1,3}\.\d{2}@ict.edu.rs)|(([az\d]+\.*)+@(gmail|hotmail|yahoo)\.com)$/
    if(!imeRi.test(ime.value)){
    greske.push("Ime nije ok")
    console.log('ime')
    $('.text-danger').show()
    return false
    }
    if(!emailRi.test(email.value)){
    greske.push("Email nije ok")
    $('.text-danger').show()
    console.log('email')
    return false
    }
    if(poruka.value == ""){
    greske.push("Morate uneti poruku")
    $('.text-danger').show()
    return false
    }
    return true
    }
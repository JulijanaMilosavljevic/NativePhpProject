jQuery(document).ready(function($) {
    document.querySelector("#cf-submit").addEventListener("click",
    proveraPodataka);
    });
    function proveraPodataka () {
    var email = document.querySelector("#email");
    var pass = document.querySelector("#pass");
    var emailRi = /^(([a-z\d]+\.{1}){2}\d{1,3}\.\d{2}@ict.edu.rs)|(([az\d]+\.*)+@(gmail|hotmail|yahoo)\.com)$/;
    var passRi = /^[\w\d\S]{4,25}$/;
    if(!emailRi.test(email.value)){
    document.querySelector("#email").style.borderBottomColor = '#ce3232';
    return false
    }
    else{
    document.querySelector("#email").style.borderBottomColor = '#ddd';
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
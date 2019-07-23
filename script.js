
function Checkform(){
    var name = document.querySelector("#name").value;
    var surname = document.querySelector("#surname").value;
    var password = document.querySelector("#password").value;
    var repeatpass =  document.querySelector("#repeatpass").value; 
    var email =  document.querySelector("#email").value; 
    var err = document.querySelector("#err");
    name = name.trim();
    surname = surname.trim();
    password = password.trim();
    repeatpass = repeatpass.trim();
    email = email.trim();

if (Checkstr(name)){
    err.innerHTML = "Wpisz prawidłowe imię!"
    return false;
}

else if (Checkstr(surname)){
    err.innerHTML = "Wpisz prawidłowe nazwisko!"
    return false;
}

else if (Checkpass(password)){
    err.innerHTML = "Wpisz prawidłowe hasło!"
    return false;
}

else if (password !== repeatpass){
    err.innerHTML = "Hasła się nie zgadzają!"
    return false;
}

else if (password !== repeatpass){
    err.innerHTML ="Hasła się nie zgadzają!"
    return false;
}

else if (!validateEmail(email)){
    err.innerHTML ="Nieprawidłowy email!"
    return false;
}

else {
    return true;
}
}

function Checkstr(str){
    if (str.length === 0){
        return true
    }
    else if (str.match(/[\d<>)()*&^%$?:;+=_-"'#@!]/)){
        return true
    }
    return false;
}

function Checkpass(pass){
    if (pass.length === 0 || pass.length<8){
        return true
    }
    else if (!pass.match(/\d/)){
        return true
    }
    return false;
}

function validateEmail(em) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(em);
}
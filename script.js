
var form = document.querySelector("form");
form.addEventListener("submit", function(e){
    var nick = document.querySelector("#nick").value;
    var password = document.querySelector("#password").value;
    var repeatpass =  document.querySelector("#repeatpass").value; 
    var email =  document.querySelector("#email").value; 
    var err = document.querySelector("#err");
    nick = nick.trim();
    password = password.trim();
    repeatpass = repeatpass.trim();
    email = email.trim();

    if (Checkstr(nick)){
        e.preventDefault();
        err.innerHTML = "Wpisz prawidłowy nick!"
    }
    
    else if (Checkpass(password)){
        e.preventDefault();
        err.innerHTML = "Wpisz prawidłowe hasło!"
    }
    
    else if (password !== repeatpass){
        e.preventDefault();
        err.innerHTML = "Hasła nie są sobie równe!"
    }
    
    else if (!validateEmail(email)){
        e.preventDefault();
        err.innerHTML ="Nieprawidłowy email!"
    }
    })

function Checkstr(str){
    if (str.length === 0){
        return true;
    }
    else if (str.match(/[^\wńżźćńśęąłó]/gi)){
        return true;
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

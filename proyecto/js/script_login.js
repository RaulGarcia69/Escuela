function validar() {
    email=document.getElementById('email').value;
    campoemail=document.getElementById('email');
    password=document.getElementById('password').value;
    campopassword=document.getElementById('password');
    
    
    if (email== '' && password== '') {
       campoemail.className += " incorrecto";
       campopassword.className += " incorrecto";
       campoemail.placeholder = "Inserte su email";
       campopassword.placeholder = "Inserte su contrasena";
       campoemail.classList.remove("placeholder");
       campopassword.classList.remove("placeholder");
       return false;
    }
  
    else if (email== '') {
       campopassword.className += " placeholder";
       campoemail.className += " incorrecto";
       campopassword.classList.remove("incorrecto");
       campoemail.placeholder = "Inserte su email";
       campoemail.classList.remove("placeholder");
       return false;
    }
    
    else if (password== ''){
        campoemail.className += " placeholder";
        campopassword.className += " incorrecto";
        campoemail.classList.remove("incorrecto");
        campopassword.placeholder = "Inserte su contrasena";
        campopassword.classList.remove("placeholder");
       return false;
    }
    else {
        campoemail.classList.remove("incorrecto");
        campopassword.classList.remove("incorrecto");
        campoemail.className += " placeholder";
        campopassword.className += " placeholder";
    return true;
    }
}
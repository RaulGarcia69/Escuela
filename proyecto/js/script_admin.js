
//FILTRO
function openForm() {
  document.getElementById("filtrar").style.display = "block";
  document.getElementById("pagina").className += "desactivar";
  document.getElementById("form-filtro").reset();

}

function closeForm() {
      document.getElementById("pagina").classList.remove("desactivar");
  document.getElementById("filtrar").style.display = "none";
  document.getElementById("crear").style.display = "none";
  document.getElementById("modificar").style.display = "none";
  
}


function activar() {
    if (document.getElementById("checkbox").checked==true) {
        document.getElementById("depart-filtro").disabled=false;
    }
    else {
        document.getElementById("depart-filtro").disabled=true;
    }
}

function activara() {
    if (document.getElementById("checkbox").checked==true) {
        document.getElementById("clase-filtro").disabled=false;
    }
    else {
        document.getElementById("clase-filtro").disabled=true;
    }
}



//NO SE HA APLIACADO//
function clickForm() {
window.addEventListener('click', function(e){
    if (document.getElementById('filtrar').contains(e.target) || (document.getElementById('crear').contains(e.target)))
        {} 
    else {
  	closeForm();
    }
});
}


//MODIFICAR
function openFormMod() {
    document.getElementById("modificar").style.display = "block";
  document.getElementById("pagina").className += "desactivar";
  document.getElementById("form-modificar").reset();
}





//CREAR
function openFormCrear() {
  document.getElementById("crear").style.display = "block";
  document.getElementById("pagina").className += "desactivar";
  document.getElementById("form-crear").reset();

}



//VALIDAR
function validar() {
    nombre=document.getElementById('nombre-crear').value;
    primerapellido=document.getElementById('primerapellido-crear').value;
    segundoapellido=document.getElementById('segundoapellido-crear').value;
    dni=document.getElementById('dni-crear').value;
    telefono=document.getElementById('telefono-crear').value;
    email=document.getElementById('email-crear').value;
    if (nombre == '' || primerapellido == '' || segundoapellido == '' || dni == '' || telefono == '' || email == '') {
       document.getElementById('crear-boton').disabled = true ;
       setTimeout(function(){document.getElementById("crear-boton").disabled = false;},2000);
       
       return false;
    }
    else {
        return true;
    }
}


function validarmod() {
    nombre=document.getElementById('nombre-mod').value;
    primerapellido=document.getElementById('primerapellido-mod').value;
    segundoapellido=document.getElementById('segundoapellido-mod').value;
    dni=document.getElementById('dni-mod').value;
    telefono=document.getElementById('telefono-mod').value;
    email=document.getElementById('email-mod').value;
    if (nombre == '' || primerapellido == '' || segundoapellido == '' || dni == '' || telefono == '' || email == '') {
       document.getElementById('modificar-boton').disabled = true ;
       setTimeout(function(){document.getElementById("modificar-boton").disabled = false;},2000);
       
       return false;
    }
    else {
        return true;
    }
}


function validarp() {
    nombre=document.getElementById('nombre-crear').value;
    primerapellido=document.getElementById('primerapellido-crear').value;
    segundoapellido=document.getElementById('segundoapellido-crear').value;
    telefono=document.getElementById('telefono-crear').value;
    email=document.getElementById('email-crear').value;
    if (nombre == '' || primerapellido == '' || segundoapellido == '' || telefono == '' || email == '') {
       document.getElementById('crear-boton').disabled = true ;
       setTimeout(function(){document.getElementById("crear-boton").disabled = false;},2000);
       
       return false;
    }
    else {
        return true;
    }
}


function validarpmod() {
    nombre=document.getElementById('nombre-mod').value;
    primerapellido=document.getElementById('primerapellido-mod').value;
    segundoapellido=document.getElementById('segundoapellido-mod').value;
    telefono=document.getElementById('telefono-mod').value;
    email=document.getElementById('email-mod').value;
    if (nombre == '' || primerapellido == '' || segundoapellido == '' || telefono == '' || email == '') {
       document.getElementById('modificar-boton').disabled = true ;
       setTimeout(function(){document.getElementById("modificar-boton").disabled = false;},2000);
       
       return false;
    }
    else {
        return true;
    }
}
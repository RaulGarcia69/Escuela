
//FILTRO
function openForm() {
  document.getElementById("filtrar").style.display = "block";
  document.getElementById("pagina").className += "desactivar";
}

function closeForm() {
      document.getElementById("pagina").classList.remove("desactivar");
  document.getElementById("filtrar").style.display = "none";
  document.getElementById("crear").style.display = "none";
  document.getElementById("modificar").style.display = "none";

  clearForm();
  
}

function clearForm() {
  document.getElementById("form-filtro").reset();
  document.getElementById("form-modificar").reset();
  document.getElementById("form-crear").reset();
}

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
}





//CREAR
function openFormCrear() {
  document.getElementById("crear").style.display = "block";
  document.getElementById("pagina").className += "desactivar";

}


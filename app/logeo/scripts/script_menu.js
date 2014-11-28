
//menu.php
/*--------------------------------------*/
//Mostrar el iframe para agendar las cirugias
 function seeWinAgendar(id){
    document.getElementById(id).style.display="block";//MOSTRAR BLOQUE IFRAME PARA AGENDAR CIRUGIA
    document.getElementById('form_registro').style.display="none";//OCULTAR BLOQUE IFRAME DEL REGISTRO DE CUENTA
    document.getElementById('form_desbloquea').style.display="none";//OCULTAR EL BLOQUE PARA DESBLOQUEAR CUENTAS
    document.getElementById('form_adminhorarios').style.display="none";//OCULTAR EL BLOQUE PARA ADMINISTRAR EL HORARIO DE LOS MEDICOS
  }

  //Mostrar el iframe para registrar cuentas
function seeWinRegistro(id){
    document.getElementById(id).style.display="block";//MOSTRAR BLOQUE IFRAME PARA REGISTRAR CUENTAS
    document.getElementById('form_agenda').style.display="none";//OCULTAR BLOQUE IFRAME PARA AGENDAR CIRUGIAS
    document.getElementById('form_desbloquea').style.display="none";//OCULTAR EL BLOQUE PARA DESBLOQUEAR CUENTAS
    document.getElementById('form_adminhorarios').style.display="none";//OCULTAR EL BLOQUE PARA ADMINISTRAR EL HORARIO DE LOS MEDICOS
}

//Mostrar el iframe para bloquear y desbloquear cuentas 
function seeWinDesbloquear(id){
    document.getElementById(id).style.display="block";//MOSTRAR BLOQUE IFRAME PARA DES/BLOQUEAR CUENTAS
    document.getElementById('form_agenda').style.display="none";//MOSTRAR BLOQUE IFRAME PARA AGENDAR CIRUGIAS
    document.getElementById('form_registro').style.display="none";//OCULTAR BLOQUE IFRAME DEREGISTRO DE CUENTA
    document.getElementById('form_adminhorarios').style.display="none";//OCULTAR EL BLOQUE PARA ADMINISTRAR EL HORARIO DE LOS MEDICOS
}
function seeWinAdminHorarios(id){
    document.getElementById(id).style.display="block";//MOSTRAR BLOQUE IFRAME
    document.getElementById('form_agenda').style.display="none";//MOSTRAR BLOQUE IFRAME DE REPORTE
    document.getElementById('form_registro').style.display="none";//OCULTAR BLOQUE IFRAME DEREGISTRO DE CUENTA
    document.getElementById('form_desbloquea').style.display="none";//OCULTAR EL BLOQUE PARA DESBLOQUEAR CUENTAS
}

//Metodo para cargar una pagina nueva usando javascript
function cargarPagina(pagina){
  location.href=pagina;
}

function mostrarTareas(){
    document.getElementById("contenedor").style.display = "block";
}
function ocultarTareas(){
    document.getElementById("contenedor").style.display = "none";
}

function ver(n) {
         document.getElementById("subseccion"+n).style.display="block";
         }
function ocultar(n) {
         document.getElementById("subseccion"+n).style.display="none";
         }
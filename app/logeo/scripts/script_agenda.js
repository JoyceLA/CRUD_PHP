function getRequestObject() {
  if (window.ActiveXObject) {
    return(new ActiveXObject("Microsoft.XMLHTTP"));
  } else if (window.XMLHttpRequest) {
    return(new XMLHttpRequest());
  } else {
    return(null);
  }
}
/********************************************************************************************
*********************************************************************************************/
//agendarcirugia.php
//Metodo para cambiar los servicios que se muestran en base al turno que se selecciono
function redireccionaServicios(lista) {
	var posicion=lista.options.selectedIndex; //posicion
	var idturno =lista.options[posicion].value; 
	var request = getRequestObject();
	request.onreadystatechange =
	   function() {actualizaServicios(request);};
	request.open("POST","obtenservicios.php",true);
	var datos="idturno="+escape(idturno);
	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
               
	request.send(datos);	
	
}
//Actualizar la lista que se esta mostrando
function actualizaServicios(request) {
	if (request.readyState== 4 &&
         request.status == 200) {
		//alert("Respuesta "+request.responseText);
		 var campo = document.getElementById("sel_servicio");
		 campo.innerHTML = "<option value=\"0\">Selecciona...</option>"+request.responseText;
		 
	}		
}

//Calcular las fechas disponibles para agendar una cita
function searchDateService(lista) {
	
	var posicion=lista.options.selectedIndex; 
	var servicio =lista.options[posicion]; 
	var request = getRequestObject();

	posicion = document.getElementById('sel_turno').options.selectedIndex;
	var turno = document.getElementById('sel_turno').options[posicion];
	
	var medico = document.getElementById('id_medico');

	var info = {
		id_servicio : servicio.value,
		id_turno : turno.value,
		id_medico : medico.value
	};
	var request = getRequestObject();

	request.onreadystatechange =
		function() {llenalistafechas(request);};
		request.open("POST","buscafecha.php",true);

	var datos="infofecha="+escape(JSON.stringify(info));

	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	request.send(datos);	

}

//Actualizar la lista que se esta mostrando
function llenalistafechas(request) {
	if (request.readyState== 4 &&
        request.status == 200) {
		//alert("Respuesta listas "+request.responseText);
		var campo = document.getElementById("sel_fechas");
		 if((request.responseText).indexOf("VACIO") == -1){
		    campo.innerHTML = request.responseText;
		 }
		 else{
		 	campo.innerHTML = "<option value='0'>Cargando...</option>";
		 }
	}		
}


//Obtener la información con el numero de cedula de x paciente
function obtenerDatosPaciente(){
	document.getElementById("mjs_error").innerHTML="";
	var campo = document.getElementById("inCedula");
	var cedula = campo.value;
	
		
	var request = getRequestObject();
	request.onreadystatechange =
	   function() {llenaInfoPaciente(request);};
	request.open("POST","obteninfopaciente.php",true);
	var datos="cedula="+escape(cedula);
	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	request.send(datos);

	
}

//Llenar los campos con la información recibida de la consulta
function llenaInfoPaciente(request) {
	if (request.readyState== 4 &&
         request.status == 200) {

		try{
			 var datos = eval("("+request.responseText+")");

			 var campo = document.getElementById("inPaciente");
			 campo.value = datos.nombre; 
			 campo = document.getElementById("inEdad");
			 campo.value = datos.edad;
			
		}
		catch(err){
			al
			
		}
		 
	}		
}

//Método para enviar la información al servidor y almacenarlo en la base de datos.
function guardarInfoCita() { 
	var send = 1;
	var fecha = document.getElementById('sel_fechas');
	var turno = document.getElementById('sel_turno');
	var servicio = document.getElementById('sel_servicio');
	var medico = document.getElementById('id_medico');
	var cedula = document.getElementById('inCedula');
	var diagnostico = document.getElementById('txta_diagnostico');
	var cirugia = document.getElementById('inCirugia');

	// VALIDAR QUE SE HAYAN DADO DATOS EN CAMPOS OBLIGATORIOS
	if(fecha.value == 0){
		send = 0;
	}
	if(turno.value == 0){
		send = 0;
	}
	if(servicio.value ==0){
		send = 0;
	}
	if(medico.value == ""){
		send = 0;
	}
	if(cedula.value == ""){
		send = 0;
	}
	if(diagnostico.value == ""){
		send = 0;
	}
	if(cirugia.value == ""){
		send = 0;
	}
	if(send == 1){
		document.getElementById("pie").innerHTML="* Campos Obligatorios";
		document.getElementById("pie").style.color = "#000000";
		var info = {
			fecha : fecha.value,
			id_turno : turno.value,
			id_servicio :servicio.value,
			id_medico : medico.value,
			cedula : cedula.value,
			diagnostico : diagnostico.value,
			cirugia : cirugia.value
			
		};
	
		//alert("Guardado...");
		var request = getRequestObject();

		request.onreadystatechange =
			function() {agregarcita(request);};
			request.open("POST","agendarcita.php",true);

		var datos="infocita="+escape(JSON.stringify(info));

		request.setRequestHeader
	                 ("Content-Type", 
	                  "application/x-www-form-urlencoded");
		request.send(datos);

		var campo =  document.getElementById('sel_turno');
		campo.value=0;
		campo = document.getElementById('sel_fechas');
		for (var i=0; i<campo.length; i++){
		     campo.remove(i);
		}
		campo.innerHTML="<option value=\"0\">Selecciona...</option>";
		campo = document.getElementById('sel_servicio');
		campo.value=0;
		campo = document.getElementById('inCedula');
		campo.value="";
		campo = document.getElementById('txta_diagnostico');
		campo.value="";
		campo = document.getElementById('inCirugia');
		campo.value="";
		campo = document.getElementById('inPaciente');
		campo.value="";
		campo = document.getElementById('inEdad');
		campo.value="";
	}
	else{
		document.getElementById("pie").innerHTML="* Faltan campos obligatorios";
		document.getElementById("pie").style.color = "#FF0000";
	}
	
	

}

function agregarcita(request){
	if (request.readyState== 4 &&
         request.status == 200) {
		var resultado=request.responseText; 
		alert("CITA AGENDADA EXITOSAMENTE "+resultado);
		
	}
}

function cancelarInfo(){
	window.location.reload();
}


function regresar(){
	window.location
}



/**********************************************************************************************************
***********************************************************************************************************/
//veragenda.php
/*function desbloquear(celda,celda2,id) {
	cuentaValue = id;
	blockValue = -1;
	if(celda2.innerHTML == 0){
		if(confirm("¿Desea bloquear esta cuenta?")){
			celda.style.backgroundColor="#DF0101";
			celda2.innerHTML = 1;
			blockValue = 1;
		}
	}
	else{
		if(confirm("¿Desea habilitar la cuenta?")){
			celda.style.backgroundColor="#298A08";
			celda2.innerHTML = 0;
			blockValue = 0;
		}		
	}
	var unlock = {
		cuenta : cuentaValue,
		block : blockValue
	};
	var request = getRequestObject();

	request.onreadystatechange =
		function() {des_habilitar(request);};
		request.open("POST","actualizarestadocuenta.php",true);

	var datos="infounlock="+escape(JSON.stringify(unlock));

	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	alert("Enviando  "+datos);
	request.send(datos);	
	
	
}

function des_habilitar(request) {
	if (request.readyState== 4 &&
        request.status == 200) {
		var resultado=request.responseText; 
		alert("CUENTA DES/HABILITADA EXITOSAMENTE "+resultado);
	}		
}
*/
var currentValue = 0;
function handleClick(myRadio,celda) {
    //alert('Old value: ' + currentValue);
    //alert('New value: ' + myRadio.value);
    currentValue = myRadio.value;
    celda.style.backgroundColor="#298A08";
}

function seleccionarSala(lista,celda){
	var posicion=lista.options.selectedIndex; //posicion
	var num_sala =lista.options[posicion].value; 
	if(num_sala != 0){
		celda.style.backgroundColor="#298A08";
	}
	else{
		celda.style.backgroundColor="#DF0101";
	}
}

function finalizarAgenda(btnFin,lista,campoID){
	var confirma = confirm("Estas seguro de finalizar");
	if (confirma == true){
		lista.disabled=true;
		btnFin.src ="img/palomaVerde.png";
		btnFin.attributes["onclick"].value ="";
		confirma = false;
		/***********************/
		var num_agenda = campoID.innerHTML;
		
		var posicion=lista.options.selectedIndex; //posicion
		var sala =lista.options[posicion]; 
		
		var info = {
			num_agenda : num_agenda,
			num_sala : sala.value
		}
		var request = getRequestObject();
		request.onreadystatechange =
		   function() {actualizaAgendaCirugias(request);};
		request.open("POST","actualizaragenda_quirofano.php",true);
		var datos="infoagenda="+escape(JSON.stringify(info));
		request.setRequestHeader
	                 ("Content-Type", 
	                  "application/x-www-form-urlencoded");
	    alert("Enviando "+datos);
		request.send(datos);	

	}	

}
function actualizaAgendaCirugias(request) {
	if (request.readyState== 4 &&
        request.status == 200) {
		var resultado=request.responseText; 
		alert("AGENDA ACTUALIZADA EXITOSAMENTE "+resultado);
	}		
}
/*********************************************************************************************************
**********************************************************************************************************/
//administra_agenda.php
function recalendarizarcirugia(boton,recarga){
	recarga.src = "img/recarga.png";
	
	recarga.id = "rec"+recarga.id;
	recarga.title="Click - Recalendarizar Cirugia";
	boton.style.display = "none";

}

function confirmarcirugia(botonSi, botonNo){
	botonNo.style.display = "none";
	if(botonSi == "rec"+botonSi.id){
		alert("RecalendarizaNDO......");
	}
}
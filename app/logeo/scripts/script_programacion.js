
function getRequestObject() {
  if (window.ActiveXObject) {
    return(new ActiveXObject("Microsoft.XMLHTTP"));
  } else if (window.XMLHttpRequest) {
    return(new XMLHttpRequest());
  } else {
    return(null);
  }
}
/**************************************************************************************
**************************************************************************************/
//programarsala.php
//Metodo para recargar el iframe dependiendo del turno que se seleccione
function activarCalendario(lista) {
	var posicion=lista.options.selectedIndex; //posicion
	var idTurno =lista.options[posicion].value; 
	var table = document.getElementById('internWindow');
	if(idTurno.indexOf("0")==-1){ //Si selecciono algo
		
		table.style.display ="block";
		var win = document.getElementById('internWindow');
		win.src ="schedule.php?idTurno="+idTurno;
	}
	else{
		table.style.display ="none";
	}
	
}
//programaranestesiologos.php
//Metodo para recargar el iframe dependiendo del turno que se seleccione
function activarCalendarioAnest(lista) {
	var posicion=lista.options.selectedIndex; //posicion
	var idTurno =lista.options[posicion].value; 
	var table = document.getElementById('internWindow');
	if(idTurno.indexOf("0")==-1){ //Si selecciono algo
		
		table.style.display ="block";
		var win = document.getElementById('internWindow');
		win.src ="schedule_anestecia.php?idTurno="+idTurno;
	}
	else{
		table.style.display ="none";
	}
	
}
/***************************************************************************************************
****************************************************************************************************/
//schedule.php
//Metodo para agregar a la interfaz (contenido de la tabla) el servicio que fue seleccionado
function agregarServicio(numsala,dia,lista,etiqueta){

	var posicion=lista.options.selectedIndex; //posicion
	var servicio =lista.options[posicion].text; 
	
	if(lista.options[posicion].value != 0){
		lista.options.selectedIndex = 0;
		etiqueta.innerHTML+=""+servicio+"<br/>";
		//actualizarHorario(numsala,dia,lista.options[posicion].value);
		
	}
	
}

//Metodo para ir actualizando la tabla en la base de datos conforme es agregado el servicio a 
//la tabla de la pagina, este se va actualizando en la base de datos
function actualizarHorario(numsala,dia,servicio){
	
	var id_turno = document.getElementById('id_turn');
	
	
	var info_horario = {
				num_sala : numsala,
				dia : dia,
				id_servicio : servicio,
				id_turno : id_turno.value
			};
		
			//alert("Guardado...");
			var request = getRequestObject();

			request.onreadystatechange =
				function() {verificarActualizacion(request);};
				request.open("POST","guardarhorario.php",true);

				//alert("MOSTRANDO  ..."+JSON.stringify(info_horario));
			var datos="info_horario="+escape(JSON.stringify(info_horario));

			request.setRequestHeader
		                 ("Content-Type", 
		                  "application/x-www-form-urlencoded");
			request.send(datos);
	
}

//Se verifica que si haya sido correcta la actualizacion en la base de datos
function verificarActualizacion(request) {
	if (request.readyState== 4 &&
         request.status == 200) {
		if((request.responseText).indexOf("EXITO") == -1){
			alert("OCURRIO UN ERROR AL MODIFICAR LA PROGRAMACION QUIRURGICA, INFORME AL ADMINISTRADOR");
		}
	}		
}
//Metodo para cambiar los botones y eliminar la funcion del boton de paloma
function finalizar(btnFin,lista,boton){
	var confirma = confirm("Estas seguro de finalizar");
	if (confirma == true){
		lista.style.display="none";
		boton.style.display= "none";
		btnFin.src ="img/palomaVerde.png";
		btnFin.attributes["onclick"].value ="";
		confirma = false;
		
	}	

}
//Metodo para cargar una pagina desde javascript
function cargarPagina(pagina){
	location.href=pagina;
}



/*********************************************************************************************************
**********************************************************************************************************/
//FUNCIONES DE administrahorario.php
function quitarTexto(campo){
	    if(campo.value=="Buscar..."){
	 	   campo.value="";
		}
}

function mostrarTexto(campo){
	if(campo.value==""){
		campo.value="Buscar...";
	}
	
}
function searchdoctor() {
	var campo = document.getElementById('search_doctor');
	var texto = campo.value;	
	var request = getRequestObject();
	request.onreadystatechange =
	   function() {llenalistamedicos(request);};
	request.open("POST","obteninfomedico.php",true);
	var datos="medico_nombre="+escape(texto);
	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	request.send(datos);	
	document.getElementById("list_medicos").style.display="block";
	var campo = document.getElementById("doc_id");
	 campo.value = "";
	 campo = document.getElementById("doc_cedula");
	 campo.value = "";
	 campo = document.getElementById("doc_name");
	 campo.value = "";
	 campo = document.getElementById("doc_tel");
	 campo.value = "";
	 campo = document.getElementById("doc_hrentrada");
	 campo.value = 000;
	 campo = document.getElementById("doc_hrsalida");
	 campo.value = 000;
}

//Actualizar la lista que se esta mostrando
function llenalistamedicos(request) {
	var tag = document.getElementById("doctor_notfound");
	if (request.readyState== 4 &&
        request.status == 200) {
		var campo = document.getElementById("list_medicos");
		 if((request.responseText).indexOf("VACIO") == -1){
		    campo.innerHTML = request.responseText;
		    tag.innerHTML = "";
		 }
		 else{
		 	campo.display = "none";
		 	campo.value= "0";
		 	tag.innerHTML = "NO SE ENCONTRO EL MEDICO";
		 }
	}		
}


function llenarInfoMedico(lista){
	var posicion=lista.options.selectedIndex; //posicion
	var medico =lista.options[posicion].value; 
	var request = getRequestObject();
	request.onreadystatechange =
	   function() {llenadatosmedico(request);};
	request.open("POST","obtenmedico.php",true);
	var datos="idmedico="+escape(medico);
	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	request.send(datos);	
}
function llenadatosmedico(request) {
	if (request.readyState== 4 &&
         request.status == 200) {
		try{
		 	 var datos = eval("("+request.responseText+")");
			 var campo = document.getElementById("doc_id");
			 campo.value = datos.id_medico; 
			 campo = document.getElementById("doc_cedula");
			 campo.value = datos.cedula;
			 campo = document.getElementById("doc_name");
			 campo.value = datos.nombre;
			 campo = document.getElementById("doc_tel");
			 campo.value = datos.telefono;
			 campo = document.getElementById("doc_hrentrada");
			 campo.value = datos.hrentrada;
			 campo = document.getElementById("doc_hrsalida");
			 campo.value = datos.hrsalida;
		}
		catch(err){
			alert("ERROR");
		}

	}
}


//Método para enviar la información al servidor y almacenarlo en la base de datos.
function guardarInfoMedico() { 
	var idmedico = document.getElementById('doc_id');
	var telefono = document.getElementById('doc_tel');
	var hrentrada = document.getElementById('doc_hrentrada');
	var hrsalida = document.getElementById('doc_hrsalida');

	var info = {
		id_medico : idmedico.value,
		telefono : telefono.value,
		hrentrada : hrentrada.value,
		hrsalida : hrsalida.value
	};
	var request = getRequestObject();

	request.onreadystatechange =
		function() {actualizarinfomedico(request);};
		request.open("POST","actualizarmedico.php",true);

	var datos="infomedico="+escape(JSON.stringify(info));

	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	request.send(datos);	
	alert("Enviando  "+datos);
}

//Actualizar la lista que se esta mostrando
function actualizarinfomedico(request) {
	if (request.readyState== 4 &&
         request.status == 200) {
		 alert("INFORMACION DE MEDICO MODIFICADA EXITOSAMENTE");
		 
	}		
}
/**************************************************************************************************************
**************************************************************************************************************/
//schedule_anestecia.php

//Metodo para agregar a la interfaz (contenido de la tabla) el servicio que fue seleccionado
function finalizarAnest(numsala,btnFin,lista,etiqueta){
	var confirma = confirm("Estas seguro de finalizar");
	if (confirma == true){
		var posicion=lista.options.selectedIndex; //posicion
		var servicio =lista.options[posicion].text; 
		
		if(lista.options[posicion].value != 0){
			lista.options.selectedIndex = 0;
			etiqueta.innerHTML+=""+servicio+"<br/>";
			actualizarHorarioAnest(numsala,lista.options[posicion].value);
			
		}
		lista.style.display="none";
		btnFin.src ="img/palomaVerde.png";
		btnFin.attributes["onclick"].value ="";
		confirma = false;
		
	}	
	
	
}

//Metodo para ir actualizando la tabla en la base de datos conforme es agregado el nombre del anestesiologo 
//la tabla de la pagina, este se va actualizando en la base de datos
function actualizarHorarioAnest(numsala,anestesiologo){
	
	var id_turno = document.getElementById('id_turn');
	
	
	var info_horario_anest = {
				num_sala : numsala,
				id_anestesiologo : anestesiologo,
				id_turno : id_turno.value
			};
		
			//alert("Guardado...");
			var request = getRequestObject();

			request.onreadystatechange =
				function() {verificarActualizacionAnest(request);};
				request.open("POST","actualizarhorarioanest.php",true);

				//alert("MOSTRANDO  ..."+JSON.stringify(info_horario));
			var datos="info_horario_anest="+escape(JSON.stringify(info_horario_anest));

			request.setRequestHeader
		                 ("Content-Type", 
		                  "application/x-www-form-urlencoded");
			//alert("Enviando "+datos);
			request.send(datos);

	
}

//Se verifica que si haya sido correcta la actualizacion en la base de datos
function verificarActualizacionAnest(request) {
	if (request.readyState== 4 &&
         request.status == 200) {
		//alert("MENSAJE "+request.responseText);
		if((request.responseText).indexOf("EXITO") == -1){
			alert("OCURRIO UN ERROR AL ACTUALIZAR EL HORARIO DEL ANESTESIOLOGO, INFORME AL ADMINISTRADOR ");
		}
	}		
}

//Metodo para cargar una pagina desde javascript
function cargarPagina(pagina){
	location.href=pagina;
}


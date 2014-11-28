
function searchdoctor() {
	var campo = document.getElementById('search_doctor');
	var texto = campo.value;
	alert("texto "+ getRequestObject());

	var request = getRequestObject();
	request.onreadystatechange =
	   function() {llenalistamedicos(request);};
	request.open("POST","obteninfomedico.php",true);
	var datos="medico_nombre="+escape(texto);
	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	request.send(datos);	
	alert("Enviando   "+datos);
}

//Actualizar la lista que se esta mostrando
function llenalistamedicos(request) {
	if (request.readyState== 4 &&
         request.status == 200) {
		 var campo = document.getElementById("list_medicos");
		 campo.innerHTML = "<option value=\"0\">Selecciona...</option>"+request.responseText;
		 
	}		
}

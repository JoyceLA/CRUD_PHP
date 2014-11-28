function getRequestObject() {
  if (window.ActiveXObject) {
    return(new ActiveXObject("Microsoft.XMLHTTP"));
  } else if (window.XMLHttpRequest) {
    return(new XMLHttpRequest());
  } else {
    return(null);
  }
}

/********************************************************************************************************************
*********************************************************************************************************************/
//regirtrar.php
function registrarCuenta() {
	var registra = 0;
	var cuenta = document.getElementById('new_user');
	var passwd = document.getElementById('new_password');
	var conf_passwd = document.getElementById('conf_password');

	if(passwd.value != conf_passwd.value){
		document.getElementById("errorCuenta").innerHTML="NO COINCIDE LA CONTRASEÑA. VUELVE A INTENTAR";
		registra = 1;
	}
	else{
		document.getElementById("errorCuenta").innerHTML="";
		//VALIDACION DE CAMPOS VACIOS
		if(cuenta.value == ""){
			document.getElementById("errorCuenta").innerHTML="INGRESAR CUENTA";
			registra = 1;
		}
		if(passwd.value == ""){
			document.getElementById("errorCuenta").innerHTML="INGRESAR CONTRASEÑA";
			registra = 1;
		}
		if(conf_passwd.value == ""){
			document.getElementById("errorCuenta").innerHTML="CONFIRMAR CONTRASEÑA";
			registra = 1;
		}

		if(registra == 0){//LOS CAMPOS ESTAN LLENOS
			var info = {
				cuenta : cuenta.value,
				pass : passwd.value				
			};
			var request = getRequestObject();

			request.onreadystatechange =
				function() {confirmaregistro(request);};
				request.open("POST","registracuenta.php",true);

			var datos="info="+escape(JSON.stringify(info));

			request.setRequestHeader
		                 ("Content-Type", 
		                  "application/x-www-form-urlencoded");
			request.send(datos);	
			}


	}
	

}
function confirmaregistro(request) {
	if (request.readyState== 4 &&
         request.status == 200) {
		var resultado=request.responseText; 
		if (resultado.indexOf("EXITO")!=-1){
		    alert("CUENTA CREADA");
		}
		else {
			document.getElementById("errorCuenta").innerHTML="ERROR: CUENTA NO REGISTRADA";
		}
		var cuenta = document.getElementById('new_user');
		var passwd = document.getElementById('new_password');
		var conf_passwd = document.getElementById('conf_password');

		cuenta.value="";
		passwd.value= "";
		conf_passwd.value="";
		
	}		
}


/********************************************************************************************
*********************************************************************************************/
function desbloquear(celda,celda2,id) {
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


function finalizar(){
	window.location.reload();
}


function cancelarInfo(){
	
	window.location.reload();
}


function regresar(){
	window.history.back(); 
}

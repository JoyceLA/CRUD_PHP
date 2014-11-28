function getRequestObject() {
  if (window.ActiveXObject) {
    return(new ActiveXObject("Microsoft.XMLHTTP"));
  } else if (window.XMLHttpRequest) {
    return(new XMLHttpRequest());
  } else {
    return(null);
  }
}

function desbloquear(celda,celda2.id) {
	cuenta = id;
	alert(id.text+"-> ID");
	block = -1;
	if(celda2.innerHTML == 0){
		if(confirm("¿Desea bloquear esta cuenta?")){
			celda.style.backgroundColor="#DF0101";
			celda2.innerHTML = 1;
			block = 1;
		}
	}
	else{
		if(confirm("¿Desea habilitar la cuenta?")){
			celda.style.backgroundColor="#298A08";
			celda2.innerHTML = 0;
			block = 0;
		}		
	}
	var unlock = {
		cuenta : cuenta,
		block : block
	};
	var request = getRequestObject();

	request.onreadystatechange =
		function() {des_habilitar(request);};
		request.open("POST","actualizarestadocuenta.php",true);

	var datos="infounlock="+escape(JSON.stringify(unlock));

	request.setRequestHeader
                 ("Content-Type", 
                  "application/x-www-form-urlencoded");
	request.send(datos);	
	alert("Enviando  "+datos);
	
}

function regresar(){
	window.history.back(); 
}


//Actualizar la lista que se esta mostrando
function des_habilitar(request) {
	if (request.readyState== 4 &&
        request.status == 200) {
		alert("CUENTA DES/HABILITADA EXITOSAMENTE");
	}		
}
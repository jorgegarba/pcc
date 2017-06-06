// JavaScript Document
function nuevoAjax(){
	var xmlhttp=false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function buscarDato(){
	resul = document.getElementById('resultado');
	
	bus=document.frmbusqueda.dato.value;
	
	ajax=nuevoAjax();
	ajax.open("POST", "buscar_por_nom.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("busqueda="+bus)

}
function buscarCarrera(){
	resul = document.getElementById('id_carr');
	
	id_area=document.frmMatricula.id_area.value;
	
	ajax=nuevoAjax();
	ajax.open("POST", "buscar_carreras.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id_area="+id_area)

}
function buscarSemCarr(){
	resul = document.getElementById('id_sem_carr');
	
	id_carr=document.frmMatricula.id_carr.value;
	
	ajax=nuevoAjax();
	ajax.open("POST", "buscar_sem_carr.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id_carr="+id_carr)

}
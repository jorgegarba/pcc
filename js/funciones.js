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
function matricular(){
	resul = document.getElementById('mensaje');
	
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	if(dd<10) {
	    dd='0'+dd
	} 
	if(mm<10) {
	    mm='0'+mm
	} 

	today = yyyy+'-'+mm+'-'+dd;

	id_per=document.frmMatricula.id_per.value;
	id_sem_carr=document.frmMatricula.id_sem_carr.value;
	fec_mat=today;
	
	ajax=nuevoAjax();
	ajax.open("POST", "matriculas_grabar.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			resul.innerHTML = ajax.responseText
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id_per="+id_per+"&id_sem_carr="+id_sem_carr+"&fec_mat="+fec_mat)


}
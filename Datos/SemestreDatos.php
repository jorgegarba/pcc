<?php 

require_once("Modelos/Semestre.php");
require_once("funciones.php");
class SemestreDatos{
	function getSemestreById($id_sem){
		$xc = conectar();
		$sql = "SELECT * FROM semestre where id_sem='$id_sem'";
		$res = mysqli_query($xc,$sql);
		$fila = mysqli_fetch_array($res);
		$objSemestre = new Semestre();
		$objSemestre->id_sem = $fila["id_sem"];
		$objSemestre->nro_sem = $fila["nro_sem"];
		desconectar($xc);
		return $objSemestre;
	}
}
 ?>
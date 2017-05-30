<?php 

require_once("Modelos/Area.php");
require_once("funciones.php");
class AreaDatos{
	function getPersonas(){
		$area = new Area();
		$xc = conectar();
		$sql = "SELECT * FROM area";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		$fila = mysqli_fetch_array($res);
		return $fila;
	}
}
 ?>
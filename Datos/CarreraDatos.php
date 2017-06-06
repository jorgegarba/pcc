<?php 

require_once("Modelos/Carrera.php");
require_once("funciones.php");
class CarreraDatos{
	function getCarrerasByAreaId($id_area){
		$carreras[] = new Carrera;
		$xc = conectar();
		$sql = "SELECT * FROM carrera where id_area='$id_area'";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		array_pop($carreras);
		while($fila = mysqli_fetch_array($res)){
			$carreratmp = new Carrera;
			$carreratmp->id_carr = $fila['id_carr'];
			$carreratmp->nom_carr = $fila['nom_carr'];
			$carreratmp->id_area = $fila['id_area'];
			array_push($carreras, $carreratmp);
		}
		return $carreras;
	}
}
 ?>
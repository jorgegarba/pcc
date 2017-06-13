<?php 
require_once("Modelos/Area.php");
require_once("funciones.php");
class AreaDatos{
	function getAreas(){
		$areas[] = new Area;
		$xc = conectar();
		$sql = "SELECT * FROM area";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		array_pop($areas);
		while($fila = mysqli_fetch_array($res)){
			$areatmp = new Area;
			$areatmp->id_area = $fila['id_area'];
			$areatmp->nom_area = $fila['nom_area'];
			array_push($areas, $areatmp);
		}
		return $areas;
	}
	function getAreaById($id_area){
		$area = new Area;
		$xc = conectar();
		$sql = "SELECT * FROM area where id_area='$id_area'";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		$fila = mysqli_fetch_array($res);
		$area->id_area = $fila['id_area'];
		$area->nom_area = $fila['nom_area'];
		return $area;
	}
}
 ?>
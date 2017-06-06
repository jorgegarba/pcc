<?php 
require_once("Modelos/Matricula.php");
require_once("funciones.php");

class MatriculaDatos{
	
	function matricular($objMatricula){
		$xc = conectar();
		$sql = "INSERT INTO matricula (id_per,fec_mat,id_sem_carr) 
				VALUES ('$objMatricula->id_per','$objMatricula->fec_mat','$objMatricula->id_sem_carr')";
		mysqli_query($xc,$sql);
		desconectar($xc);
	}
}
 ?>
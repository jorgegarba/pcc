<?php 

require_once("Modelos/Persona.php");
require_once("funciones.php");
class PersonaDatos{
	function getPersonaById($id){
		$persona = new Persona();
		$xc = conectar();
		$sql = "SELECT * FROM persona WHERE id_per='$id'";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		$fila = mysqli_fetch_array($res);
		$persona->id_per = $fila['id_per'];
		$persona->nom_per = $fila['nom_per'];
		$persona->ape_per = $fila['ape_per'];
		$persona->dni_per = $fila['dni_per'];
		$persona->fec_nac_per = $fila['fec_nac_per'];
		$persona->sex_per = $fila['sex_per'];
		$persona->email_per = $fila['email_per'];
		$persona->cel_per = $fila['cel_per'];
		$persona->dir_per = $fila['dir_per'];
		$persona->log_per = $fila['log_per'];
		$persona->pass_per = $fila['pass_per'];
		$persona->id_tipo_per = $fila['id_tipo_per'];
		return $persona;
	}
	
}
 ?>

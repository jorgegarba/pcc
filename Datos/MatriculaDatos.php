<?php 
require_once("Modelos/Matricula.php");
require_once("Modelos/Persona.php");
require_once("Modelos/Semestre.php");
require_once("Modelos/Carrera.php");
require_once("Datos/CarreraDatos.php");
require_once("Datos/SemestreDatos.php");
require_once("Datos/SemestreCarreraDatos.php");
require_once("Datos/PersonaDatos.php");
require_once("funciones.php");

class MatriculaDatos{
	
	function matricular($objMatricula){
		$xc = conectar();
		$sql = "INSERT INTO matricula (id_per,fec_mat,id_sem_carr) 
				VALUES ('$objMatricula->id_per','$objMatricula->fec_mat','$objMatricula->id_sem_carr')";
		mysqli_query($xc,$sql);
		desconectar($xc);
	}
	function getMatriculasCompleto(){
		$xc = conectar();
		$sql = "SELECT  m.id_mat, p.id_per, sc.id_sem_carr, m.fec_mat
				FROM matricula m join persona p using(id_per)
				join semestrecarrera sc using(id_sem_carr)";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);

		$arrayMatriculasCompleto[] = new Matricula();
		array_pop($arrayMatriculasCompleto);

		while($fila=mysqli_fetch_array($res)){
			$objMatricula = new Matricula();
			$objMatricula->id_mat=$fila["id_mat"];


			$objPersonaDatos = new PersonaDatos();
			$objPersona = new Persona();
			$objPersona = $objPersonaDatos->getPersonaById($fila["id_per"]);

			$id_sem_carr = $fila["id_sem_carr"];

			$objSemestreCarreraDatos = new SemestreCarreraDatos();

			$objSemestre = new Semestre();
			$objCarrera = new Carrera();
			$objSemestre = $objSemestreCarreraDatos->getSemestreBySemestreCarreraId($id_sem_carr);
			$objCarrera = $objSemestreCarreraDatos->getCarreraBySemestreCarreraId($id_sem_carr);

			$objSemestreCarrera = new SemestreCarrera();
			$objSemestreCarrera->id_sem=$objSemestre;
			$objSemestreCarrera->id_carr=$objCarrera;

			$objMatricula->id_per = $objPersona;
			$objMatricula->id_sem_carr = $objSemestreCarrera;
			$objMatricula->fec_mat = $fila["fec_mat"];
			array_push($arrayMatriculasCompleto, $objMatricula);

		}
		return $arrayMatriculasCompleto;
	}
}
 ?>
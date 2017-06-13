<?php 

require_once("Modelos/SemestreCarrera.php");
require_once("Modelos/Semestre.php");
require_once("Modelos/Carrera.php");
require_once("Datos/SemestreDatos.php");
require_once("Datos/CarreraDatos.php");
require_once("funciones.php");
class SemestreCarreraDatos{
	function getSemestresCarrerasByCarreraId($id_carr){
		//retorna un arreglo de SemestreCarrera
		//En el campo id_sem > objeto semestr
		//En el campo id_carr > objteo carrera
		$semestreCarreras[] = new SemestreCarrera();
		$xc = conectar();
		//
		$sql = "SELECT sc.id_sem_carr, sc.id_carr, s.id_sem, s.nro_sem
				FROM semestre s, semestrecarrera sc, carrera c
				WHERE c.id_carr = sc.id_carr AND sc.id_carr = '$id_carr' and sc.id_sem = s.id_sem";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);

		array_pop($semestreCarreras);

		while($fila = mysqli_fetch_array($res)){
			$semestreCarreraTmp = new SemestreCarrera;
			$semestreTmp = new Semestre();
			$semestreCarreraTmp->id_sem_carr=$fila['id_sem_carr'];
			$semestreCarreraTmp->id_carr=$fila['id_carr'];
			$semestreTmp->id_sem=$fila['id_sem'];
			$semestreTmp->nro_sem=$fila['nro_sem'];
			$semestreCarreraTmp->id_sem=$semestreTmp;
			array_push($semestreCarreras, $semestreCarreraTmp);
		}

		return $semestreCarreras;

	}
	function getAllSemestreCarrera(){
		$semestresCarreras[] = new SemestreCarrera();
		$xc = conectar();
		$sql = "SELECT * FROM semestrecarrera";
		$res = mysqli_query($xc,$sql);
		desconectar($xc);
		array_pop($semestresCarreras);
		while($fila = mysqli_fetch_array($res)){
			$sem_carr_tmp = new SemestreCarrera;
			$sem_carr_tmp->id_sem_carr = $fila['id_sem_carr'];
			$sem_carr_tmp->id_sem = $fila['id_sem'];
			$sem_carr_tmp->id_carr = $fila['id_carr'];
			array_push($semestresCarreras, $sem_carr_tmp);
		}
		return $semestresCarreras;
	}

	function getSemestreBySemestreCarreraId($id_sem_carr){
		$xc = conectar();
		$sql = "SELECT * FROM semestrecarrera WHERE id_sem_carr='$id_sem_carr'";
		$res = mysqli_query($xc,$sql);
		$fila = mysqli_fetch_array($res);
		$id_sem = $fila[1];

		$objSemestreDatos = new SemestreDatos();
		$objSemestre = new Semestre();
		$objSemestre = $objSemestreDatos->getSemestreById($id_sem);
		return $objSemestre;
	}
	function getCarreraBySemestreCarreraId($id_sem_carr){
		$xc = conectar();
		$sql = "SELECT * FROM semestrecarrera WHERE id_sem_carr='$id_sem_carr'";
		$res = mysqli_query($xc,$sql);
		$fila = mysqli_fetch_array($res);
		$id_carr = $fila[2];

		$objCarreraDatos = new CarreraDatos();
		$objCarrera = new Carrera();
		$objCarrera = $objCarreraDatos->getCarreraById($id_carr);
		return $objCarrera;
	}

}
?>
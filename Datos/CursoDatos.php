<?php 
require_once("Modelos/Curso.php");
require_once("funciones.php");
class CursoDatos{
	function getCursosBySemCarrId($id_sem_carr){
		$xc = conectar();
		$sql = "SELECT *
				from semestrecarrera sc join cursosemestrecarrera csc
				on (sc.id_sem_carr='$id_sem_carr') join curso using (id_curso)";
		$res = mysqli_query($xc,$sql);		
		desconectar($xc);
		$arrayCursos[] = new Curso();
		array_pop($arrayCursos);

		while($fila = mysqli_fetch_array($res)){
			$objCurso = new Curso();
			$objCurso->id_curso=$fila["id_curso"];
			$objCurso->nom_curso=$fila["nom_curso"];
			array_push($arrayCursos, $objCurso);
		}
		return $arrayCursos;		
	}
}
 ?>
<?php
require('funciones.php');
require_once("Datos/MatriculaDatos.php");
require_once("Modelos/Matricula.php");

$id_per=leerParam("id_per","");
$id_sem_carr=leerParam("id_sem_carr","");
$fec_mat=leerParam("fec_mat","");

$objMatricula = new Matricula;
$objMatricula->id_per=$id_per;
$objMatricula->id_sem_carr=$id_sem_carr;
$objMatricula->fec_mat=$fec_mat;

$objMatriculaDatos = new MatriculaDatos();
$sql=$objMatriculaDatos->matricular($objMatricula);
//echo $sql . "holi";
?>


<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success">
		    <strong>EXITOOO!</strong> El alumno ha sido matriculado con éxito.
		</div>
    </div>
</div>



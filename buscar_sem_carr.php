<?php
require('funciones.php');
require_once("Datos/SemestreCarreraDatos.php");
require_once("Modelos/Semestre.php");
$id_carr=leerParam("id_carr","");
$objSemestreCarreraDatos = new SemestreCarreraDatos();

$semestresCarreras = $objSemestreCarreraDatos->getSemestresCarrerasByCarreraId($id_carr);

    if (count($semestresCarreras)==0) {
        echo "No hay Semestres registradas";
    }
    else{
        foreach ($semestresCarreras as $semCarrera) {
        	$semestreTmp = $semCarrera->id_sem;

        echo "<option value='$semCarrera->id_sem_carr'>$semestreTmp->nro_sem</option>";
        }
    }
?>

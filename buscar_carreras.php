<?php
require('funciones.php');
require_once("Datos/CarreraDatos.php");
$id_area=leerParam("id_area","");
$objCarreraDatos = new CarreraDatos();
$carreras = $objCarreraDatos->getCarrerasByAreaId($id_area);

    if (count($carreras)==0) {
        echo "No hay carreras registradas";
    }
    else{
        foreach ($carreras as $carrera) {
        echo "<option value='$carrera->id_carr'>$carrera->nom_carr</option>";
        }
    }
?>

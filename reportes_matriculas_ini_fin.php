<meta charset="utf-8">
<?php  

require("funciones.php");

require_once("Datos/MatriculaDatos.php");

$fec_ini = leerParam("fec_ini","");
$fec_fin = leerParam("fec_fin","");

//echo $fec_fin ." - ". $fec_ini;
//die();


$objMatriculaDatos = new MatriculaDatos();
$arrayMatriculas = $objMatriculaDatos->getMatriculasCompletoByFecIniFecFin($fec_ini,$fec_fin);

/********************************************  
Extract field names and write them to the $header  
variable  
/********************************************/ 
ob_start();

  
echo "&nbsp;&nbsp;<center><table border=\"1\" align=\"center\">";  

echo "<font size='4' face='Times New Roman, Times, serif' color='#084B8A'><center>REPORTE DE ALUMNOS MATRICULADOS DEL $fec_ini AL $fec_fin</center><font size='5' color=\"#ffffff\">";

echo "<tr bgcolor=\"#ffffff\"  align=\"center\"  height='40'>  
  
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>CÓDIGO DE MATRICULA</strong></font></td>  
  <TD  bgcolor='#084B8A'><font size='5' color=\"#ffffff\" ><strong>CARRERA</strong></font></TD>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>SEMESTRE</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>ALUMNO</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>FECHA DE MATRICULA</strong></font></td> 
</tr>";

//echo "<td  align='center'><strong>".$xnom_cem."</strong></td>";

foreach ($arrayMatriculas as $Matricula) {
	echo " <tr>";
	echo "<td align='center'><strong> $Matricula->id_mat </strong></td>";
	$objSemestreCarrera = $Matricula->id_sem_carr;
	$objSemestre = $objSemestreCarrera->id_sem;
	$objCarrera = $objSemestreCarrera->id_carr;
	echo "<td align='center'><strong> $objCarrera->nom_carr </strong></td>";
	echo "<td align='center'><strong> $objSemestre->nro_sem </strong></td>";
	$objPersona = $Matricula->id_per;
	$nomPersona = $objPersona->nom_per." ".$objPersona->ape_per;
	echo "<td align='center'><strong> $nomPersona</strong></td>";
	echo "<td align='center'><strong> $Matricula->fec_mat </strong></td>";
	echo "</tr>";
}
    
echo "</table>";  

//$reporte = ob_get_clean(); 

/********************************************  
Write the query, call it, and find the number of fields  
/********************************************/  


$reporte = ob_get_clean(); 


/********************************************  
Set the automatic downloadn section  
/********************************************/ 

header("Content-type: application/vnd.ms-excel");  
header("Content-Disposition: attachment; filename=Reporte Documentos.xls");  
header("Pragma: no-cache");  
header("Expires: 0");   

echo $reporte;  


?>
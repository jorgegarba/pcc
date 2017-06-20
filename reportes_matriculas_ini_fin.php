<meta charset="utf-8">
<?php  

require("funciones.php");

require_once("Datos/MatriculaDatos.php");

$tipo_rep = leerParam("tipo_rep","");
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
if($tipo_rep=="excel"){

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
}
if ($tipo_rep=="pdf") {
	ob_start();
	require("fpdf181/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,0,"Matricula de Alumnos del $fec_ini al $fec_fin",0,1,'C');
	$pdf->Ln(10);
	$pdf->Cell(20,0,'Id Mat.',0,1,'C');
	$pdf->Cell(100,0,'Carrera',0,1,'C');
	$pdf->Cell(200,0,'Semestre',0,1,'C');
	$pdf->Cell(250,0,'Alumno',0,1,'C');
	$pdf->Cell(350,0,'Fecha',0,1,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',9);
	foreach ($arrayMatriculas as $Matricula) {
		$pdf->Cell(20,0,"$Matricula->id_mat",0,1,'C');
		$objSemestreCarrera = $Matricula->id_sem_carr;
		$objSemestre = $objSemestreCarrera->id_sem;
		$objCarrera = $objSemestreCarrera->id_carr;
		$pdf->Cell(100,0,"$objCarrera->nom_carr",0,1,'C');
		$pdf->Cell(200,0,"$objSemestre->nro_sem",0,1,'C');
		$objPersona = $Matricula->id_per;
		$nomPersona = $objPersona->nom_per." ".$objPersona->ape_per;
		$pdf->Cell(250,0,"$nomPersona",0,1,'C');
		$pdf->Cell(350,0,"$Matricula->fec_mat",0,1,'C');
		$pdf->Ln(10);
	}

	$pdf->Output();
	ob_end_flush();
}

?>
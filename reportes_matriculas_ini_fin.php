<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<?php  

require("funciones.php");

require_once("Datos/MatriculaDatos.php");



$objMatriculaDatos = new MatriculaDatos();
$arrayMatriculas = $objMatriculaDatos->getMatriculasCompletoByFecIniFecFin();



/********************************************  
Extract field names and write them to the $header  
variable  
/********************************************/ 
ob_start();

  
echo "&nbsp;&nbsp;<center><table border=\"1\" align=\"center\">";  

echo "<font size='4' face='Times New Roman, Times, serif' color='#084B8A'><center>$texto</center><font size='5' color=\"#ffffff\">";

echo "<tr bgcolor=\"#ffffff\"  align=\"center\"  height='40'>  
  
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>CEMENTERIO</strong></font></td>  
  <TD  bgcolor='#084B8A'><font size='5' color=\"#ffffff\" ><strong>PABELLON</strong></font></TD>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NRO. NICHO</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>FILA</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NOMBRE DE DIFUNTO</strong></font></td>
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>PRIMER APELLIDO</strong></font></td> 
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>SEGUNDO APELLIDO</strong></font></td>  
  <TD  bgcolor='#084B8A'><font size='5' color=\"#ffffff\" ><strong>FECHA DE ENTIERRO</strong></font></TD>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>FECHA DE AUTORIZACIÓN</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>DNI. SOLICITANTE</strong></font></td>  
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>NOMBRE DE SOLICITANTE</strong></font></td>
  <td  bgcolor='#084B8A'><font size='5'  color=\"#ffffff\"><strong>COSTO DE NICHO</strong></font></td> 
  <td bgcolor='#084B8A' ><font size='5' color=\"#ffffff\"><strong>OBSERVACIONES</strong></font></td>  
  
</tr>";  
while($row=mysqli_fetch_array($fila))  
{   
	$xid_pend_conv=$row[0];
	$xnom_dif=$row[1];
	$xpriape_dif=$row[2];
	$xseguape_dif=$row[3];
	$xfentierro=$row[4];
	$xfautorizacion=$row[5]; 
	$xdni_sol=$row[6];
	$xnom_sol=$row[7];
	$xdir_sol=$row[8];
	$xid_nicho=$row[9];
	$xid_pabellon=$row[10];
	$xcel_sol=$row[11];
	$xnro_nicho=$row[12];
	$xcost_nicho=$row[13];
	$xnro_cuotas=$row[14];
	$xmonto_cuota=$row[15];
	$xest_pendiente=$row[16];
	$xcuota_ini=$row[17];
	$xnom_alcalde=$row[18];
	$xdir_alcalde=$row[19];
	$xdni_alcalde=$row[20];
	$xdescripcion=$row[21];
	$xid_sol=$row[22];


	$sql1   = "SELECT nom_pab, id_cem FROM pabellon where id_pab='$xid_pabellon' "; 
  $fila1  = mysqli_query($xc, $sql1 );
  $res1=mysqli_fetch_array($fila1);
  $xnom_pab=$res1[0];
  $xid_cem=$res1[1];

	$sql1   = "SELECT nom_cem FROM cementerio where id_cem='$xid_cem' "; 
  $fila1  = mysqli_query($xc, $sql1 );
  $res1=mysqli_fetch_array($fila1);
  $xnom_cem=$res1[0];
  
  $sql1   = "SELECT nro_fil FROM nicho where id_nicho='$xid_nicho' "; 
  $fila1  = mysqli_query($xc, $sql1 );
  $res1=mysqli_fetch_array($fila1);
  $xfila_nicho=$res1[0];
  
  $sql1   = "SELECT nom_cem FROM cementerio where id_cem='$xid_cem' "; 
  $fila1  = mysqli_query($xc, $sql1 );
  $res1=mysqli_fetch_array($fila1);
  $xnom_cem=$res1[0];
  
  $sql1   = "SELECT observaciones FROM difunto where id_nicho='$xid_nicho' "; 
  $fila1  = mysqli_query($xc, $sql1 );
  $res1=mysqli_fetch_array($fila1);
  $xobservaciones=$res1[0];
  
  
    echo "<tr>";    
              echo "<td  align='center'><strong>".$xnom_cem."</strong></td>";
			  echo "<td  align='center'><strong>".$xnom_pab."</strong></td>";
			  echo "<td  align='center'><strong>".$xnro_nicho."</strong></td>";
			  echo "<td  align='center'><strong>".$xfila_nicho."</strong></td>";
			  echo "<td  align='center'><strong>".$xnom_dif."</strong></td>";
			  echo "<td  align='center'><strong>".$xpriape_dif."</strong></td>";
			  echo "<td  align='center'><strong>".$xseguape_dif."</strong></td>";
			  echo "<td  align='center'><strong>".$xfentierro."</strong></td>";   
			  echo "<td  align='center'><strong>".$xfautorizacion."</strong></td>";
			  echo "<td  align='center'><strong>".$xdni_sol."</strong></td>";
			  echo "<td  align='center'><strong>".$xnom_sol."</strong></td>";
			  echo "<td  align='center'><strong>".$xcost_nicho."</strong></td>";
			  echo "<td  align='center'><strong>".$xobservaciones."</strong></td>"; 
        
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
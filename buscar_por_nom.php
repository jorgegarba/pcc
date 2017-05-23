<?php
require('funciones.php');
$xc=conectar();
$busqueda=leerParam("busqueda","");
// DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda<>''){
	//CUENTA EL NUMERO DE PALABRAS
	$trozos=explode(" ",$busqueda);
	$numero=count($trozos);
	if ($numero==1) {
		//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		$sql="SELECT * FROM persona WHERE id_tipo_per='1' AND (nom_per LIKE '%$busqueda%' OR ape_per LIKE '%$busqueda%' OR dni_per LIKE '%$busqueda%' OR cel_per LIKE '%$busqueda%');";
		
	} elseif ($numero>1) {
		//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		//busqueda de frases con mas de una palabra y un algoritmo especializado
		$sql="SELECT * , MATCH ( nom_per, ape_per, dni_per, cel_per ) AGAINST ( '$busqueda' );";
	}
}
$res = mysqli_query($xc,$sql);
desconectar($xc);

?>

<div class="row">
    <div class="col-lg-12">
        <h2>Basic Table</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombres y Apellidos</th>
                        <th>DNI</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   while ($fila = mysqli_fetch_array($res)) {
                    $xid_per = $fila["id_per"];
                    $xnomape = $fila["nom_per"]." ".$fila["ape_per"];
                    $xdni_per = $fila["dni_per"];
                    $xcel_per = $fila["cel_per"];
                        echo "<tr>";
                            echo "<td>$xid_per</td>";
                            echo "<td>$xnomape</td>";
                            echo "<td>$xdni_per</td>";
                            echo "<td>$xcel_per</td>";
                            echo "<td><a href='matriculas_matricular.php?xid_per=$xid_per'>Matricular</a></td>";
                        echo "</tr>";
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once("header.php");
require_once("funciones.php");

$xaccion=leerParam("accion","");
$xnom_per=leerParam("nom_per","");
$xape_per=leerParam("ape_per","");
$xdni_per=leerParam("dni_per","");
$xfec_nac_per=leerParam("fec_nac_per","");
$xsex_per=leerParam("sex_per","");
$xemail_per=leerParam("email_per","");
$xcel_per=leerParam("cel_per","");
$xdir_per=leerParam("dir_per","");
$xlog_per=leerParam("log_per","");
$xpass_per=leerParam("pass_per","");
$xid_tipo_per=leerParam("id_tipo_per","");
$xc = conectar();
$sql = "INSERT INTO persona (nom_per,ape_per,dni_per,fec_nac_per,sex_per,email_per,cel_per,dir_per,log_per,pass_per,id_tipo_per) VALUES ('$xnom_per','$xape_per','$xdni_per','$xfec_nac_per','$xsex_per','$xemail_per','$xcel_per','$xdir_per','$xlog_per','$xpass_per','$xid_tipo_per')";
// echo "CONSULTA -> $sql";
// die();
mysqli_query($xc,$sql);
desconectar($xc);

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Alumnos
                <?php 
                    if($xaccion == "crear"){
                        echo"<small>Registro Creado Correctamente</small>";
                    }
                    if($xaccion == "editar"){
                        echo"<small>Registro Editado Correctamente</small>";
                    }
                    if($xaccion == "eliminar"){
                        echo"<small>Registro Eliminado Correctamente</small>";
                    }
                ?>
            </h1>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
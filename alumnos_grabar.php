<?php require_once("header.php");
require_once("funciones.php");

$xaccion=leerParam("accion","");

if ($xaccion=="crear") {
    
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
}elseif ($xaccion=="editar") {
    $xid_per= leerParam("id_per","");
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
    $xc = conectar();
    $sql = "UPDATE persona SET nom_per='$xnom_per',ape_per='$xape_per',dni_per='$xdni_per',fec_nac_per='$xfec_nac_per',sex_per='$xsex_per',email_per='$xemail_per',cel_per='$xcel_per',dir_per='$xdir_per',log_per='$xlog_per',pass_per='$xpass_per' WHERE id_per='$xid_per'";
    // echo "CONSULTA -> $sql";
    // die();
    mysqli_query($xc,$sql);
    desconectar($xc);
}elseif ($xaccion=="") {//significa que estamos eliminadno el registro
    $xid_per= leerParam("xid_per","");
    $xc = conectar();
    $sql = "DELETE FROM persona WHERE id_per='$xid_per'";
    
    mysqli_query($xc,$sql);
    desconectar($xc);
}

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
                    if($xaccion == ""){
                        echo"<small>Registro Eliminado Correctamente</small>";
                    }
                ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="alumnos.php">Ver Alumnos</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
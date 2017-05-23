<?php 
require_once("header.php");
require_once("funciones.php");
$xc = conectar();
$sql = "SELECT * FROM persona WHERE id_tipo_per='1'";
$res = mysqli_query($xc,$sql);
desconectar($xc);

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Alumnos
                <small>listado</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="alumnos_registrar.php">Nuevo Alumno</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <h2>Basic Table</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombres y Apellidos</th>
                            <th>E-mail</th>
                            <th>Login</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       while ($fila = mysqli_fetch_array($res)) {
                        $xid_per = $fila["id_per"];
                        $xnomape = $fila["nom_per"]." ".$fila["ape_per"];
                        $xemail_per = $fila["email_per"];
                        $xlog_per = $fila["log_per"];
                            echo "<tr>";
                                echo "<td>$xid_per</td>";
                                echo "<td>$xnomape</td>";
                                echo "<td>$xemail_per</td>";
                                echo "<td>$xlog_per</td>";
                                echo "<td><a href='alumnos_editar.php?xid_per=$xid_per'><img src='imagenes/editar_usuario.png'></a> <a href='alumnos_grabar.php?xid_per=$xid_per'><img src='imagenes/eliminar_usuario.png'></a></td>";
                            echo "</tr>";
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
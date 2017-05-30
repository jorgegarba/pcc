<?php
require_once("Datos/PersonaDatos.php");
require_once("Datos/AreaDatos.php");
require_once("funciones.php");
require_once("header.php");

$xid_per = leerParam("xid_per","");
$objPersonaDatos = new PersonaDatos();
$persona = $objPersonaDatos->getPersonaById($xid_per);
?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Matriculas
                <small>Matricular</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="alumnos_grabar.php">
                <fieldset class="form-group">
                    <label for="nom_per">Nombres Completos:</label>
                    <input class="form-control" required="required" name="nom_per" id="nom_per" value="<?php echo $persona->nom_per." ".$persona->ape_per; ?>">
                </fieldset>
                <fieldset class="form-group">
                    <label for="dni_per">DNI:</label>
                    <input class="form-control" placeholder="Escriba su DNI:" required="required" name="dni_per" id="dni_per" maxlength="8" value="<?php echo $persona->dni_per?>">
                </fieldset>
                

                <fieldset class="form-group">
                        <label>Elija Carrera</label>
                        <select class="form-control" name="id_tipo_per">
                            <?php
                                while($fila=mysqli_fetch_array($res)){
                                    $xid_tipo_per = $fila["id_tipo_per"];
                                    $xdesc_tipo_per = $fila["desc_tipo_per"];
                                    echo "<option value='$xid_tipo_per'>$xdesc_tipo_per</option>";
                                } 
                             ?>
                        </select>
                </fieldset>

                <button type="submit" class="btn btn-secondary">Submit Button</button>
                <button type="reset" class="btn btn-secondary">Reset Button</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
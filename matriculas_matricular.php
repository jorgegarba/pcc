<?php
require_once("Datos/PersonaDatos.php");

require_once("Datos/AreaDatos.php");
require_once("funciones.php");
require_once("header.php");

$xid_per = leerParam("xid_per","");
$objPersonaDatos = new PersonaDatos();
$objAreaDatos = new AreaDatos();
$persona = $objPersonaDatos->getPersonaById($xid_per);
$areas = $objAreaDatos->getAreas();

?>
 <div class="container-fluid">
<script type="text/javascript" src="js/funciones.js"></script>
    <!-- Page Heading -->

    <div id="mensaje">
    </div>
    
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
            <form role="form" name="frmMatricula" onsubmit="matricular(); return false;">
            <input hidden="YES" name="id_per" id="id_per" value=<?php echo $xid_per; ?>>
                <fieldset class="form-group">
                    <label for="nom_per">Nombres Completos:</label>
                    <input class="form-control" required="required" name="nom_per" id="nom_per" value="<?php echo $persona->nom_per." ".$persona->ape_per; ?>">
                </fieldset>
                <fieldset class="form-group">
                    <label for="dni_per">DNI:</label>
                    <input class="form-control" placeholder="Escriba su DNI:" required="required" name="dni_per" id="dni_per" maxlength="8" value="<?php echo $persona->dni_per?>">
                </fieldset>
                

                <fieldset class="form-group">
                    <label>Elija Area</label>
                    <select class="form-control" name="id_area" onchange="buscarCarrera(); return false;">
                        <?php
                        foreach ($areas as $area) {
                            echo "<option value='$area->id_area'>$area->nom_area</option>";
                        }
                         ?>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label>Elija Carrera</label>
                        <select class="form-control" name="id_carr" id="id_carr" onchange="buscarSemCarr(); return false;">
                            
                        </select>

                </fieldset>

                <fieldset class="form-group">
                    <label>Elija el Semestre</label>
                        <select class="form-control" name="id_sem_carr" id="id_sem_carr">
                            
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
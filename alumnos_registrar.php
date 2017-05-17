<?php require_once("header.php"); 
require_once("funciones.php");

$xc = conectar();
$sql = "SELECT * FROM tipopersona";
$res = mysqli_query($xc,$sql);
desconectar($xc);

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Alumnos
                <small>Registrar</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="alumnos_grabar.php">
                <input hidden="YES" name="accion" value="crear">
                <fieldset class="form-group">
                    <label for="nom_per">Nombre:</label>
                    <input class="form-control" placeholder="Escriba su Nombre:" required="required" name="nom_per" id="nom_per">
                </fieldset>
                <fieldset class="form-group">
                    <label for="ape_per">Apellido:</label>
                    <input class="form-control" placeholder="Escriba su Apellido:" required="required" name="ape_per" id="ape_per">
                </fieldset>
                <fieldset class="form-group">
                    <label for="dni_per">DNI:</label>
                    <input class="form-control" placeholder="Escriba su DNI:" required="required" name="dni_per" id="dni_per" maxlength="8">
                </fieldset>
                <fieldset class="form-group">
                    <label for="fec_nac_per">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" required="required" name="fec_nac_per" id="fec_nac_per">
                </fieldset>
                <fieldset class="form-group">
                    <label>Sexo:</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex_per" id="sex_per1" value="H" checked> Hombre
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex_per" id="sex_per2" value="M"> Mujer
                        </label>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label for="email_per">Correo Electrónico:</label>
                    <input type="email" class="form-control" placeholder="Escriba su Correo Electrónico:" required="required" name="email_per" id="email_per" maxlength="50">
                </fieldset>
                <fieldset class="form-group">
                    <label for="cel_per">Número de Celular:</label>
                    <input class="form-control" placeholder="Escriba su Número de Celular" required="required" name="cel_per" id="cel_per" maxlength="15">
                </fieldset>
                <fieldset class="form-group">
                    <label for="dir_per">Dirección:</label>
                    <input class="form-control" placeholder="Escriba su Dirección" required="required" name="dir_per" id="dir_per" maxlength="100">
                </fieldset>
                <fieldset class="form-group">
                    <label for="log_per">Usuario:</label>
                    <input class="form-control" placeholder="Cree un usuario para acceder al sistema" required="required" name="log_per" id="log_per" maxlength="100">
                </fieldset>
                <fieldset class="form-group">
                    <label for="pass_per">Contraseña:</label>
                    <input type="password" class="form-control" placeholder="Cree una contraseña para acceder al sistema" required="required" name="pass_per" id="pass_per" maxlength="100">
                </fieldset>

                <fieldset class="form-group">
                        <label>Tipo de Usuario</label>
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
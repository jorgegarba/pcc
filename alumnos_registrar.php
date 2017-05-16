<?php require_once("header.php"); ?>
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
            <form role="form">
                <fieldset class="form-group">
                    <label for="nom_per">Nombre:</label>
                    <input class="form-control" placeholder="Escriba su Nombre:" required="required" name="nom_per" id="nom_per">
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
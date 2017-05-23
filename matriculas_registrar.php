<?php require_once("header.php"); ?>
<script type="text/javascript" src="js/funciones.js"></script>
 <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Matriculas
                <small>Registrar</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" name="frmbusqueda" onsubmit="buscarDato(); return false;">
                <fieldset class="form-group">
                    <label for="nom_per">Dato a buscar:</label>
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="dato" autocomplete="off">
                        <span class="input-group-btn"><button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button></span>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="row">
        <div id="resultado"></div>
    </div>
</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
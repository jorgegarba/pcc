<?php require_once("header.php");

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Reportes
                <small>Tecsup</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="matriculas_registrar.php">Registrar Matricula</a>
                </li>
            </ol>
        </div>
    </div>

    <br>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header card-default">
                    Matriculas registradas entre las fechas:
                </div>
                <div class="card-block">
                    <form method="POST" action="reportes_matriculas_ini_fin.php">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>Del</td>
                                <td><input type="date" name="fec_ini"></td>
                                <td>Al:</td>
                                <td><input type="date" name="fec_fin"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type='radio' name='tipo_doc' value='pdf' checked> PDF
                                    <input type='radio' name='tipo_doc' id='' value='excel' checked> EXCEL
                                </td>
                                <td colspan="2">
                                    <input class="btn btn-primary" type="submit" name="" value="Generar Reporte">            
                                </td>
                            </tr>
                        </table>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header card-default">
                    Matriculas registradas entre las fechas:
                </div>
                <div class="card-block">
                    Card content
                </div>
            </div>
        </div>
        <!-- /.col-sm-12 -->
    </div>


  


</div>
<!-- /.container-fluid -->
<?php require_once("footer.php"); ?>
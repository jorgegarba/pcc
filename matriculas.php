<?php require_once("header.php");

require_once("Datos/MatriculaDatos.php");
$objMatriculaDatos = new MatriculaDatos();
$arrayMatriculas = $objMatriculaDatos->getMatriculasCompleto();

?>
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Matriculas
                <small>Tecsup</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="matriculas_registrar.php">Registrar Matricula</a>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <h2>Matriculas Registradas</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código de Matricula</th>
                            <th>Carrera</th>
                            <th>Semestre</th>
                            <th>Alumno</th>
                            <th>Fecha Matricula</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       foreach ($arrayMatriculas as $Matricula) {
                            echo " <tr>";
                            echo "<td> $Matricula->id_mat </td>";

                            $objSemestreCarrera = $Matricula->id_sem_carr;
                            $objSemestre = $objSemestreCarrera->id_sem;
                            $objCarrera = $objSemestreCarrera->id_carr;
                            echo "<td> $objCarrera->nom_carr </td>";
                            echo "<td> $objSemestre->nro_sem </td>";
                            $objPersona = $Matricula->id_per;
                            $nomPersona = $objPersona->nom_per." ".$objPersona->ape_per;
                            echo "<td> $nomPersona</td>";
                            echo "<td> $Matricula->fec_mat </td>";
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
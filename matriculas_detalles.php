<?php require_once("header.php");

require_once("Datos/MatriculaDatos.php");
require_once("Modelos/Persona.php");
require_once("Modelos/Carrera.php");
require_once("Modelos/Semestre.php");
require_once("Modelos/Area.php");
require_once("Modelos/SemestreCarrera.php");
$objMatriculaDatos = new MatriculaDatos();
$id_mat = leerParam("id_mat","");

$objMatricula = new Matricula();
$objMatricula = $objMatriculaDatos->getMatriculaCompletaByMatriculaId($id_mat);

$objPersona = new Persona();
$objPersona = $objMatricula->id_per;

$objSemestreCarrera = new SemestreCarrera();
$objSemestreCarrera = $objMatricula->id_sem_carr;

$objSemestre = new Semestre();
$objSemestre = $objSemestreCarrera->id_sem;

$objCarrera = new Carrera();
$objCarrera = $objSemestreCarrera->id_carr;

$objArea = new Area();
$objArea = $objCarrera->id_area;

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
                <table>
                    <tr>
                        <td>
                            <strong>Area:</strong>
                        </td>
                        <td>
                            <?php echo $objArea->nom_area; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Carrera:</strong>
                        </td>
                        <td>
                            <?php echo $objCarrera->nom_carr; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Alumno(a):</strong>
                        </td>
                        <td>
                            <?php echo $objPersona->nom_per." ".$objPersona->ape_per; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Fecha de Matricula:</strong>
                        </td>
                        <td>
                            <?php echo $objMatricula->fec_mat; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Semestre:</strong>
                        </td>
                        <td>
                            <?php echo $objSemestre->nro_sem;?>
                        </td>
                    </tr>
                </table>


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
                            <th>Acciones</th>
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
                            echo "<td><a href=matriculas_detalles.php?id_mat=$Matricula->id_mat>Ver Detalles</a></td>";
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
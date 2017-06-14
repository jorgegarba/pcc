<?php require_once("header.php");

require_once("Datos/MatriculaDatos.php");
require_once("Datos/CursoDatos.php");
require_once("Modelos/Curso.php");
require_once("Modelos/Persona.php");
require_once("Modelos/Carrera.php");
require_once("Modelos/Semestre.php");
require_once("Modelos/Area.php");
require_once("Modelos/SemestreCarrera.php");
$objMatriculaDatos = new MatriculaDatos();
$objCursoDatos = new CursoDatos();
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

$arrayCursos = $objCursoDatos->getCursosBySemCarrId($objSemestreCarrera->id_sem_carr);


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
            <h2>Cursos por Jalar</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Código Curso</th>
                            <th>Nombre de Curso</th>
                            <th>Docente del Curso</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       foreach ($arrayCursos as $objCurso) {
                            echo "<tr>";
                            echo "<td> $objCurso->id_curso</td>";
                            echo "<td> $objCurso->nom_curso</td>";
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
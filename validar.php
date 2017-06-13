<?php
  require_once("funciones.php");
  $xlog_per = leerParam('log_per','' );
  $xpass_per  = leerParam('pass_per','' );
  $xc = conectar();
  $sql = "SELECT count(*) FROM persona WHERE log_per='$xlog_per' AND pass_per='$xpass_per'";
  $res = mysqli_query($xc, $sql );    
  $fila = mysqli_fetch_array($res);
  $xcan = $fila[0];


  if ( $xcan > 0 ) {
		session_start();

		$sql1 = "SELECT t.desc_tipo_per, p.nom_per, p.ape_per
					FROM tipopersona t, persona p
					WHERE t.id_tipo_per = p.id_tipo_per AND p.log_per = '$xlog_per'";
		$res1 = mysqli_query($xc, $sql1 );
	    $fila1 = mysqli_fetch_array($res1);
	    desconectar($xc);
	    $xdesc_tipo_per = $fila1[0];
	    $_SESSION["nom_per"]=$fila1[1];
	    $_SESSION["ape_per"]=$fila1[2];

		if($xdesc_tipo_per== "admin"){					
			 header("Location: principal.php");
		}else{
			if($xdesc_tipo_per== 'alumno'){							
				 header("Location: principal_alumnos.php");
			}else if($xdesc_tipo_per== 'docente'){
				 header("Location: principal_docente.php");
			}
		}
  }
  else
  {
  	desconectar($xc);
    header("Location: index.php");
  }
?>

<?php 

require "includes/dbh.php";
session_start();

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
    <?php include "header.php"; include "sidebar.php"; ?>

        <div id="page-wrapper" >
            <div id="page-inner">
			    <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Crear Recurso
                        </h1>
                    </div>
                </div> 

                <?php 
                
                if (isset($_REQUEST['addrecurso'])){
                    if ($_REQUEST['addrecurso'] == "emptyname"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Debe escribir un nombre.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "emptydatos"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Debe agregar datos personales.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "emptyestudios"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Debe agregar estudios cursados.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "emptytecnologia"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Debe seleccionar una tecnología.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "emptypath"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Debe agregar un path.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "pathcontainsspaces"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> El path no puede contener espacios.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "nombreusado"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> El nombre ya existe.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "pathusado"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> El path ya existe, debe elegir uno distinto.
                            </div>";
                    }
                    else  if ($_REQUEST['addrecurso'] == "erroragregarrecurso"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Surgió un problema con la base de datos. Por favor, vuelva a intentarlo.
                            </div>";
                    } else  if ($_REQUEST['addrecurso'] == "errorlugarindex"){
                        echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Un error inesperado surgió al intentar poner en el index. Por favor, vuelva a intentarlo.
                            </div>";
                    }
                }
                
                ?>


                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Crear Recurso
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="includes/add-recurso.php" enctype="multipart/form-data">
                                    <!--  enctype  multipart es para forms con distintos archivos de entradas (para
                                            subir archivos, imagenes etc, no se va a usar en esta web-->
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" name="nombre-recurso" value="<?php if(isset($_SESSION['nombreRecurso']))
                                            {echo $_SESSION['nombreRecurso']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Datos Personales</label>
                                            <input class="form-control" name="datos-personales-recurso" value="<?php if(isset($_SESSION['datosRecurso']))
                                            {echo $_SESSION['datosRecurso']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Estudios</label>
                                            <input class="form-control" name="estudios-recurso" value="<?php if(isset($_SESSION['estudiosRecurso']))
                                            {echo $_SESSION['estudiosRecurso']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Experiencias</label>
                                            <textarea class="form-control" rows="3" name="experiencias-recurso" value="<?php if(isset($_SESSION['experienciasRecurso']))
                                            {echo $_SESSION['experienciasRecurso']; } ?>"><?php if(isset($_SESSION['experienciasRecurso']))
                                            {echo $_SESSION['experienciasRecurso']; } ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tecnología</label>
                                            <select class="form-control" name="tecnologia-recurso">
                                            <option value="">Elegir Tecnología...</option>
                                            <?php 
                                            
                                            $sqlTecnologias = "SELECT * FROM tecnologias";
                                            $queryTecnologias = mysqli_query($conn, $sqlTecnologias);

                                            while ($rowTecnologias = mysqli_fetch_assoc($queryTecnologias)){

                                                $tId = $rowTecnologias['n_tecnologia_id'];
                                                $tName = $rowTecnologias['v_tecnologia_nombre'];

                                                if (isset($_SESSION['tecnologiaID'])){

                                                    if ($_SESSION['tecnologiaID'] == $tId){
                                                        echo"<option value='".$tId."' selected=''>".$tName."</option>";
                                                    }
                                                    else { echo "<option value='".$tId."'>".$tName."</option>"; }
                                                }
                                                else { echo "<option value='".$tId."'>".$tName."</option>"; }


                                            }
                                            
                                            ?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Hobbies</label>
                                            <input class="form-control" name="hobbies-recurso" value="<?php if(isset($_SESSION['hobbiesRecurso']))
                                            {echo $_SESSION['hobbiesRecurso']; } ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Path</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">www.web.com/</span>
                                                <input type="text" class="form-control" name="path-recurso" value="<?php if(isset($_SESSION['pathRecurso']))
                                            {echo $_SESSION['pathRecurso']; } ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Lugar del Index</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lugar-index-recurso" id="optionsRadiosInline1" value="1" <?php if(isset($_SESSION['lugarIndexRecurso']))
                                            { if ($_SESSION['lugarIndexRecurso'] == 1){
                                                echo "checked=''";
                                            } ; } ?>>1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lugar-index-recurso" id="optionsRadiosInline2" value="2" <?php if(isset($_SESSION['lugarIndexRecurso']))
                                            { if ($_SESSION['lugarIndexRecurso'] == 2){
                                                echo "checked=''";
                                            } ; } ?>>2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lugar-index-recurso" id="optionsRadiosInline3" value="3" <?php if(isset($_SESSION['lugarIndexRecurso']))
                                            { if ($_SESSION['lugarIndexRecurso'] == 3){
                                                echo "checked=''";
                                            } ; } ?>>3
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-default" name="agregar-recurso-btn">Agregar Recurso</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php include "footer.php"; ?>
        </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>

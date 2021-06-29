<?php 

require "includes/dbh.php";


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
                                            <input class="form-control" name="nombre-recurso">
                                        </div>
                                        <div class="form-group">
                                            <label>Datos Personales</label>
                                            <input class="form-control" name="datos-personales-recurso">
                                        </div>
                                        <div class="form-group">
                                            <label>Estudios</label>
                                            <input class="form-control" name="estudios-recurso">
                                        </div>
                                        <div class="form-group">
                                            <label>Experiencias</label>
                                            <textarea class="form-control" rows="3" name="experiencias-recurso"></textarea>
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

                                                echo "<option value='".$tId."'>".$tName."</option>";

                                            }
                                            
                                            ?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Hobbies</label>
                                            <input class="form-control" name="hobbies-recurso">
                                        </div>
                                        <div class="form-group">
                                            <label>Path</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">www.web.com/</span>
                                                <input type="text" class="form-control" placeholder="" name="path-recurso">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Lugar del Index</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lugar-index-recurso" id="optionsRadiosInline1" value="option1" checked="">1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lugar-index-recurso" id="optionsRadiosInline2" value="option2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="lugar-index-recurso" id="optionsRadiosInline3" value="option3">3
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

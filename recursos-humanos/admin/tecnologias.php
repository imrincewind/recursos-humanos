<?php 
require "includes/dbh.php";
$sqlTecnologias = "SELECT * FROM tecnologias";
$queryTecnologias = mysqli_query($conn, $sqlTecnologias);
$numTecnologias = $queryTecnologias->num_rows;
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
    <?php include "sidebar.php"; ?>
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tecnologías
                        </h1>
                    </div>
                </div>

                <?php
                    if (isset($_REQUEST['addtecnologia'])){
                        if ($_REQUEST['addtecnologia'] == "success"){
                            echo "<div class='alert alert-success'>
                                 ¡Tecnología agregada con <strong>Éxito</strong>!
                            </div>";
                        }
                        else if ($_REQUEST['addtecnologia'] == "error"){
                            echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Hubo un error inesperado y la Tecnología no pudo ser agregada.
                       </div>";
                        }
                    }
                    else if (isset($_REQUEST['editartecnologia'])){
                        if ($_REQUEST['editartecnologia'] == "success"){
                            echo "<div class='alert alert-success'>
                                 ¡Los cambios en la Tecnología fueron guardados con <strong>Éxito</strong>!
                            </div>";
                        }
                        else if ($_REQUEST['editartecnologia'] == "error"){
                            echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Hubo un error inesperado y los cambios en la Tecnología no puedieron ser guardados.
                       </div>";
                        }
                    }
                    else if (isset($_REQUEST['borrartecnologia'])){
                        if ($_REQUEST['borrartecnologia'] == "success"){
                            echo "<div class='alert alert-success'>
                                 ¡La tecnología fue borrada con <strong>Éxito</strong>!
                            </div>";
                        }
                        else if ($_REQUEST['borrartecnologia'] == "error"){
                            echo "<div class='alert alert-danger'>
                            <strong>¡Error!</strong> Hubo un error inesperado y la Tecnología no pudo ser guardada.
                       </div>";
                        }
                    }
                ?>



  <!-- /. ROW  -->
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Agregar Tecnología
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="includes/add-tecnologia.php">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" name="tecnologia-nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" name="tecnologia-meta-title">
                                        </div>
                                        <div class="form-group">
                                            <label>Tecnology Path</label>
                                            <input class="form-control" name="tecnologia-path">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="add-tecnologia-btn">Agregar Tecnologia</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                                      <div class="panel panel-default">
                        <div class="panel-heading">
                            Tecnologias
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Meta Title</th>
                                            <th>Tecnology Path</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 0;
                                        while ($rowTecnologias = mysqli_fetch_assoc($queryTecnologias)){
                                            $counter++;

                                            $id = $rowTecnologias['n_tecnologia_id'];
                                            $name = $rowTecnologias['v_tecnologia_nombre'];
                                            $metaTitle = $rowTecnologias['v_tecnologia_meta_title'];
                                            $tecnologiaPath = $rowTecnologias['v_tecnologia_path'];

                                        ?>
                                        <tr>
                                            <td><?php echo $counter ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $metaTitle ?></td>
                                            <td><?php echo $tecnologiaPath ?></td>
                                            <td>
                                                <button class = "popup-button" 
                                                onclick="window.open('../tecnologias.php?group=<?php echo $tecnologiaPath; ?>', 
                                                '_blank');">Ver</button>
                                                <button data-toggle="modal" data-target="#edit<?php 
                                                echo $id; ?>" class="popup-button">Editar</button>
                                                <button data-toggle="modal" data-target="#borrar<?php 
                                                echo $id; ?>" class="popup-button">Borrar</button>
                                            </td>
                                            <div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="includes/editar-tecnologia.php">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Editar Tecnologia</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="tecnologia-id" value="<?php echo $id; ?>"></input>
                                                                <div class="form-group">
                                                                    <label>Nombre</label>
                                                                    <input class="form-control" name="editar-nombre-tecnologia"
                                                                     value="<?php echo $name; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Meta Title</label>
                                                                    <input class="form-control" name="editar-meta-title-tecnologia"
                                                                     value="<?php echo $metaTitle; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tecnología Path</label>
                                                                    <input class="form-control" name="editar-tecnologia-path"
                                                                     value="<?php echo $tecnologiaPath; ?>">
                                                                </div>
                                                            </div>
                                                                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary" name="editar-tecnologia-btn">Guardar Cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="borrar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="includes/borrar-tecnologia.php">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Borrar Tecnologia</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="tecnologia-id" value="<?php echo $id; ?>"></input>
                                                                <p>¿Esta seguro que desea borrar esa Tecnología?</p>
                                                            </div>
                                                                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary" name="borrar-tecnologia-btn">Borrar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>

                                        <?php
                                        }

                                        ?>

                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

                 <!-- /. ROW  -->
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

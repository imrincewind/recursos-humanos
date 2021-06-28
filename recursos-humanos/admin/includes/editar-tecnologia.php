<?php

require "dbh.php";

if (isset($_POST['editar-tecnologia-btn'])){

    $id = $_POST['tecnologia-id'];
    $name = $_POST['editar-nombre-tecnologia'];
    $metaTitle = $_POST['editar-meta-title-tecnologia'];
    $tecnologiaPath = $_POST['editar-tecnologia-path'];
    
    $sqlEditarTecnologia = "UPDATE tecnologias SET v_tecnologia_nombre = '$name' , v_tecnologia_meta_title = '$metaTitle' , v_tecnologia_path = '$tecnologiaPath' WHERE n_tecnologia_id = '$id'";

    if (mysqli_query($conn, $sqlEditarTecnologia)){
        mysqli_close($conn);
        header("Location: ../tecnologias.php?editartecnologia=success");
        exit();
    } 
    else{
        mysqli_close($conn);
        header("Location: ../tecnologias.php?editartecnologia=error");
        exit();
    }

}
else {
    header("Location: ../index.php");
    exit();
}
<?php

require "dbh.php";



if (isset($_POST['agregar-recurso-btn'])){

    $name = $_POST['nombre-recurso'];
    $datos = $_POST['datos-personales-recurso'];
    $estudios = $_POST['estudios-recurso'];
    $experiencias = $_POST['experiencias-recurso'];
    $tecnologiaId = $_POST['tecnologia-recurso'];
    $hobbies = $_POST['hobbies-recurso'];
    $path = $_POST['path-recurso'];
    $lugarIndex = $_POST['lugar-index-recurso'];


    if(empty($name)){
        formError("emptyname");
    }
    else if(empty($datos)){
        formError("emptydatos");
    }
    else if(empty($estudios)){
        formError("emptyestudios");
    }
    //experiencias no se comprueba, puede no tener experiencia
    else if(empty($tecnologiaId)){
        formError("emptytecnologia");
    }
    //hobbies no se comprueba
    else if(empty($path)){
        formError("emptypath");
    }
    //lugar del index tiene default asi que no se comprueba


    if (strpos($path, " ") !== false){
        formError("pathcontainsspaces");
    }

    if(empty($lugarIndex)){
        $lugarIndex = 0;
    }

    $sqlCheckNombreRecurso = "SELECT v_nombre_recurso FROM recursos WHERE v_nombre_recurso = '$name' AND f_recurso_status != '2'";
    //nos fijamos que no exista un recurso con el mimso nombre y que si existe, no esté borrado
    $queryCheckNombreRecurso = mysqli_query($conn, $sqlCheckNombreRecurso);
    $rowsName = $queryCheckNombreRecurso->num_rows;
    if ($rowsName > 0){

        formError("nombreusado");
    }
    $sqlCheckPathRecurso = "SELECT v_recurso_path FROM recursos WHERE v_recurso_path = '$path' AND f_recurso_status != '2'";
    $queryCheckPathRecurso = mysqli_query($conn, $sqlCheckPathRecurso);
    $rowsPath = $queryCheckPathRecurso->num_rows;
    if ($rowsPath > 0){

        formError("pathusado");
    }


    if($lugarIndex != 0){
        $sqlCheckLugarIndexRecurso = "SELECT * FROM recursos WHERE n_index_ubicacion = '$lugarIndex' AND f_recurso_status != '2'";
        $queryCheckLugarIndexRecurso = mysqli_query($conn, $sqlCheckLugarIndexRecurso);
        $rowsLI = $queryCheckLugarIndexRecurso->num_rows;
        if ($rowsLI > 0){
    
            $sqlUpdateLugarIndexRecurso = "UPDATE recursos SET n_index_ubicacion = '0' WHERE n_index_ubicacion = '$lugarIndex'
            AND f_recurso_status != '2'";

            if (!mysqli_query($conn, $sqlUpdateLugarIndexRecurso)){
                formError("errorlugarindex");
            }
        }
    }


    $sqlAddRecurso = "INSERT INTO recursos (n_tecnologia_id, v_recurso_nombre, v_recurso_path, v_recurso_datos_personales, v_recurso_estudios, v_recurso_experiencias, v_recurso_hobbies, n_index_ubicacion, f_recurso_status)
                        VALUES ('$tecnologiaId','$name','$path','$datos','$estudios','$experiencias','$hobbies','$lugarIndex','1')";
    if (mysqli_query($conn, $sqlAddRecurso)){
        mysqli_close($conn);
        header("Location: ../recursos.php?addrecurso=success");
        exit();
    } 
    else{ 
        formError("erroragregarrecurso");
    }
}
else{
    header("Location: ../index.php");
    exit();
}



function formError($errorCode) {

    header("Location: ../crear-recurso.php?addrecurso=".$errorCode);
    exit();

}
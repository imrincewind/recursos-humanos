<?php


require "dbh.php";


if(isset($_POST['add-tecnologia-btn'])){

    $name = $_POST['tecnologia-nombre'];
    $metaTitle = $_POST['tecnologia-meta-title'];
    $tecnologiaPath = $_POST['tecnologia-path'];

    $sqlAddTecnologia = "INSERT INTO tecnologias (v_tecnologia_nombre, v_tecnologia_meta_title, v_tecnologia_path)
                            VALUES ('$name','$metaTitle','$tecnologiaPath')";

    if (mysqli_query($conn, $sqlAddTecnologia)){
        mysqli_close($conn);
        header("Location: ../tecnologias.php?addtecnologia=success");
        exit();
    }
    else{
        mysqli_close($conn);
        header("Location: ../tecnologias.php?addtecnologia=error");
        exit();
    }
}
else{
    header("Location: ../index.php");
    exit();
}
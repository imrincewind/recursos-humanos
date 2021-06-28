<?php

require "dbh.php";

if (isset($_POST['borrar-tecnologia-btn'])){

    $id = $_POST['tecnologia-id'];

    $sqlBorrarTecnologia = "DELETE FROM tecnologias WHERE n_tecnologia_id = '$id'";

    if(mysqli_query($conn, $sqlBorrarTecnologia)){
        mysqli_close($conn);
        header("Location: ../tecnologias.php?borrartecnologia=success");
        exit();

    }
    else {
        mysqli_close($conn);
        header("Location: ../tecnologias.php?borrartecnologia=error");
        exit();
    }
}
else {
    header("Location: ../index.php");
    exit();
}
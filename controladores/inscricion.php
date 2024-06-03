<?php
// Paso 1: importar la libreria
require "../Confi/conex.php";

// Paso 2: Verificar si se han enviado todos los datos esperados
if(isset($_POST["nombre"], $_POST["documento"], $_POST["celular"], $_POST["email"], $_POST["sexo"])) {
    // Almacenar las variables

    $fecha_sys = date('Y-m-d H:i:s');
    
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];

    
    
    // Paso 3: armar el SQL en una variable, asegurando que los valores estén correctamente escapados y rodeados de comillas si son de tipo string
    $sql_insertar = "INSERT INTO inscricion(fecha_Sys, nombre, documento, celular, email, sexo)  
                    VALUES ('$fecha_sys','$nombre', '$documento' , '$celular', '$email', '$sexo')";
    
    // Paso 4: enviar a la BD
    if($dbh->query($sql_insertar)) {
        echo "Información registrada correctamente";
    } else {
        echo "Error al registrar la información: " . $dbh->errorInfo()[2]; 
    }
} else {
    echo "Error: No se han recibido todos los datos esperados.";
}
?>


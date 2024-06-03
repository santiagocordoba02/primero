<?php
// Paso 1: importar la libreria
require "../Confi/conex.php";

// Paso 2: Verificar si se ha enviado el documento
if(isset($_POST["documento"])) {
    // Almacenar las variables
    $documento = $_POST["documento"];

    // Paso 3: armar el SQL en una variable
    $sql_eliminar = "DELETE FROM vender WHERE documento= '$documento'";

    // Paso 4: enviar a la BD
    if($dbh->query($sql_eliminar)) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $dbh->errorInfo()[2];
    }
} else {
    echo "Error: No se ha recibido el documento.";
}
?>



<?php
// Paso 1: importar la librería
require "../Confi/conex.php";

// Verificar la conexión a la base de datos
if (!isset($dbh)) {
    die("Error en la conexión a la base de datos.");
}

// Paso 2: Verificar si se han enviado todos los datos esperados
if (isset($_POST["codigo"]) && isset($_POST["documento"])) {
    $codigo = $_POST["codigo"];
    $documento = $_POST["documento"];
    $fecha_sys = date('Y-m-d H:i:s');

    // Paso 3: armar el SQL en una variable, asegurando que los valores estén correctamente escapados y rodeados de comillas si son de tipo string
    $sql_insertar = "UPDATE inscricion SET documento=:documento WHERE cod=:codigo";

    // Paso 4: preparar la consulta para evitar inyecciones SQL
    $stmt = $dbh->prepare($sql_insertar);
    $stmt->bindParam(':documento', $documento);
    $stmt->bindParam(':codigo', $codigo);

    // Paso 5: ejecutar la consulta
    try {
        if ($stmt->execute()) {
            echo "Información registrada correctamente";
        } else {
            echo "Error al registrar la información: " . $stmt->errorInfo()[2]; 
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    echo "Error: No se han recibido todos los datos esperados.";
}
?>

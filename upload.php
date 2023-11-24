<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdfFile"])) {
    $targetDir = "uploads/"; // Carpeta para guardar
    $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($fileType != "pdf") {
        echo json_encode(["success" => false, "message" => "Solo se permiten archivos PDF."]);
        exit; // Salir para evitar salida adicional
    }

    if (file_exists($targetFile)) {
        echo json_encode(["success" => false, "message" => "El archivo ya existe."]);
        exit; // Salir para evitar salida adicional
    }

    // Limitar el tamaño por seguridad
    if ($_FILES["pdfFile"]["size"] > 50000000) {
        echo json_encode(["success" => false, "message" => "El archivo es demasiado grande."]);
        exit; // Salir para evitar salida adicional
    }

    if ($uploadOk == 0) {
        echo json_encode(["success" => false, "message" => "Error al subir el archivo."]);
    } else {
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            echo json_encode(["success" => true, "message" => "El archivo ha sido subido correctamente.", "filename" => basename($_FILES["pdfFile"]["name"])]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al subir el archivo."]);
        }
    }

    exit; // Salir para evitar salida adicional
}
?>

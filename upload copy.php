<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdfFile"])) {
    $targetDir = "uploads/"; // Carpeta para guardar
    $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($fileType != "pdf") {
        echo "Solo se permiten archivos PDF.";
        $uploadOk = 0;
    }

    if (file_exists($targetFile)) {
        echo "El archivo ya existe.";
        $uploadOk = 0;
    }

    //limitar el tamaño por seguridad
    if ($_FILES["pdfFile"]["size"] > 50000000) {
        echo "El archivo es demasiado grande.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Error al subir el archivo.";
    } else {
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["pdfFile"]["name"])) . " ha sido subido.";
        } else {
            echo "Error al subir el archivo.";
        }
    }

    if ($uploadOk == 0) {
        echo json_encode(["success" => false, "message" => "Error al subir el archivo."]);
    } else {
        echo json_encode(["success" => true, "message" => "El archivo ha sido subido correctamente.", "filename" => basename($_FILES["pdfFile"]["name"])]);
    }
}
?>

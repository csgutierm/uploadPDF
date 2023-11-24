<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar y Visualizar PDFs</title>
</head>
<body>
    <h2>Buscar y Visualizar PDFs</h2>

    <?php
    $pdfDirectory = "uploads/";

    // Obtener la lista de archivos PDF en el directorio
    $pdfFiles = glob($pdfDirectory . "*.pdf");

    if (empty($pdfFiles)) {
        echo "<p>No hay archivos PDF disponibles.</p>";
    } else {
        echo "<ul>";
        foreach ($pdfFiles as $pdfFile) {
            $filename = basename($pdfFile);
            echo "<li><a href='view_pdf.php?filename=$filename'>$filename</a></li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>

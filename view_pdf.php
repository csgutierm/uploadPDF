<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Visualizar PDF</title>
</head>
<body>
    <?php
    if (isset($_GET['filename'])) {
        $filename = 'uploads/' . $_GET['filename'];
        echo '<embed src="' . $filename . '" width="800" height="600" type="application/pdf">';
    } else {
        echo 'Error: Archivo no encontrado.';
    }
    ?>
</body>
</html>

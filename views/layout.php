<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento Preventivo</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>


    <?php echo $contenido; ?>

    <footer>
        <p class="copyright">Todos los derechos Reservados <?php echo date('Y')?> 
        &copy;</p>
    </footer>

    <?php
        echo $script ?? '';
    ?>


</body>
</html>
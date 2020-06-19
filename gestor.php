<?php

    require 'models/conexion.models.php';

    require 'models/pagina.models.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor-Stockholm</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
    <?php if(Configpag::$robot){ ?>

        <meta name="robots" content="index,follow">

    <?php }else{ ?>

        <meta name="robots" content="noindex,nofollow">

    <?php } ?>
</head>
<body>

<?php

        include 'views/gestor/cabecera.gestor.php';

        include 'views/gestor/menu.gestor.php';

        include 'views/gestor/articulo.gestor.php';

        include 'views/gestor/galeria.gestor.php';



?>

    
</body>
</html>
<?php

	require 'models/pagina.models.php';

	require 'models/conexion.models.php';



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestor-Stockholm</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<?php
	
		if(Configpag::$robot){ ?>

			<meta name="robots" content="index,follow">

		<?php }else{ ?>

			<meta name="robots" content="noindex,nofollow">


		<?php }
	
	
	?>
</head>

<body>

	<?php
	
		include 'views/layout/cabecera.php';
	
	
	?>

	<main>
		
		<?php
		
			include 'views/slider.php';

			include 'views/info.php';
		
			include 'views/galeria.php';

			if($_GET['validarTodo'] == 'ok' ){ ?>

				

				<div id="ok" class="message message--ok">
					Has añadido correctamente los datos!!
				</div>
		
		
		
				<?php } ?>
		
				<?php
		
				if($_GET['validarTodo'] == 'error' ){ ?>
		
		
		
				<div id="ok" class="message message--error">
				Has añadido incorrectamente los datos!!
				</div>
		
			<?php } 

		?>
		
		
		
	</main>

	<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous">
	</script>
	
	<script src="script.js"></script>
</body>
</html>
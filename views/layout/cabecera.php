<header>
		<div class="center">
			<h1><a href="#"><?=Infopag::$logo?></a></h1>
			<i class="fas fa-bars"></i>
			<nav>
				<ul>

				<?php
 
					$cabecera=Conexion::select("SELECT * FROM `cabecera`");
				
					foreach($cabecera as $i => $cadaLi){ ?>

					<li>
						<a href="<?=$cadaLi->href?>" title="<?=$cadaLi->title?>"  class="este"><?=$cadaLi->contenido?>
							<div class="linea"></div>
						</a>
					</li>



					<?php } ?>
					
					
				</ul>

				
			</nav>

			
		</div>

		<a class="ir" href="gestor.php">Gestor</a>
</header>
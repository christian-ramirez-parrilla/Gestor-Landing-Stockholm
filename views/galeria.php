<section class="gallery clear">

<?php

    $galeria=Conexion::select("SELECT * FROM `galeria`");

    foreach($galeria as $i => $cadaFoto){ ?>

        <article>
            <div class="texto">
                <h4><?=$cadaFoto->h4?></h4>
                <p><?=$cadaFoto->p?></p>
            </div>
            <img src="<?=$cadaFoto->img_src?>" alt="<?=$cadaFoto->img_alt?>">
        </article>


    <?php }

?>

    
    
</section>
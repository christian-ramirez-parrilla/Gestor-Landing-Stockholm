<section class="info">
    <div class="center ">

        <?php
        
            $static=Conexion::select("SELECT * FROM `info_static`");
        
            foreach ($static as $i => $cadaSta) { ?>
                
                <h2><?=$cadaSta->h2?></h2>
                <p><?=$cadaSta->p?></p>

            <?php }
        ?>

        
        <div class="articulos">
            
            <?php
            
                $articulo=Conexion::select("SELECT * FROM `info_articulo`");
            
                foreach ($articulo as $i => $cadaArt) { ?>
                    
                    <article>
                        <h3><?=$cadaArt->h3?></h3>
                        <p><?=$cadaArt->p?></p>
                    </article>


                <?php }
            
            ?>

        </div>
    </div>
</section>
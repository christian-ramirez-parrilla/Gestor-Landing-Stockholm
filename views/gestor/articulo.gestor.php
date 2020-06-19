<div class="gestor__section"> 
    <h2 class="gestor__h2 gestor__h2--grande">Editando los articulos</h2>
    <ul class="gestor__ul">
        <li class="gestor__h2">Mostrando los articulos</li>
        <?php
        
        $articulo = Conexion::select('SELECT * FROM `info_articulo`');
        foreach ($articulo as $i => $cadaLi) { 
             ?>
            <li>
                <span><?php echo $cadaLi->h3;?></span>
                <a href="gestor.php?seccion=articulo&id=<?php echo $cadaLi->id;?>" title="Actualizar">
                    Actualizar el ID <?php echo $cadaLi->id;?>
                </a>
                <a href="controlers/articulo.controler.php?accion=eliminar&id=<?php echo $cadaLi->id;?>" title="Eliminar">
                    Eliminar el ID <?php echo $cadaLi->id;?>
                </a>
            </li>  
    <?php } ?>
    </ul>
    

    

    <?php
    
        if($_GET['seccion'] == 'articulo'){ ?>

        <?php
        
            $id=$_GET['id'];

            $articuloUp=Conexion::select("SELECT * FROM `info_articulo` WHERE `id`=$id");
        
        
        ?>

            <form class="gestor__form" action="controlers/articulo.controler.php?accion=actualizar" method="post">
                <h2 class="gestor__h2">Actualizar <?=$articuloUp[0]->h3?></h2>
                <input type="hidden" name="id" value="<?=$articuloUp[0]->id?>">
                <div class="checkbox">
                    <label for="activado">¿Activar este elemento?</label>
                    <input 
                    autocomplete="off" 
                    id="activado" 
                    name="activado"   
                    type="checkbox"
                    <?php
                    
                        if($articuloUp[0]->activado){ ?>
                            checked

                        <?php }else{ ?>

                        <?php }
                    
                    
                    
                    ?>
                    
                    >
                </div>
                <input autocomplete="off" id="h3"      name="h3"   type="text" placeholder="Introduce el titulo" value="<?=$articuloUp[0]->h3?>">
                <textarea autocomplete="off" id="p"   name="p" type="text" placeholder="Introduce el texto"><?=$articuloUp[0]->p?></textarea>
            
                <div class="checkbox">
                    <label for="target">¿Se abre en una nueva ventana?</label>
                    <input 
                    autocomplete="off" 
                    id="target"  
                    name="target"   
                    type="checkbox"
                    <?php
                    
                        if($articuloUp[0]->target){ ?>
                            checked

                        <?php }else{ ?>

                        <?php }
                    
                    
                    
                    ?>
                    
                    >
                </div>

                

                <input type="submit" value="Actualizar <?=$articuloUp[0]->h3?>">
            </form>


        <?php }else{ ?>

            <form class="gestor__form" action="controlers/articulo.controler.php?accion=insertar" method="post">
                <h2 class="gestor__h2">Añadir un elemento a los articulos</h2>
                <div class="checkbox">
                    <label for="activado">¿Activar este elemento?</label>
                    <input autocomplete="off" id="activado" name="activado"   type="checkbox">
                </div>
                <input autocomplete="off" id="h3"      name="h3"   type="text" placeholder="Introduce el titulo">
                <textarea autocomplete="off" id="p"   name="p" type="text" placeholder="Introduce el texto"></textarea>
            
                <div class="checkbox">
                    <label for="target">¿Se abre en una nueva ventana?</label>
                    <input autocomplete="off" id="target"  name="target"   type="checkbox">
                </div>

                

                <input type="submit" value="Añadir a los articulos">
            </form>



        <?php }
    
    
    
    
    ?>



    
</div>
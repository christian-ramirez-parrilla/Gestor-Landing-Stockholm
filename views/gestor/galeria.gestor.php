<div class="gestor__section"> 
    <h2 class="gestor__h2 gestor__h2--grande">Editando la galeria</h2>
    <ul class="gestor__ul">
        <li class="gestor__h2">Mostrando la galeria</li>
        <?php
        
        $galeria = Conexion::select('SELECT * FROM `galeria`');
        foreach ($galeria as $i => $cadaLi) { 
             ?>
            <li>
                <span>Foto <?php echo $cadaLi->id;?></span>
                <a href="gestor.php?seccion=galeria&id=<?php echo $cadaLi->id;?>" title="Actualizar">
                    Actualizar el ID <?php echo $cadaLi->id;?>
                </a>
                <a href="controlers/galeria.controler.php?accion=eliminar&id=<?php echo $cadaLi->id;?>" title="Eliminar">
                    Eliminar el ID <?php echo $cadaLi->id;?>
                </a>
            </li>  
    <?php } ?>
    </ul>
    
    


    <?php
    
            if($_GET['seccion'] == 'galeria'){ ?>

                <?php

                    $id=$_GET['id'];
                
                    $galeriaUp=Conexion::select("SELECT * FROM `galeria` WHERE `id`=$id");
                
                
                ?>

                <form class="gestor__form" action="controlers/galeria.controler.php?accion=actualizar" method="post">
                    <h2 class="gestor__h2">Actualizar Foto <?=$galeriaUp[0]->id?></h2>
                    <input type="hidden" name="id" value="<?=$galeriaUp[0]->id?>">
                    <div class="checkbox">
                        <label for="activado">¿Activar este elemento?</label>
                        <input 
                        autocomplete="off" 
                        id="activado" 
                        name="activado"   
                        type="checkbox"
                        <?php
                        
                            if($galeriaUp[0]->activado){ ?>
                                checked

                            <?php }else{ ?>


                            <?php }
                        
                        
                        
                        ?>
                        >
                    </div>
                    <input autocomplete="off" id="h4"      name="h4"   type="text" placeholder="Introduce el h4" value="<?=$galeriaUp[0]->h4?>">
                    <input autocomplete="off" id="p"   name="p" type="text" placeholder="Introduce el parrafo" value="<?=$galeriaUp[0]->p?>">
                    <input autocomplete="off" id="img_src"   name="img_src" type="text" placeholder="Introduce la img_src" value="<?=$galeriaUp[0]->img_src?>">
                    <input autocomplete="off" id="img_alt"   name="img_alt" type="text" placeholder="Introduce la img_alt" value="<?=$galeriaUp[0]->img_alt?>">
                    
                    <div class="checkbox">
                        <label for="target">¿Se abre en una nueva ventana?</label>
                        <input 
                        autocomplete="off" 
                        id="target"  
                        name="target"   
                        type="checkbox"
                        <?php
                        
                                if($galeriaUp[0]->target){ ?>
                                    checked

                                <?php }else{ ?>

                                <?php }
                        
                        ?>
                        >
                    </div>

                    

                    <input type="submit" value="Actualizar Foto <?=$galeriaUp[0]->id?>">
                </form>

            <?php }else{ ?>

                <form class="gestor__form" action="controlers/galeria.controler.php?accion=insertar" method="post">
                    <h2 class="gestor__h2">Añadir un elemento a la galeria</h2>
                    <div class="checkbox">
                        <label for="activado">¿Activar este elemento?</label>
                        <input autocomplete="off" id="activado" name="activado"   type="checkbox">
                    </div>
                    <input autocomplete="off" id="h4"      name="h4"   type="text" placeholder="Introduce el h4">
                    <input autocomplete="off" id="p"   name="p" type="text" placeholder="Introduce el parrafo">
                    <input autocomplete="off" id="img_src"   name="img_src" type="text" placeholder="Introduce la img_src">
                    <input autocomplete="off" id="img_alt"   name="img_alt" type="text" placeholder="Introduce la img_alt">
                    
                    <div class="checkbox">
                        <label for="target">¿Se abre en una nueva ventana?</label>
                        <input autocomplete="off" id="target"  name="target"   type="checkbox">
                    </div>

                    

                    <input type="submit" value="Añadir a la galeria">
                </form>

            <?php }
    
    
    
    
    
    ?>
    
    
</div>
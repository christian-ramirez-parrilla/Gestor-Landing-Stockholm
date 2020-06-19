<div class="gestor__section"> 
    <h2 class="gestor__h2 gestor__h2--grande">Editando el menú</h2>
    <ul class="gestor__ul">
        <li class="gestor__h2">Mostrando menú</li>
        <?php
        
        $cabecera = Conexion::select('SELECT * FROM `cabecera`');
        foreach ($cabecera as $i => $cadaLi) { 
             ?>
            <li>
                <span><?php echo $cadaLi->contenido;?></span>
                <a href="gestor.php?seccion=menu&id=<?php echo $cadaLi->id;?>" title="Eliminar">
                    Actualizar el ID <?php echo $cadaLi->id;?>
                </a>
                <a href="controlers/menu.controler.php?accion=eliminar&id=<?php echo $cadaLi->id;?>" title="Eliminar">
                    Eliminar el ID <?php echo $cadaLi->id;?>
                </a>
            </li>  
    <?php } ?>
    </ul>
    
    <?php

        if($_GET['seccion'] == 'menu'){ ?>

            <?php
            
                $id=$_GET['id'];

                $menuUP=Conexion::select("SELECT * FROM `cabecera` WHERE `id`=$id");
            
            ?>

            <form class="gestor__form" action="controlers/menu.controler.php?accion=actualizar" method="post">
                <h2 class="gestor__h2">Actualizar <?=$menuUP[0]->contenido?></h2>
                <input type="hidden" name="id" value="<?=$menuUP[0]->id?>">
                <div class="checkbox">
                    <label for="activado">¿Activar este elemento?</label>
                    <input 
                    autocomplete="off" 
                    id="activado" 
                    name="activado"   
                    type="checkbox"
                    <?php
                    
                        if($menuUP[0]->activado){ ?>

                            checked

                        <?php }else{ ?>

                        <?php }
                    
                    
                    ?>
                    >
                </div>
                <input autocomplete="off" id="enlace"      name="enlace"   type="text" placeholder="Introduce el href" value="<?=$menuUP[0]->href?>">
                <input autocomplete="off" id="title"   name="title"type="text" placeholder="Introduce el title" value="<?=$menuUP[0]->title?>">
                <input autocomplete="off" id="contenido"   name="contenido"type="text" placeholder="Introduce el nombre" value="<?=$menuUP[0]->contenido?>">
                
                <div class="checkbox">
                    <label for="target">¿Se abre en una nueva ventana?</label>
                    <input 
                    autocomplete="off" 
                    id="target"  
                    name="target"   
                    type="checkbox"
                    <?php
                    
                        if($menuUP[0]->target){ ?>

                            checked

                        <?php }else{ ?>

                        <?php }
                    
                    ?>
                    >
                </div>

                <input autocomplete="off" id="clase"      name="clase"   type="text" placeholder="Introduce la clase" value="<?=$menuUP[0]->clase?>">

                <input type="submit" value="Actualizar <?=$menuUP[0]->contenido?>">
            </form>

        <?php }else{ ?>

            <form class="gestor__form" action="controlers/menu.controler.php?accion=insertar" method="post">
                <h2 class="gestor__h2">Añadir un elemento al menú</h2>
                <div class="checkbox">
                    <label for="activado">¿Activar este elemento?</label>
                    <input autocomplete="off" id="activado" name="activado"   type="checkbox">
                </div>
                <input autocomplete="off" id="enlace"      name="enlace"   type="text" placeholder="Introduce el href">
                <input autocomplete="off" id="title"   name="title"type="text" placeholder="Introduce el title">
                <input autocomplete="off" id="contenido"   name="contenido"type="text" placeholder="Introduce el nombre">
                
                <div class="checkbox">
                    <label for="target">¿Se abre en una nueva ventana?</label>
                    <input autocomplete="off" id="target"  name="target"   type="checkbox">
                </div>

                <input autocomplete="off" id="clase"      name="clase"   type="text" placeholder="Introduce la clase">

                <input type="submit" value="Añadir al menú">
            </form>

        <?php }
    
    
    
    
    ?>
    
    
</div>
<?php

    require '../models/conexion.models.php';

    require '../models/pagina.models.php';

    $accion=$_GET['accion'];

    switch ($accion) {
        case 'insertar':

            if($_POST['enlace'] == 'on'){

                $activado=1;

            }else{

                $activado=0;

            }

            $h4= new ValidarForm($_POST['h4'],false,20,1);
            
            $h4San=$h4->sanear();

            $p= new ValidarForm($_POST['p'],false,20,1);

            $pSan=$p->sanear();

            $img_src= new ValidarForm($_POST['img_src'],false,30,1);

            $img_srcSan=$img_src->sanear();

            $img_alt= new ValidarForm($_POST['img_alt'],false,20,1);

            $img_altSan= $img_alt->sanear();

            if($_POST['target'] == 'on'){

                $target=1;

            }else{

                $target=0;

            }

            if( $h4->validarTodo() &&
            
                $p->validarTodo()  &&
            
                $img_src->validarTodo() &&
            
                $img_alt->validarTodo()

            ){

                
                Gestor::sql("INSERT INTO `galeria` (`id`,`activado`,`h4`,`p`,`img_src`,`img_alt`,`target`) VALUES (NULL,'$activado','$h4San','$pSan','$img_srcSan','$img_altSan','$target')");

                header('Location: ../index.php?validarTodo=ok');

            }else{

                header('Location: ../index.php?validarTodo=error');


            }

            break;
        
        
        
        case 'eliminar':

            $id=$_GET['id'];
            
            Gestor::sql("DELETE FROM `galeria` WHERE `id`=$id");

            header('Location: ../gestor.php');



            break;


        case 'actualizar':

            $id=$_POST['id'];

            if($_POST['activado'] == 'on'){

                $activado=1;

            }else{

                $activado=0;

            }


            $h4= new ValidarForm($_POST['h4'],false,20,1);

            $h4San = $h4->sanear();

            $p= new ValidarForm($_POST['p'],false,20,1);

            $pSan= $p->sanear();

            $img_src= new ValidarForm($_POST['img_src'],false,30,1);

            $img_srcSan= $img_src->sanear();

            $img_alt= new ValidarForm($_POST['img_alt'],false,20,1);

            $img_altSan= $img_alt->sanear();

            if( $_POST['target'] == 'on'){

                $target=1;

            }else{

                $target=0;

            }


            if( $h4->validarTodo()      &&

                $p->validarTodo()       &&

                $img_src->validarTodo() &&

                $img_alt->validarTodo()

            ){


                Gestor::sql("UPDATE `galeria` SET `activado`='$activado',`h4`='$h4San',`p`='$pSan',`img_src`='$img_srcSan',`img_alt`='$img_altSan',`target`='$target' WHERE `id`=$id");

                header('Location: ../index.php?validarTodo=ok');


            }else{

                header('Location: ../index.php?validarTodo=error');

            }

            break;
    }

?>
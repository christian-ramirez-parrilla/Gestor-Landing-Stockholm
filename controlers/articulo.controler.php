<?php

    require '../models/conexion.models.php';

    require '../models/pagina.models.php';

    $accion = $_GET['accion'];

    switch ($accion) {
        case 'insertar':
            
            if($_POST['activado'] == 'on'){

                $activado=1;

            }else{

                $activado=0;

            }

            $h3= new ValidarForm($_POST['h3'],false,30,1);

            $h3San=$h3->sanear();

            $p= new ValidarForm($_POST['p'],false,500,1);

            $pSan=$p->sanear();

            if($_POST['target'] == 'on'){

                $target=1;

            }else{

                $target=0;

            }

            if( $h3->validarTodo() &&
            
                $p->validarTodo()
            
            
            
            ){

                

                Gestor::sql("INSERT INTO `info_articulo` (`id`,`activado`,`h3`,`p`,`target`) VALUES (NULL,'$activado','$h3San','$pSan','$target')");

                header('Location: ../index.php?validarTodo=ok');


            }else{

                header('Location: ../index.php?validarTodo=error');

            }



            break;
        
        case 'eliminar':
            
            $id=$_GET['id'];

            Gestor::sql("DELETE FROM `info_articulo` WHERE `id`=$id");

            header('Location: ../gestor.php');


            break;

        case 'actualizar':

            $id=$_POST['id'];

            if($_POST['activado'] == 'on'){

                $activado=1;

            }else{

                $activado=0;

            }


            $h3= new ValidarForm($_POST['h3'],false,30,1);

            $h3San = $h3->sanear();

            $p= new ValidarForm($_POST['p'],false,500,1);

            $pSan=$p->sanear();

            if($_POST['target'] == 'on'){

                $target=1;

            }else{

                $target=0;

            }

            if( $h3->validarTodo() && $p->validarTodo()){

                Gestor::sql("UPDATE `info_articulo` SET `activado`='$activado',`h3`='$h3San',`p`='$pSan',`target`='$target' WHERE `id`=$id");

                header('Location: ../index.php?validarTodo=ok');


            }else{

                header('Location: ../index.php?validarTodo=error');
            
            }

        break;
    }


?>
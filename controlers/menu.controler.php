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

            $enlace = new ValidarForm($_POST['enlace'],false,30,1);

            $enlaceSan= $enlace->sanear();

            $title = new  ValidarForm($_POST['title'],false,30,1);

            $titleSan= $title->sanear();

            $contenido = new ValidarForm($_POST['contenido'],false,40,1);

            $contenidoSan= $contenido->sanear();

            if($_POST['target'] == 'on'){

                $target=1;

            }else{

                $target=0;

            }

            $clase = new ValidarForm($_POST['clase'],false,15,1);

            $claseSan= $clase->sanear();
            

            if( $enlace->validarTodo() &&
               
                $title->validarTodo()  &&
            
                $contenido->validarTodo() &&

                $clase->validarTodo()
            
            ){

                
                Gestor::sql("INSERT INTO `cabecera` (`id`,`activado`,`href`,`title`,`contenido`,`target`,`clase`) VALUES (NULL,'$activado','$enlaceSan','$titleSan','$contenidoSan','$target','$claseSan')");


                header('Location: ../index.php?validarTodo=ok');



            }else{


                header('Location: ../index.php?validarTodo=error');

            }


            break;
        
        case 'eliminar':
            
            $id=$_GET['id'];

            Gestor::sql("DELETE FROM `cabecera` WHERE `id`=$id");

            header('Location: ../gestor.php');


            break;


        case 'actualizar':

            $id=$_POST['id'];

            if($_POST['activado'] == 'on'){

                $activado=1;
            }else{

                $activado=0;
            }

            $href = new ValidarForm($_POST['enlace'],false,30,1); 

            $hrefSan = $href->sanear();

            $title = new ValidarForm($_POST['title'],false,30,1);

            $titleSan = $title->sanear();

            $contenido = new ValidarForm($_POST['contenido'],false,40,1);

            $contenidoSan = $contenido->sanear();

            if($_POST['target'] == 'on'){

                $target=1;
            }else{
                $target=0;
            }

            $clase = new ValidarForm($_POST['clase'],false,15,1);

            $claseSan = $clase->sanear();

            if( 
                $href->validarTodo()      &&
            
                $title->validarTodo()     &&

                $contenido->validarTodo() &&

                $clase->validarTodo()
            ){

                Gestor::sql("UPDATE `cabecera` SET `activado`='$activado',`href`='$hrefSan',`title`='$titleSan',`contenido`='$contenidoSan',`target`='$target',`clase`='$claseSan' WHERE `id`=$id");

                header('Location: ../index.php?validarTodo=ok');

            }else{

                header('Location: ../index.php?validarTodo=error');


            }

            break;
    }

?>
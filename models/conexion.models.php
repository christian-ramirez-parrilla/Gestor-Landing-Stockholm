<?php

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

    header("Cache-Control: post-check=0, pre-check=0", false);

    header("Pragma: no-cache");

    class Conexion{

        private const HOST = '';
        private const USER = '';
        private const PASS = '';
        private const BBDD = '';

        public static function iniciar(){

            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE
            );
            $dbh = new PDO("mysql:host=".self::HOST.";dbname=".self::BBDD.";charset=UTF8",self::USER,self::PASS, $options);

            return $dbh;


        }

        public static function select($x){

            try{

                $seleccionar=self::iniciar()->prepare($x);
                $seleccionar->setFetchMode(PDO::FETCH_OBJ);
                $seleccionar->execute();

            }catch(PDOException $e){

                return 'Falló ejecutar la SELECT: ' . $e->getMessage();

            }

            return  $seleccionar->fetchAll();

        }

    }

    class Gestor{

        public static function sql($query){

            try{

                $ejecutar=Conexion::iniciar()->prepare($query);

                $ejecutar->execute();

            }catch(PDOException $e){

                return 'Falló Ejecutar SQL: ' . $e->getMessage();

            }


            return array( 'message' => 'ok' , 'cual' => 'Se ha ejecutado correctamente');
        
        }

    }



?>
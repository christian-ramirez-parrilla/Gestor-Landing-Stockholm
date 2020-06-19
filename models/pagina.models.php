<?php

    class Configpag{

        public static $robot=false;


    }

    class Infopag{

        public static $logo='Stockholm';

    }

    class ValidarForm{

        public $elemento;

        public $siesEmail;

        public $max;

        public $min;

        public function __construct($a,$b,$c,$d){

            $this->elemento = $a;

            $this->siesEmail = $b;

            $this->max = $c;

            $this->min = $d;



        }

        public function sanear(){

            if( $this->siesEmail ){

                return filter_var($this->elemento,FILTER_SANITIZE_EMAIL);

            }else{

                return strip_tags(htmlspecialchars($this->elemento));

            }
        }

        public  function numCaract(){

            $numero=strlen($this->sanear());

            if( $numero<=$this->max && $numero>=$this->min){

                return true;

            }else{

                return false;

            }

        }

        public  function nulo(){

            if($this->sanear()!== NULL){

                return true;

            }else{

                return false;

            }
        }

        public  function vacio(){

            if($this->sanear() !== ""){

                return true;

            }else{

                return false;

            }


        }

        public function validarTodo(){

            if( $this->numCaract() && $this->vacio() && $this->nulo() ){

                return true;

            }else{

                return false;

            }





        }



    } 




?>
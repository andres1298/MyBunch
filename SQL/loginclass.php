<?php
    
    class Usuario{
        
        /*Atributos*/
        private $cedulaUsuario;
        public $tipoUsuario;
        private $estado;
        
        /*Constructor*/ //Inicializar los atributos, darles un valor inicial
        
        public function Usuario($cedulaUsuario, $tipoUsuario,$estado){
            
            $this->cedulaUsuario = $cedulaUsuario;
            $this->tipoUsuario = $tipoUsuario;
            $this->estado = $estado;  
        }
        
        /*Método*/ //Capacidad de poder verlo desde afuera
        
        public function getCedula(){
            return $this->cedulaUsuario;
        }
        
        public function getTipo(){
            return $this->tipoUsuario;
        }
        
        public function getEstado(){
            return $this->estado;
        }
    }
?>
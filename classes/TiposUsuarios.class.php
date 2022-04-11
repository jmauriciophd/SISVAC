<?php
class TipoUsuarios extends Usuarios{
     
        private $tipoUsuarios;
        public function __construct(){

        }
        public function setTipoUsuarios($tipoUsuarios){
                $this->tipoUsuarios = $tipoUsuarios;
        }
        public function getTipoUsuario(){
                 if($this->tipoUsuarios==1){
                        return $this->tipoUsuarios="Servidor Ativo";
                 }else if($this->tipoUsuarios==2){
                        return $this->tipoUsuarios="Servidor Inativo";

                 }elseif($this->tipoUsuarios==3){                         
                        return $this->tipoUsuarios="Prestador";
                 }       
        }
       
}
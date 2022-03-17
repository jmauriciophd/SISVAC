<?php
class Controller extends Conexao{
    public function __construct(){
        parent::__construct();
    }

    public function islogado(){
         
    }
    public function view($page,$dados=array()) {
        return $this->page;
    }

}
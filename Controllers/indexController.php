<?php
include_once "Controller.class.php";
class indexController extends Controller{
    public function __construct(){  
            parent::__construct();
    }
    public function index(){

    }
    public function consultarDados(){  
        $array = array();
        if(isset($_POST["valor"]) && !empty($_POST["valor"])){
            $valor = $_POST["valor"];
            $consulta = new PessoaDao();            
            return $array =  $consulta->consultaDados($valor);
           
       }           
    }
    public function consultaNick(){
        $consulta = new PessoaDao(); 
        if(isset($_POST["valor"]) && !empty($_POST["valor"])){   
            $valor = addslashes($_POST["valor"]);        
            return $array =  $consulta->getNick($valor);
        }
    }
    public function cadastrarUsuario(){
        $array = array(
            ''=>'msg'
        );
        if(isset($_POST["NICK"]) && !empty($_POST["NICK"])){
         $cadastrar = new PessoaDao();            
         $valor = addslashes($_POST["NICK"]);
         $senha = addslashes(MD5($_POST["PASSWORD"]));     
         $tipo = addslashes(MD5($_POST["TIPO"]));  
         $array['msg'] =  $cadastrar->cadastarUsuario($valor,$senha,$tipo);
        }
    }
}
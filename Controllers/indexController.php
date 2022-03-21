<?php
class indexController extends controller{
    public function __construct(){              
             $logado = new UsuarioDao();
             if($logado->isLogado()){
                 header('HTTP/1.0 404 Not Found');
             }
    }
    public function index(){            
         $dados = array();   
           $this->loadTemplate('home',$dados); 
    }    
    public function consultarDados(){  
        $array = array();
        if(isset($_POST["valor"]) && !empty($_POST["valor"])){
            $valor = $_POST["valor"];
            $consulta = new UsuarioDao();            
            return $array =  $consulta->consultaDados($valor);
       }           
    }
    public function consultaNick(){
        $consulta = new UsuarioDao(); 
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
         $cadastrar = new UsuarioDao();            
         $valor = addslashes($_POST["NICK"]);
         $senha = addslashes(MD5($_POST["PASSWORD"]));     
         $tipo =  addslashes($_POST["TIPO"]);  
          if($cadastrar->cadastarUsuario($valor,$senha,$tipo)){
            $array['msg'] =   "Cadastro com sucesso";
          }
        }
    }
    public function capanha(){
        $dados = array();
        $this->loadTemplate('campanha',$dados);
    }
    public function usuarios(){
        $dados = array();
        $this->loadTemplate('usuarios',$dados);
    }
    public function vacinas(){
        $dados = array();
        $this->loadTemplate('vacinas',$dados);
    }
    public function logout(){
        $u = new usuarios();
        if(!empty($_SESSION['ID'])){
            unset($_SESSION['ID']);			
            header("Location:".BASE_URL);
            exit;
        }							
    }
     
}

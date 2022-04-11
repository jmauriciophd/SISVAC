<?php
class loginController extends Controller{
    public function __construct(){
       
    }
public function index(){    
        $array = array(1=>'msg');

        if(isset($_POST["NICK"]) && empty($_POST["NICK"])){
            $array['msg'] = "Usuário ou Senha Vazios";
        }
        if(isset($_POST["NICK"]) && !empty($_POST["NICK"])){
            $valor = addslashes($_POST["NICK"]);
            $senha = addslashes(($_POST["PASSWORD"]));  
            $_SESSION["NICK_USER"]= $_POST["NICK"];            
            $logar = new UsuarioDao(); 
            if($logar->fazerLogin($valor,md5($senha))){                                                  
                header("Location:".BASE_URL); 
                                   
            }else{
                $array['msg'] = "Usuário ou senha Invalidos";
                $this->carregaView('login',$array);  
            }
        }
        $this->carregaView('login',$array);
     }
     public function logout(){        
        if(!empty($_SESSION['ID']) or !empty($_SESSION['nome_campanha']) or !empty($_SESSION['local_vacinacao'])){            
            unset($_SESSION['nome_campanha']);			  
            unset($_SESSION['local_vacinacao']);
            unset($_SESSION["NICK_USER"]);    
            unset($_SESSION['ID']);		
            session_destroy();		  		                        
        }			
        header("Location:".BASE_URL);
        $this->carregaView('login');   				
    }
 }
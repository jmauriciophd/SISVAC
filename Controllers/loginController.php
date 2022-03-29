<?php
class loginController extends Controller{
    public function __construct(){
       
    }
public function index(){    
        $array = array(1=>'msg');
        if(isset($_POST["NICK"]) && !empty($_POST["NICK"])){
            $valor = addslashes($_POST["NICK"]);
            $senha = addslashes(($_POST["PASSWORD"]));              
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
        if(!empty($_SESSION['ID'])){
            unset($_SESSION['ID']);			                        
        }			
        $this->carregaView('login');   				
    }
 }
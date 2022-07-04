<?php
class loginController extends Controller{
    public function __construct(){
       
    }
public function index(){    
        $array = array(1=>'msg');
        $logar = new UsuarioDao(); 
        if(isset($_POST["NICK"]) && empty($_POST["NICK"])){
            $array['msg'] = "Usuário ou Senha Vazios";
            header("Refresh:5;".BASE_URL); 
        }
        if(isset($_POST["NICK"]) && !empty($_POST["NICK"])){            
            $valor = addslashes($_POST["NICK"]);
            $senha = addslashes(($_POST["PASSWORD"]));
             if($logar->fazerLogin($valor,md5($senha))){//REALIZA LOGIN
                if($logar->consultaNick($valor)){      
                    $permissao = new PermissaoDao();
                    $_SESSION['nivel'] =  $permissao->consultaTipoPermissao($valor); //CONSULTA O TIPO DE NIVEL DO USUARIO.               
                    $_SESSION["NICK_USER"]= $valor; //ATRIBUI O NICK A SESSAO NICKUSER                                                   
                      header("Location:".BASE_URL);  //REDIRECIONA PARA A PAGINA PRINCIPAL   
                  //CONFIRMA O NICK DO USUARIO LOGADO                           
                 }                                   
            }else{
                $array['msg'] = "Usuário ou senha Invalidos";
                header("Refresh:5;".BASE_URL);                              
            }
        }
        $pagina = basename('login');       
        $this->carregaView($pagina,$array);
     }
     public function logout(){        
        if(!empty($_SESSION['ID']) or !empty($_SESSION['nome_campanha']) or !empty($_SESSION['local_vacinacao'])){            
            unset($_SESSION['nome_campanha']);			  
            unset($_SESSION['local_vacinacao']);
            unset($_SESSION["NICK_USER"]);    
            unset($_SESSION['ID']);
            unset($_SESSION['nivel']);		
            session_destroy();		  		                        
        }			
        header("Location:".BASE_URL);
        $this->carregaView('login');   				
    }
 }
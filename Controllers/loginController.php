<?php
class loginController extends Controller{
    
private function login(){
        $array = array(1=>'msg');
        if(isset($_POST["NICK"]) && !empty($_POST["NICK"])){
            echo '<pre>';
            var_dump($_POST["NICK"]);
            echo '</pre>';
            $valor = addslashes($_POST["NICK"]);
            $senha = addslashes(MD5($_POST["PASSWORD"]));             
            $logar = new UsuarioDao();  
            if($logar->fazerLogin($valor,md5($senha))){
                $this->loadTemplate('home',$array);
            }else{
                return $array['msg'] = "Login failed";
            }
        }
        $this->carregaView('login',$array);
     }
    }
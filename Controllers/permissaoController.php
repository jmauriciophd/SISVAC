<?php
class permissaoController extends Controller{
    public function __construct(){
        $logado = new UsuarioDao();
        if (!$logado->isLogado()) {
            header('Location:' . BASE_URL . "/login");
        }
    }
    /**
       Essa função chama todas as outras (fica mais facil de colocar 
       em varios arquivos). Então ela será chamada em todos os arquivos
    */
    public function autenticadoAutorizado($pagina,$nivel){  
        
        if(!$this->estaAutorizado($pagina,$nivel)){
            $this->loadTemplate('erro');exit;
        }else{
            return true;
        }
    }
    private function estaAutorizado($pagina,$nivel){         

             $paginas  = [
                          '1'=> ['dadosusuarios','campanha','header','home','login','template','usuarios','vacina'],
                          '2'=> ['dadosusuarios','header','home','login','template']    
                         ];  
                                    
           if($nivel[0] == 1){
               if(in_array($pagina,$paginas['1'])){
                   return true;
               }
               return false;
           }else if($nivel[0] == 2){
               if(in_array($pagina,$paginas['2'])){
                   return true;
               }
               return false;
           }
           return false;
    }
     
}